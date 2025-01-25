<?php include_once 'includes/inc.head.php'; ?>
<main class="main">
    <!-- Sección de introducción -->
    <section id="grand-prix" class="container py-5">
        <h1>CILD Grand Prix</h1>
        <p>
            En el año 2019 se llevó a cabo la primera edición del <strong>GRAND PRIX CILD®</strong>, que otorgó becas de estudio
            en reconocidas escuelas internacionales de danza.
        </p>
        <p>
            Debido a la crisis ocasionada por la pandemia del COVID-19, el <strong>GRAND PRIX CILD®</strong> fue suspendido
            durante los años 2020 y 2021. Sin embargo, su retorno marcará un hito en la danza latinoamericana.
        </p>
        <p>
            Esta edición especial del <strong>GRAND PRIX CILD®</strong> se llevará a cabo los días <strong>4 y 5 de octubre
                del 2025</strong> en el Teatro “Aldo Braga” de la histórica ciudad de San Lorenzo, en la provincia de Santa Fe.
            <strong>La entrada al Teatro será libre y gratuita.</strong>
        </p>
    </section>
    <!-- Sección de descarga de documentos -->
    <section id="downloads" class="container py-5">
        <h2>Descarga el documento</h2>
        <p>Puedes descargar los documentos haciendo clic en los botones a continuación:</p>
        <div class="d-flex gap-3">
            <a href="documento.docx" download="documento.docx" class="btn btn-dark">Exención de Responsabilidad</a>
            <a href="documento.docx" download="documento.docx" class="btn btn-dark">Autorización del Participante Menor</a>
        </div>
        <hr class="my-4">
    </section>
    <!-- Sección de botones -->
    <?php include_once 'includes/BtnGranPrix.php'; ?>

    <div class="container py-5">
        <h2 class="text-center mb-4">Formulario de inscripción</h2>

        <!-- Datos del participante -->
        <h3 class="mb-4 text-warning">Datos del participante (solistas y dúos)</h3>
        <form action="#" method="POST" class="row g-4">
            <div class="col-md-6">
                <label for="inputName" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="inputName" placeholder="Ingresa tu nombre" required>
            </div>
            <div class="col-md-6">
                <label for="inputLastName" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="inputLastName" placeholder="Ingresa tu apellido" required>
            </div>
            <div class="col-md-6">
                <label for="inputDni" class="form-label">Número CI / Pasaporte / DNI</label>
                <input type="text" class="form-control" id="inputDni" placeholder="Ingresa tu documento" required>
            </div>
            <div class="col-md-6">
                <label for="inputBirthDate" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="inputBirthDate" required>
            </div>
            <div class="col-md-6">
                <label for="inputEdad" class="form-label">Edad</label>
                <input type="number" class="form-control" id="inputEdad" placeholder="Ingresa tu edad" required>
            </div>
            <div class="col-md-6">
                <label for="inputCiudadania" class="form-label">Ciudadanía</label>
                <input type="text" class="form-control" id="inputCiudadania" placeholder="Ingresa tu nacionalidad" required>
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Ingresa tu correo electrónico" required>
            </div>

            <!-- Categorías y divisiones -->
            <hr class="my-4">
            <h3 class="mb-4 text-warning">Grand Prix CILD</h3>
            <div class="col-md-12">
                <label class="form-label">Categoría</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="inputCategoriaSolista" name="categoria" value="solista" required>
                    <label class="form-check-label" for="inputCategoriaSolista">Solista</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="inputCategoriaDuo" name="categoria" value="duo" required>
                    <label class="form-check-label" for="inputCategoriaDuo">Dúo</label>
                </div>
            </div>

            <div class="col-md-12">
                <label class="form-label">División</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="inputDivisionJov" name="division" value="jovenes" required>
                    <label class="form-check-label" for="inputDivisionJov">Jóvenes</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="inputDivisionEstudiantes" name="division" value="estudiantes" required>
                    <label class="form-check-label" for="inputDivisionEstudiantes">Estudiantes</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="inputDivisionJuniors" name="division" value="juniors" required>
                    <label class="form-check-label" for="inputDivisionJuniors">Juniors</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="inputDivisionSeniors" name="division" value="seniors" required>
                    <label class="form-check-label" for="inputDivisionSeniors">Seniors</label>
                </div>
            </div>

            <div class="col-md-12">
                <p><strong>Notas de división:</strong></p>
                <ul>
                    <li>Jóvenes: 11-12 años (1 variación clásico y 1 contemporáneo).</li>
                    <li>Estudiantes: 13-14 años (2 variaciones clásico y 1 contemporáneo).</li>
                    <li>Juniors: 15-17 años (2 variaciones clásico y 1 contemporáneo).</li>
                    <li>Seniors: 18-26 años (2 variaciones clásico y 1 contemporáneo).</li>
                </ul>
            </div>

            <!-- Variaciones solistas -->
            <hr class="my-4">
            <h3 class="mb-4 text-warning">Solistas</h3>
            <div class="col-md-6">
                <label for="inputPrimeravariacion" class="form-label">Primera variación clásica</label>
                <input type="text" class="form-control" id="inputPrimeravariacion" placeholder="Nombre de la variación" required>
            </div>
            <div class="col-md-6">
                <label for="inputSegundavariacion" class="form-label">Segunda variación clásica</label>
                <input type="text" class="form-control" id="inputSegundavariacion" placeholder="Nombre de la variación" required>
            </div>
            <div class="col-md-6">
                <label for="inputCoreoContem" class="form-label">Coreografía contemporáneo</label>
                <input type="text" class="form-control" id="inputCoreoContem" placeholder="Nombre de la coreografía" required>
            </div>
            <div class="col-md-6">
                <label for="inputDuracionContem" class="form-label">Duración contemporáneo</label>
                <input type="text" class="form-control" id="inputDuracionContem" placeholder="Duración en minutos" required>
            </div>

            <!-- Pas de Deux -->
            <hr class="my-4">
            <h3 class="mb-4 text-warning">Pas de Deux</h3>
            <div class="col-md-6">
                <label for="inputPasDeDeux" class="form-label">Pas de Deux</label>
                <input type="text" class="form-control" id="inputPasDeDeux" placeholder="Nombre del Pas de Deux" required>
            </div>

            <!-- Archivos adjuntos -->
            <hr class="my-4">
            <h3 class="mb-4 text-warning">Documentos requeridos</h3>
            <div class="col-md-6">
                <label for="inputFileAuth" class="form-label">Autorización para menores</label>
                <input type="file" class="form-control" id="inputFileAuth" accept=".pdf" required>
            </div>
            <div class="col-md-6">
                <label for="inputFileResponsibility" class="form-label">Exención de responsabilidad</label>
                <input type="file" class="form-control" id="inputFileResponsibility" accept=".pdf" required>
            </div>
            <div class="col-md-6">
                <label for="inputFilePayment" class="form-label">Comprobante de pago</label>
                <input type="file" class="form-control" id="inputFilePayment" accept=".pdf" required>
            </div>

            <!-- Botón de envío -->
            <div class="col-12 text-center mt-4">
                <button type="submit" id="generatePdf" class="btn btn-primary">Enviar formulario</button>
            </div>
        </form>
    </div>

</main>
<?php include_once 'includes/inc.footer.php'; ?>