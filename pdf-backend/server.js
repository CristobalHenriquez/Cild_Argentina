// Importación de módulos necesarios
const express = require("express");
const multer = require("multer");
const nodemailer = require("nodemailer");
const bodyParser = require("body-parser");
const fs = require("fs");
const path = require("path");
require("dotenv").config(); // Cargar variables de entorno desde un archivo .env
const cors = require("cors");

// Crear una instancia de la aplicación Express
const app = express();
const PORT = 3000;

// Habilitar CORS para permitir solicitudes de diferentes orígenes
app.use(cors());

// Configuración de Multer para manejar archivos subidos
// Los archivos se guardarán temporalmente en la carpeta "uploads/"
const upload = multer({ dest: "uploads/" });

// Middleware para procesar JSON en las solicitudes
app.use(bodyParser.json());

// Definir una ruta POST para subir archivos
app.post("/upload-pdf", upload.fields([
  { name: 'pdf', maxCount: 1 },
  { name: 'file1', maxCount: 1 },
  { name: 'file2', maxCount: 1 },
  { name: 'file3', maxCount: 1 },
  { name: 'file4', maxCount: 1 } // Para el archivo MP3
]), async (req, res) => {
  const { files } = req;

  // Verificar si se recibió un archivo PDF
  if (!files || !files.pdf) {
    return res.status(400).send("No se recibió ningún archivo PDF.");
  }

  try {
    // Configurar el transporte de correo con Nodemailer
    const transporter = nodemailer.createTransport({
      host: "smtp.gmail.com",
      port: 465,
      secure: true, // Usa SSL
      auth: {
        user: 'cillomartin.89@gmail.com',
        pass: 'obbb gscq oqpe dfsd', // Contraseña de aplicación generada para Gmail
      },
    });

    // Preparar los archivos adjuntos para el correo
    const attachments = [
      {
        filename: files.pdf[0].originalname,
        path: path.resolve(files.pdf[0].path),
      },
    ];

    // Agregar otros archivos adjuntos si existen
    ['file1', 'file2', 'file3', 'file4'].forEach(fieldName => {
      if (files[fieldName]) {
        attachments.push({
          filename: files[fieldName][0].originalname,
          path: path.resolve(files[fieldName][0].path),
        });
      }
    });

    // Configurar las opciones del correo
    const mailOptions = {
      from: process.env.EMAIL_USER,
      to: "cillo_747@hotmail.com", // Correo del destinatario
      subject: "Formulario Inscripcion PDF y Archivos Adjuntos",
      text: "Adjunto encontrarás el formulario de inscripcion en formato PDF con sus respectivos archivos.",
      attachments: attachments,
    };

    // Enviar el correo
    await transporter.sendMail(mailOptions);

    // Eliminar los archivos temporales después de enviarlos
    attachments.forEach((attachment) => {
      fs.unlinkSync(attachment.path);
    });

    // Enviar respuesta de éxito
    res.status(200).send("PDF y archivos enviados correctamente.");
  } catch (error) {
    // Manejar errores
    console.error("Error al enviar el correo:", error);
    res.status(500).send("Error al enviar el correo.");
  }
});

// Iniciar el servidor en el puerto especificado
app.listen(PORT, () => {
  console.log(`Servidor corriendo en http://localhost:${PORT}`);
});