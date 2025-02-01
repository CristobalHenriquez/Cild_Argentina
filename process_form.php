<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include_once 'includes/inc.config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar datos generales del formulario
    $formulario_origen   = $_POST['formulario_origen'] ?? 'desconocido';
    $nombre              = $_POST['nombre'] ?? 'Usuario';
    $apellido            = $_POST['apellido'] ?? 'Sin apellido';
    $email               = $_POST['email'] ?? 'No especificado';
    $dni                 = $_POST['dni'] ?? 'No especificado';
    $fecha_nacimiento    = $_POST['fecha_nacimiento'] ?? 'No especificado';
    $edad                = $_POST['edad'] ?? 'No especificado';
    $ciudadania          = $_POST['ciudadania'] ?? 'No especificado';
    $categoria           = $_POST['categoria'] ?? 'No especificado';
    $division            = $_POST['division'] ?? 'No especificado';

    // 📌 Capturar curso si el formulario es de seminario
    $curso = ($formulario_origen === "seminario") ? ($_POST['curso'] ?? 'No especificado') : '';

    // ✅ Generar PDF con los datos del formulario
    $pdf = new \FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, utf8_decode("Formulario de Inscripción - $formulario_origen"), 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, utf8_decode("Nombre: $nombre $apellido"), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("Email: $email"), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("DNI: $dni"), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("Fecha de Nacimiento: $fecha_nacimiento"), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("Edad: $edad"), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("Ciudadanía: $ciudadania"), 0, 1);

    // 📌 Si es seminario, agregar curso al PDF
    if ($formulario_origen === "seminario") {
        $pdf->Cell(0, 10, utf8_decode("Curso Inscrito: $curso"), 0, 1);
    }

    $pdf_file = "uploads/formulario_{$formulario_origen}_{$nombre}.pdf";
    $pdf->Output($pdf_file, 'F'); // Guardar el PDF en el servidor

    // ✅ Configurar el correo con PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = EMAIL_HOST;
        $mail->SMTPAuth = ($_SERVER['HTTP_HOST'] === 'localhost') ? false : true;
        $mail->SMTPSecure = ($_SERVER['HTTP_HOST'] === 'localhost') ? false : PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = EMAIL_PORT;
        $mail->setFrom(EMAIL_USER ?: "noreply@cildargentina.com", 'CILD Argentina');
        $mail->addAddress(EMAIL_TO);

        // ✅ Corrección del Asunto
        $mail->Subject = mb_encode_mimeheader("Nueva inscripción - $formulario_origen", "UTF-8", "Q");

        // ✅ Cuerpo del correo con datos estructurados
        $mail->Body = "Se ha recibido una nueva inscripción desde el formulario de $formulario_origen.\n\n"
                    . "Nombre: $nombre $apellido\n"
                    . "Email: $email\n"
                    . "DNI: $dni\n"
                    . "Fecha de Nacimiento: $fecha_nacimiento\n"
                    . "Edad: $edad\n"
                    . "Ciudadanía: $ciudadania\n"
                    . "Categoría: $categoria\n"
                    . "División: $division\n";

        // 📌 Si es seminario, agregar curso al correo
        if ($formulario_origen === "seminario") {
            $mail->Body .= "Curso Inscrito: $curso\n";
        }

        // ✅ Adjuntar el PDF generado
        $mail->addAttachment($pdf_file);

        // ✅ Adjuntar archivo de pago (obligatorio en seminario)
        if (!empty($_FILES['file_pago']['tmp_name']) && is_uploaded_file($_FILES['file_pago']['tmp_name'])) {
            $mail->addAttachment($_FILES['file_pago']['tmp_name'], $_FILES['file_pago']['name']);
        }

        // ✅ Enviar el correo
        $mail->send();

        // ✅ Enviar la respuesta correctamente con SweetAlert
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

    // ✅ Limpiar archivos temporales
    unlink($pdf_file);
} else {
    echo "Acceso no permitido.";
}
?>
