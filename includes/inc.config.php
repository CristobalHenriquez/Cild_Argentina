<?php
// Cargar las variables de entorno
require_once __DIR__ . '/../vendor/autoload.php'; // Si usas Composer y `vlucas/phpdotenv`

// Comprobar si existe el archivo .env
if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__); // Ruta del archivo .env
    $dotenv->load();
} else {
    error_log("El archivo .env no fue encontrado en " . __DIR__);
}

// Detección de entorno (Local o Producción)
if ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1') {
    // Configuración en entorno local con MailHog
    define("EMAIL_HOST", "127.0.0.1"); // MailHog corre en localhost
    define("EMAIL_PORT", 1025); // Puerto de MailHog para SMTP
    define("EMAIL_USER", "noreply@cildargentina.com"); // Dirección ficticia para pruebas
    define("EMAIL_PASS", ""); // No se requiere contraseña
    define("EMAIL_TO", "inscripcion@cildargentina.com"); // Destinatario de prueba
    define("BASE_URL", "http://localhost/CILD/");
}
else {
    // Configuración en Producción (Hostinger)
    define("EMAIL_HOST", $_ENV['EMAIL_HOST'] ?? ""); // Desde .env
    define("EMAIL_PORT", $_ENV['EMAIL_PORT'] ?? "");
    define("EMAIL_USER", $_ENV['EMAIL_USER'] ?? "");
    define("EMAIL_PASS", $_ENV['EMAIL_PASS'] ?? "");
    define("EMAIL_TO", $_ENV['EMAIL_TO'] ?? "");
    define("BASE_URL", "https://cildargentina.com/");
}

// Configuración de directorios
define("UPLOADS_DIR", __DIR__ . "/../uploads/");
