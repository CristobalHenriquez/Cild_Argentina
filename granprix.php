<?php
// Incluir configuración y encabezado
include_once 'includes/inc.config.php';
include_once 'includes/inc.head.php';
?>
<main class="main">
    <section id="grand-prix" class="container py-5">
        <h1>CILD Grand Prix</h1>
        <p>En el año 2019 se llevó a cabo la primera edición del <strong>GRAND PRIX CILD®</strong>, que otorgó becas de estudio en reconocidas escuelas internacionales de danza.</p>
        <p>Esta edición especial del <strong>GRAND PRIX CILD®</strong> se llevará a cabo los días <strong>4 y 5 de octubre del 2025</strong> en el Teatro “Aldo Braga” de la histórica ciudad de San Lorenzo.</p>
    </section>

    <section id="downloads" class="container py-5">
        <h2>Descarga el documento</h2>
        <div class="d-flex gap-3">
            <a href="https://drive.google.com/file/d/1tr3iS_aIzVD4_6phlJOgF4QyZK12254y/view?usp=sharing"
                class="btn btn-dark" target="_blank" rel="noopener noreferrer">
                Exención de Responsabilidad
            </a>
            <a href="https://drive.google.com/file/d/12cs_h1UWu-OQ4J6tqfxVMVHaU1p2Vj1R/view?usp=sharing"
                class="btn btn-dark" target="_blank" rel="noopener noreferrer">
                Autorización del Participante Menor
            </a>
        </div>
    </section>

    <?php include_once 'includes/BtnGranPrix.php'; ?>

    <div class="container py-5">
        <h2 class="text-center mb-4">Formulario de inscripción</h2>
        <form action="process_form.php" method="POST" enctype="multipart/form-data" class="row g-4">
            <input type="hidden" name="formulario_origen" value="granprix">

            <!-- Datos del participante -->
            <h3 class="mb-4 text-warning">Datos del participante (solistas y dúos)</h3>
            <div class="col-md-6">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Número CI / Pasaporte / DNI</label>
                <input type="text" class="form-control" name="dni" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Edad</label>
                <input type="number" class="form-control" name="edad" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Ciudadanía</label>
                <input type="text" class="form-control" name="ciudadania" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <!-- Categorías y divisiones -->
            <h3 class="mb-4 text-warning">Grand Prix CILD</h3>
            <div class="col-md-6">
                <label class="form-label">Categoría</label>
                <select class="form-control" name="categoria" required>
                    <option value="" disabled selected>Seleccionar</option>
                    <option value="solista">Solista</option>
                    <option value="duo">Dúo</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">División</label>
                <select class="form-control" name="division" required>
                    <option value="" disabled selected>Seleccionar</option>
                    <option value="jovenes">Jóvenes (11-12 años)</option>
                    <option value="estudiantes">Estudiantes (13-14 años)</option>
                    <option value="juniors">Juniors (15-17 años)</option>
                    <option value="seniors">Seniors (18-26 años)</option>
                </select>
            </div>

            <!-- Variaciones solistas -->
            <h3 class="mb-4 text-warning">Solistas</h3>
            <div class="col-md-6">
                <label class="form-label">Primera variación clásica</label>
                <input type="text" class="form-control" name="primera_variacion" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Segunda variación clásica</label>
                <input type="text" class="form-control" name="segunda_variacion" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Coreografía contemporánea</label>
                <input type="text" class="form-control" name="coreo_contemporaneo" required>
            </div>

            <!-- Pas de Deux -->
            <h3 class="mb-4 text-warning">Pas de Deux</h3>
            <div class="col-md-6">
                <label class="form-label">Nombre del Pas de Deux</label>
                <input type="text" class="form-control" name="pas_de_deux">
            </div>

            <!-- Archivos adjuntos -->
            <h3 class="mb-4 text-warning">Documentos requeridos</h3>
            <div class="col-md-6">
                <label class="form-label">Autorización para menores</label>
                <input type="file" class="form-control" name="file_autorizacion" accept=".pdf">
            </div>
            <div class="col-md-6">
                <label class="form-label">Exención de responsabilidad</label>
                <input type="file" class="form-control" name="file_responsabilidad" accept=".pdf">
            </div>
            <div class="col-md-6">
                <label class="form-label">Comprobante de pago</label>
                <input type="file" class="form-control" name="file_pago" accept=".pdf">
            </div>
            <div class="col-md-6">
                <label class="form-label">Archivo MP3 (opcional)</label>
                <input type="file" class="form-control" name="file_musica" accept=".mp3">
            </div>

            <!-- Botón de envío -->
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary">Enviar formulario</button>
            </div>
        </form>
    </div>
</main>

<?php include_once 'includes/inc.footer.php'; ?>