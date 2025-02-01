<?php
// Cargar las variables de entorno
require_once __DIR__ . '/../vendor/autoload.php';

// Comprobar si existe el archivo .env y cargarlo
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    try {
        $dotenv = Dotenv\Dotenv::createImmutable(dirname($envFile));
        $dotenv->load();
    } catch (Exception $e) {
        error_log("Error al cargar el archivo .env: " . $e->getMessage());
    }
}

// Detección de entorno (Local o Producción)
$isLocal = in_array($_SERVER['HTTP_HOST'] ?? '', ['localhost', '127.0.0.1']);

if ($isLocal) {
    // Configuración en entorno local con MailHog
    define("EMAIL_HOST", "127.0.0.1");
    define("EMAIL_PORT", 1025);
    define("EMAIL_USER", "noreply@cildargentina.com");
    define("EMAIL_PASS", "");
    define("EMAIL_TO", "inscripcion@cildargentina.com");
    define("BASE_URL", "http://localhost/CILD/");
} else {
    // Configuración en Producción (Hostinger)
    define("EMAIL_HOST", $_SERVER['EMAIL_HOST'] ?? 'smtp.hostinger.com');
    define("EMAIL_PORT", $_SERVER['EMAIL_PORT'] ?? '587');
    define("EMAIL_USER", $_SERVER['EMAIL_USER'] ?? 'inscripcion@cildargentina.com');
    define("EMAIL_PASS", $_SERVER['EMAIL_PASS'] ?? '');
    define("EMAIL_TO", $_SERVER['EMAIL_TO'] ?? 'inscripcion@cildargentina.com');
    define("BASE_URL", "https://cildargentina.com/");
}

// Configuración de directorios
define("UPLOADS_DIR", __DIR__ . "/../uploads/");