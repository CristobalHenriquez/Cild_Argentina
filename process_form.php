<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Configuración inicial
ini_set('display_errors', 0);
error_reporting(E_ALL & ~E_DEPRECATED);
header('Content-Type: application/json; charset=UTF-8');
mb_internal_encoding('UTF-8');

// Función para logging
function logError($mensaje)
{
    $logFile = __DIR__ . '/error_log.txt';
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logFile, "[$timestamp] $mensaje\n", FILE_APPEND);
}

logError("=== Inicio del procesamiento ===");

require 'vendor/autoload.php';
include_once 'includes/inc.config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Capturar datos generales del formulario
        $formulario_origen = $_POST['formulario_origen'] ?? 'desconocido';
        $nombre = $_POST['nombre'] ?? 'Usuario';
        $apellido = $_POST['apellido'] ?? 'Sin apellido';
        $email = $_POST['email'] ?? 'No especificado';
        $telefono = $_POST['telefono'] ?? 'No especificado';
        $dni = $_POST['dni'] ?? 'No especificado';
        $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? 'No especificado';
        $edad = $_POST['edad'] ?? 'No especificado';
        $ciudadania = $_POST['ciudadania'] ?? 'No especificado';

        logError("Datos del formulario capturados. Origen: $formulario_origen");

        // Verificar si ya existe una inscripción
        $registros_file = 'uploads/registros.json';
        $registros = [];
        if (file_exists($registros_file)) {
            $registros = json_decode(file_get_contents($registros_file), true) ?? [];
        }

        $duplicado = false;
        foreach ($registros as $registro) {
            if (
                $registro['formulario_origen'] === $formulario_origen &&
                ($registro['dni'] === $dni || $registro['email'] === $email)
            ) {
                $duplicado = true;
                break;
            }
        }

        if ($duplicado) {
            logError("Intento de inscripción duplicada: $formulario_origen, DNI: $dni, Email: $email");
            echo json_encode([
                'success' => false,
                'message' => "Ya existe una inscripción para $formulario_origen con este DNI o correo electrónico. Si crees que esto es un error, por favor contáctanos."
            ]);
            exit;
        }

        // Capturar cursos seleccionados
        $cursos_seleccionados = $_POST['cursos'] ?? [];

        // Mapeo de valores de cursos a descripciones
        $cursos_descripcion = [
            'GP-clasico-avanzado' => '13:00 a 14:30 - Clásico avanzado con el maestro Alexander Ananiev (Grand Prix)',
            'GP-clasico-intermedio' => '14:30 a 16:00 - Clásico intermedio con la maestra Alba Serra (Grand Prix)',
            'clasico-avanzado' => '16:00 a 17:30 - Clásico avanzado con el maestro Alexander Ananiev',
            'clasico-intermedio' => '17:30 a 19:00 - Clásico intermedio con la maestra Alba Serra',
            'jazz' => '16:00 a 17:30 - Clase jazz con el maestro Daniel Bartra (en escenario)'
        ];

        // Inicializar variables específicas de cada formulario
        $categoria = $division = $curso = $modalidad = $obra = $cantidad_integrantes = '';
        $coreografia = 'No';
        $integrantes = [];

        // Capturar datos específicos según el formulario de origen
        switch ($formulario_origen) {
            case 'granprix':
                $categoria = $_POST['categoria'] ?? 'No especificado';
                $division = $_POST['division'] ?? 'No especificado';
                break;
            case 'seminario':
                $curso = $_POST['curso'] ?? 'No especificado';
                break;
            case 'concursocild':
                $modalidad = $_POST['modalidad'] ?? 'No especificado';
                $obra = $_POST['obra'] ?? 'No especificado';
                $categoria = $_POST['categoria'] ?? 'No especificado';
                $cantidad_integrantes = $_POST['cantidad_integrantes'] ?? 'No especificado';
                $division = $_POST['division'] ?? 'No especificado';
                $coreografia = $_POST['coreografia'] ?? 'No';

                // Capturar datos de los integrantes del grupo
                for ($i = 1; $i <= 10; $i++) {
                    if (!empty($_POST["nombre_$i"])) {
                        $integrantes[] = [
                            'nombre' => $_POST["nombre_$i"],
                            'edad' => $_POST["edad_$i"] ?? 'No especificado',
                            'responsable' => $_POST["responsable_$i"] ?? 'No especificado',
                            'autorizacion' => $_POST["autorizacion_$i"] ?? 'No especificado'
                        ];
                    }
                }
                break;
        }

        logError("Generando PDF para $formulario_origen");

        // Generar PDF con los datos del formulario
        $pdf = new \FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, mb_convert_encoding("Formulario de Inscripción - $formulario_origen", 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, mb_convert_encoding("Nombre: $nombre $apellido", 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding("Email: $email", 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding("Teléfono / WhatsApp: $telefono", 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding("DNI: $dni", 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding("Fecha de Nacimiento: $fecha_nacimiento", 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding("Edad: $edad", 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding("Ciudadanía: $ciudadania", 'ISO-8859-1', 'UTF-8'), 0, 1);

        // Agregar cursos seleccionados al PDF
        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, mb_convert_encoding("Cursos seleccionados:", 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->SetFont('Arial', '', 12);
        foreach ($cursos_seleccionados as $curso) {
            if (isset($cursos_descripcion[$curso])) {
                $pdf->MultiCell(0, 10, mb_convert_encoding($cursos_descripcion[$curso], 'ISO-8859-1', 'UTF-8'), 0, 'L');
            }
        }


        switch ($formulario_origen) {
            case 'granprix':
                $pdf->Cell(0, 10, mb_convert_encoding("Categoría: $categoria", 'ISO-8859-1', 'UTF-8'), 0, 1);
                $pdf->Cell(0, 10, mb_convert_encoding("División: $division", 'ISO-8859-1', 'UTF-8'), 0, 1);
                break;
            case 'seminario':
                $pdf->Cell(0, 10, mb_convert_encoding("Curso: $curso", 'ISO-8859-1', 'UTF-8'), 0, 1);
                break;
            case 'concursocild':
                $pdf->Cell(0, 10, mb_convert_encoding("Modalidad: $modalidad", 'ISO-8859-1', 'UTF-8'), 0, 1);
                $pdf->Cell(0, 10, mb_convert_encoding("Obra: $obra", 'ISO-8859-1', 'UTF-8'), 0, 1);
                $pdf->Cell(0, 10, mb_convert_encoding("Categoría: $categoria", 'ISO-8859-1', 'UTF-8'), 0, 1);
                $pdf->Cell(0, 10, mb_convert_encoding("Cantidad de integrantes: $cantidad_integrantes", 'ISO-8859-1', 'UTF-8'), 0, 1);
                $pdf->Cell(0, 10, mb_convert_encoding("División: $division", 'ISO-8859-1', 'UTF-8'), 0, 1);
                $pdf->Cell(0, 10, mb_convert_encoding("Compite en Coreografía: $coreografia", 'ISO-8859-1', 'UTF-8'), 0, 1);

                // Agregar información de los integrantes del grupo
                if (!empty($integrantes)) {
                    $pdf->Ln(10);
                    $pdf->SetFont('Arial', 'B', 12);
                    $pdf->Cell(0, 10, mb_convert_encoding("Integrantes del Grupo:", 'ISO-8859-1', 'UTF-8'), 0, 1);
                    $pdf->SetFont('Arial', '', 12);
                    foreach ($integrantes as $index => $integrante) {
                        $pdf->Cell(0, 10, mb_convert_encoding("Integrante " . ($index + 1) . ":", 'ISO-8859-1', 'UTF-8'), 0, 1);
                        $pdf->Cell(0, 10, mb_convert_encoding("  Nombre: " . $integrante['nombre'], 'ISO-8859-1', 'UTF-8'), 0, 1);
                        $pdf->Cell(0, 10, mb_convert_encoding("  Edad: " . $integrante['edad'], 'ISO-8859-1', 'UTF-8'), 0, 1);
                        $pdf->Cell(0, 10, mb_convert_encoding("  Responsable: " . $integrante['responsable'], 'ISO-8859-1', 'UTF-8'), 0, 1);
                        $pdf->Cell(0, 10, mb_convert_encoding("  Autorización: " . $integrante['autorizacion'], 'ISO-8859-1', 'UTF-8'), 0, 1);
                        $pdf->Ln(5);
                    }
                }
                break;
        }

        $timestamp = date('Y-m-d_H-i-s');
        $pdf_file = "uploads/formulario_{$formulario_origen}_{$nombre}_{$timestamp}.pdf";

        logError("Intentando guardar PDF en: " . realpath(dirname($pdf_file)));
        logError("Permisos de la carpeta uploads: " . substr(sprintf('%o', fileperms('uploads')), -4));

        $pdf->Output($pdf_file, 'F');

        if (file_exists($pdf_file)) {
            logError("PDF guardado exitosamente: $pdf_file");
        } else {
            logError("ERROR: No se pudo guardar el PDF en $pdf_file");
        }

        // Configurar el correo con PHPMailer
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->isSMTP();
        $mail->Host = EMAIL_HOST;
        $mail->SMTPAuth = ($_SERVER['HTTP_HOST'] === 'localhost') ? false : true;
        $mail->SMTPSecure = ($_SERVER['HTTP_HOST'] === 'localhost') ? false : PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = EMAIL_PORT;
        $mail->Username = EMAIL_USER;
        $mail->Password = EMAIL_PASS;
        $mail->setFrom(EMAIL_USER ?: "noreply@cildargentina.com", 'CILD Argentina');
        $mail->addAddress(EMAIL_TO);

        logError("Configuración SMTP: " . json_encode([
            'host' => EMAIL_HOST,
            'port' => EMAIL_PORT,
            'user' => EMAIL_USER,
            'to' => EMAIL_TO
        ]));

        $mail->Subject = mb_encode_mimeheader("Nueva inscripción - $formulario_origen - $nombre $apellido ($email)", "UTF-8", "Q");

        // Cuerpo del correo con datos estructurados
        $mail_body = "Se ha recibido una nueva inscripción desde el formulario de $formulario_origen.\n\n"
            . "Nombre: $nombre $apellido\n"
            . "Email: $email\n"
            . "Teléfono / WhatsApp: $telefono\n"
            . "DNI: $dni\n"
            . "Fecha de Nacimiento: $fecha_nacimiento\n"
            . "Edad: $edad\n"
            . "Ciudadanía: $ciudadania\n"
            . "División: $division\n\n"  // <--- Se agregó esta línea para incluir la división
            . "Cursos seleccionados:\n";

        foreach ($cursos_seleccionados as $curso) {
            if (isset($cursos_descripcion[$curso])) {
                $mail_body .= "- " . $cursos_descripcion[$curso] . "\n";
            }
        }


        $mail->Body = $mail_body;
        logError("Cuerpo del correo configurado: " . substr($mail_body, 0, 100) . "...");

        // Adjuntar el PDF generado
        if (file_exists($pdf_file)) {
            $mail->addAttachment($pdf_file);
            logError("PDF adjuntado al correo: $pdf_file");
        } else {
            logError("ERROR: No se pudo adjuntar el PDF al correo. El archivo no existe: $pdf_file");
        }

        // Adjuntar archivos según el formulario
        $archivos_adjuntos = [
            'granprix' => ['file_autorizacion', 'file_responsabilidad', 'file_pago', 'file_musica'],
            'seminario' => ['file_pago'],
            'concursocild' => ['file_autorizacion', 'file_responsabilidad', 'file_pago', 'file_musica']
        ];

        foreach ($archivos_adjuntos[$formulario_origen] as $archivo) {
            if (!empty($_FILES[$archivo]['tmp_name']) && is_uploaded_file($_FILES[$archivo]['tmp_name'])) {
                $mail->addAttachment($_FILES[$archivo]['tmp_name'], $_FILES[$archivo]['name']);
                logError("Archivo adjuntado al correo: " . $_FILES[$archivo]['name']);
            }
        }

        logError("Intentando enviar correo");
        // Enviar el correo
        $mail->send();
        logError("Correo enviado exitosamente");

        // Guardar registro
        logError("Guardando registro en JSON");
        $nuevo_registro = [
            'formulario_origen' => $formulario_origen,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'telefono' => $telefono,
            'dni' => $dni,
            'fecha_inscripcion' => date('Y-m-d H:i:s'),
            'cursos' => $cursos_seleccionados
        ];

        $registros[] = $nuevo_registro;
        file_put_contents($registros_file, json_encode($registros, JSON_PRETTY_PRINT));
        logError("Registro guardado exitosamente");

        $response = [
            'success' => true,
            'message' => 'Tu inscripción ha sido enviada correctamente.',
            'redirect' => 'index.php',
            'debug' => [
                'pdf_generated' => $pdf_file,
                'email_sent' => true,
                'registro_guardado' => true
            ]
        ];
        logError("Tipo de respuesta: " . gettype($response));
        logError("Contenido de la respuesta: " . json_encode($response));
        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        exit;
    } catch (Exception $e) {
        logError("ERROR: " . $e->getMessage());
        logError("Línea: " . $e->getLine());
        logError("Archivo: " . $e->getFile());

        $response = [
            'success' => false,
            'message' => "Ha ocurrido un error al procesar tu inscripción. Por favor, intenta nuevamente.",
            'debug' => $e->getMessage(),
            'error_details' => [
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]
        ];
        logError("Enviando respuesta de error: " . json_encode($response));
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
} else {
    $response = [
        'success' => false,
        'message' => 'Método de acceso no permitido.'
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
