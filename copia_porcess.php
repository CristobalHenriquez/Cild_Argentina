<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include_once 'includes/inc.config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Generar PDF con los datos del formulario
    $pdf = new \FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, utf8_decode("Formulario de Inscripción - $formulario_origen"), 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, utf8_decode("Nombre: $nombre $apellido"), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("Email: $email"), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("Teléfono / WhatsApp: $telefono"), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("DNI: $dni"), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("Fecha de Nacimiento: $fecha_nacimiento"), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("Edad: $edad"), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("Ciudadanía: $ciudadania"), 0, 1);

    // Agregar datos específicos según el formulario
    switch ($formulario_origen) {
        case 'granprix':
            $pdf->Cell(0, 10, utf8_decode("Categoría: $categoria"), 0, 1);
            $pdf->Cell(0, 10, utf8_decode("División: $division"), 0, 1);
            break;
        case 'seminario':
            $pdf->Cell(0, 10, utf8_decode("Curso: $curso"), 0, 1);
            break;
        case 'concursocild':
            $pdf->Cell(0, 10, utf8_decode("Modalidad: $modalidad"), 0, 1);
            $pdf->Cell(0, 10, utf8_decode("Obra: $obra"), 0, 1);
            $pdf->Cell(0, 10, utf8_decode("Categoría: $categoria"), 0, 1);
            $pdf->Cell(0, 10, utf8_decode("Cantidad de integrantes: $cantidad_integrantes"), 0, 1);
            $pdf->Cell(0, 10, utf8_decode("División: $division"), 0, 1);
            $pdf->Cell(0, 10, utf8_decode("Compite en Coreografía: $coreografia"), 0, 1);
            
            // Agregar información de los integrantes del grupo
            if (!empty($integrantes)) {
                $pdf->Ln(10);
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(0, 10, utf8_decode("Integrantes del Grupo:"), 0, 1);
                $pdf->SetFont('Arial', '', 12);
                foreach ($integrantes as $index => $integrante) {
                    $pdf->Cell(0, 10, utf8_decode("Integrante " . ($index + 1) . ":"), 0, 1);
                    $pdf->Cell(0, 10, utf8_decode("  Nombre: " . $integrante['nombre']), 0, 1);
                    $pdf->Cell(0, 10, utf8_decode("  Edad: " . $integrante['edad']), 0, 1);
                    $pdf->Cell(0, 10, utf8_decode("  Responsable: " . $integrante['responsable']), 0, 1);
                    $pdf->Cell(0, 10, utf8_decode("  Autorización: " . $integrante['autorizacion']), 0, 1);
                    $pdf->Ln(5);
                }
            }
            break;
    }

    $pdf_file = "uploads/formulario_{$formulario_origen}_{$nombre}.pdf";
    $pdf->Output($pdf_file, 'F');

    // Configurar el correo con PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = EMAIL_HOST;
        $mail->SMTPAuth = ($_SERVER['HTTP_HOST'] === 'localhost') ? false : true;
        $mail->SMTPSecure = ($_SERVER['HTTP_HOST'] === 'localhost') ? false : PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = EMAIL_PORT;
        $mail->setFrom(EMAIL_USER ?: "noreply@cildargentina.com", 'CILD Argentina');
        $mail->addAddress(EMAIL_TO);

        $mail->Subject = mb_encode_mimeheader("Nueva inscripción - $formulario_origen - $nombre $apellido ($email)", "UTF-8", "Q");

        // Cuerpo del correo con datos estructurados
        $mail->Body = "Se ha recibido una nueva inscripción desde el formulario de $formulario_origen.\n\n"
                    . "Nombre: $nombre $apellido\n"
                    . "Email: $email\n"
                    . "Teléfono / WhatsApp: $telefono\n"
                    . "DNI: $dni\n"
                    . "Fecha de Nacimiento: $fecha_nacimiento\n"
                    . "Edad: $edad\n"
                    . "Ciudadanía: $ciudadania\n";

        // Agregar datos específicos al cuerpo del correo según el formulario
        switch ($formulario_origen) {
            case 'granprix':
                $mail->Body .= "Categoría: $categoria\n"
                             . "División: $division\n";
                break;
            case 'seminario':
                $mail->Body .= "Curso: $curso\n";
                break;
            case 'concursocild':
                $mail->Body .= "Modalidad: $modalidad\n"
                             . "Obra: $obra\n"
                             . "Categoría: $categoria\n"
                             . "Cantidad de integrantes: $cantidad_integrantes\n"
                             . "División: $division\n"
                             . "Compite en Coreografía: $coreografia\n\n";
                
                // Agregar información de los integrantes del grupo al cuerpo del correo
                if (!empty($integrantes)) {
                    $mail->Body .= "Integrantes del Grupo:\n";
                    foreach ($integrantes as $index => $integrante) {
                        $mail->Body .= "Integrante " . ($index + 1) . ":\n"
                                     . "  Nombre: " . $integrante['nombre'] . "\n"
                                     . "  Edad: " . $integrante['edad'] . "\n"
                                     . "  Responsable: " . $integrante['responsable'] . "\n"
                                     . "  Autorización: " . $integrante['autorizacion'] . "\n\n";
                    }
                }
                break;
        }

        // Adjuntar el PDF generado
        $mail->addAttachment($pdf_file);

        // Adjuntar archivos según el formulario
        $archivos_adjuntos = [
            'granprix' => ['file_autorizacion', 'file_responsabilidad', 'file_pago', 'file_musica'],
            'seminario' => ['file_pago'],
            'concursocild' => ['file_autorizacion', 'file_responsabilidad', 'file_pago', 'file_musica']
        ];

        foreach ($archivos_adjuntos[$formulario_origen] as $archivo) {
            if (!empty($_FILES[$archivo]['tmp_name']) && is_uploaded_file($_FILES[$archivo]['tmp_name'])) {
                $mail->addAttachment($_FILES[$archivo]['tmp_name'], $_FILES[$archivo]['name']);
            }
        }

        // Enviar el correo
        $mail->send();

        // Enviar la respuesta correctamente con SweetAlert
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Formulario Enviado</title>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: '¡Formulario enviado!',
                    text: 'Tu inscripción ha sido enviada correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>
        </body>
        </html>";

    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }

    // Limpiar archivos temporales
    unlink($pdf_file);
} else {
    echo "Acceso no permitido.";
}
?>