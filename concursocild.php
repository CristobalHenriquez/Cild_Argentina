<?php include_once 'includes/inc.head.php'; ?>
<main class="main">
  <!-- Sección de introducción -->
  <section id="intro" class="container py-5">
    <h1>Concurso Internacional Latinoamérica Danza</h1>
    <p>
      En el año 2017 se establece realizar por primera vez el “CONCURSO INTERNACIONAL LATINOAMÉRICA DANZA”, bajo la
      coordinación y organización de la Mgter. Laura de Aira, con el objetivo de mostrar el desempeño de diversos solistas
      y grupos, otorgando la posibilidad de obtener importantes becas de estudio y perfeccionamiento en escuelas
      internacionales.
    </p>
    <p>
      En su edición especial del 2020, envuelto en la crisis sanitaria ocasionada por la pandemia del COVID 19, el
      CILD® se replanteó para destacarse como el “I Concurso Coreográfico CILD® 2020”; propuesta destinada a distintos
      coreógrafos consagrados y emergentes.
    </p>
    <p>
      Esta edición del CILD® tendrá lugar los días <strong>3, 4 y 5 de octubre del 2025</strong> en el Teatro
      “Aldo Braga” del Centro Cultural y Educativo Municipal “Brigadier Estanislao López” de la ciudad histórica de
      San Lorenzo, Provincia de Santa Fe. <strong>La entrada al Teatro es libre y gratuita.</strong>
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

  <!-- Botones para ventanas emergentes -->
  <section id="buttons" class="container py-5 text-center">
    <h2>Información adicional</h2>
    <div class="row gap-2 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <button class="btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#ventana1">Bases y Reglamento</button>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <button class="btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#ventana2">Inscripción</button>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <button class="btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#ventana3">Jurado</button>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <button class="btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#ventana4">Competencia</button>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <button class="btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#ventana5">Premios y Becas</button>
        </div>
    </div>
  </section>

  <?php include_once 'includes/BtnConcursoCild.php'; ?>
  
  <!-- Sección del formulario -->
  <section id="formulario" class="container py-5">
    <h2 class="mb-4">Formulario de inscripción</h2>
    <h2 class="mb-4" style="color: gold;">Datos del participante(solistas,dúos y tríos)</h2>
    <form action="#" method="POST" class="row g-3">
      <!-- 20 inputs -->
      <div class="col-md-6">
        <label for="inputName" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="inputName" required>
      </div>
      <div class="col-md-6">
        <label for="inputLastName" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="inputLastName" required>
      </div>
      <div class="col-md-6">
        <label for="inputDni" class="form-label">Número CI / Pasaporte / DNI</label>
        <input type="dni" class="form-control" id="inputDni" required>
      </div>
      <div class="col-md-6">
        <label for="inputBirthDate" class="form-label">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="inputBirthDate" required>
      </div>
      <div class="col-md-6">
        <label for="inputEdad" class="form-label">Edad</label>
        <input type="edad" class="form-control" id="inputEdad" required>
      </div>
      <div class="col-md-6">
        <label for="inputCiudadania" class="form-label">Ciudadanía</label>
        <input type="text" class="form-control" id="inputCiudadania" required>
      </div>
      <div class="col-md-6">
        <label for="inputEmail" class="form-label">Correo electrónico</label>
        <input type="text" class="form-control" id="inputEmail" required>
      </div>
      <hr class="my-4" style="border: 1px solid #ccc;">
      <h2 class="mb-4" style="color: gold;">Concurso CILD</h2>

      <div class="col-md-6">
        <label for="inputModalidad" class="form-label">Modalidad en la que se inscribe</label>
        <input type="text" class="form-control" id="inputModalidad" required>
      </div>
      <div class="col-md-6">
        <label for="inputObra" class="form-label">Nombre de la coreografía / Variación / Obra</label>
        <input type="text" class="form-control" id="inputObra" required>
      </div>
      <div class="col-md-6">
        <label for="inputCategoria" class="form-label">Categoría</label>
        <select class="form-control" id="inputCategoria" required>
          <option value="" disabled selected>Seleccionar</option>
          <option value="solista">Solista</option>
          <option value="duo">Dúo</option>
          <option value="trio">Trío</option>
          <option value="grupo">Grupo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="inputCantidad" class="form-label">Cantidad de integrantes del grupo</label>
        <input type="text" class="form-control" id="inputCantidad" required>
      </div>
      <div class="col-md-12">
        <label for="inputIntegrantes" class="form-label">Integrantes del Grupo:</label>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nombre y Apellido</th>
              <th>Edad</th>
              <th>Responsable (si es menor)</th>
              <th>Autorización del Menor</th>
            </tr>
          </thead>
          <tbody>
            <!-- Fila 1 -->
            <tr>
              <td><input type="text" class="form-control" name="nombre_1" required></td>
              <td><input type="number" class="form-control" name="edad_1" required></td>
              <td><input type="text" class="form-control" name="responsable_1"></td>
              <td><input type="text" class="form-control" name="autorizacion_1"></td>
            </tr>
            <!-- Fila 2 -->
            <tr>
              <td><input type="text" class="form-control" name="nombre_2" required></td>
              <td><input type="number" class="form-control" name="edad_2" required></td>
              <td><input type="text" class="form-control" name="responsable_2"></td>
              <td><input type="text" class="form-control" name="autorizacion_2"></td>
            </tr>
            <!-- Fila 3 -->
            <tr>
              <td><input type="text" class="form-control" name="nombre_3" required></td>
              <td><input type="number" class="form-control" name="edad_3" required></td>
              <td><input type="text" class="form-control" name="responsable_3"></td>
              <td><input type="text" class="form-control" name="autorizacion_3"></td>
            </tr>
            <!-- Fila 4 -->
            <tr>
              <td><input type="text" class="form-control" name="nombre_4" required></td>
              <td><input type="number" class="form-control" name="edad_4" required></td>
              <td><input type="text" class="form-control" name="responsable_4"></td>
              <td><input type="text" class="form-control" name="autorizacion_4"></td>
            </tr>
            <!-- Fila 5 -->
            <tr>
              <td><input type="text" class="form-control" name="nombre_5" required></td>
              <td><input type="number" class="form-control" name="edad_5" required></td>
              <td><input type="text" class="form-control" name="responsable_5"></td>
              <td><input type="text" class="form-control" name="autorizacion_5"></td>
            </tr>
            <tr>
              <td><input type="text" class="form-control" name="nombre_6" required></td>
              <td><input type="number" class="form-control" name="edad_6" required></td>
              <td><input type="text" class="form-control" name="responsable_6"></td>
              <td><input type="text" class="form-control" name="autorizacion_6"></td>
            </tr>
            <!-- Fila 2 -->
            <tr>
              <td><input type="text" class="form-control" name="nombre_7" required></td>
              <td><input type="number" class="form-control" name="edad_7" required></td>
              <td><input type="text" class="form-control" name="responsable_7"></td>
              <td><input type="text" class="form-control" name="autorizacion_7"></td>
            </tr>
            <!-- Fila 3 -->
            <tr>
              <td><input type="text" class="form-control" name="nombre_8" required></td>
              <td><input type="number" class="form-control" name="edad_8" required></td>
              <td><input type="text" class="form-control" name="responsable_8"></td>
              <td><input type="text" class="form-control" name="autorizacion_8"></td>
            </tr>
            <!-- Fila 4 -->
            <tr>
              <td><input type="text" class="form-control" name="nombre_9" required></td>
              <td><input type="number" class="form-control" name="edad_9" required></td>
              <td><input type="text" class="form-control" name="responsable_9"></td>
              <td><input type="text" class="form-control" name="autorizacion_9"></td>
            </tr>
            <!-- Fila 5 -->
            <tr>
              <td><input type="text" class="form-control" name="nombre_10" required></td>
              <td><input type="number" class="form-control" name="edad_10" required></td>
              <td><input type="text" class="form-control" name="responsable_10"></td>
              <td><input type="text" class="form-control" name="autorizacion_10"></td>
            </tr>
            <!-- Puedes agregar más filas según lo necesites -->
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <label for="inputDivision" class="form-label">División</label>
        <select class="form-control" id="inputDivision" required>
          <option value="" disabled selected>Seleccionar</option>
          <option value="infantil">Infantil</option>
          <option value="joveneso">Jóvenes</option>
          <option value="estudiantes">Estudiantes</option>
          <option value="juniors">Juniors</option>
          <option value="seniors">Seniors</option>
          <option value="masters">Masters</option>
        </select>
      </div>

      <div class="col-md-12">
        <label for="inputCoreografia" class="form-label">¿Compite en Coreografía?</label>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="inputCoreografiaSi" name="coreografia" value="si" required>
          <label class="form-check-label" for="inputCoreografiaSi">Sí</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="inputCoreografiaNo" name="coreografia" value="no" required>
          <label class="form-check-label" for="inputCoreografiaNo">No</label>
        </div>
      </div>
      <div class="col-md-6">
        <label for="inputWebsite" class="form-label">Coreógrafo(En caso afirmativo)</label>
        <input type="url" class="form-control" id="inputWebsite">
      </div>
      <hr class="my-4" style="border: 1px solid #ccc;">
      <h2 class="mb-4" style="color: gold;">Autorización del participante menor</h2>
      <p>En el caso de un menor, deberá descargar el Formulario de autorización para menores de 18 años, completarlo y adjuntarlo a continuación:</p>
      <div class="col-md-6">
        <label for="inputFile1" class="form-label">Subir archivo PDF</label>
        <input type="file" class="form-control" id="inputFile1" accept="application/pdf" name="file1">
      </div>
      <hr class="my-4" style="border: 1px solid #ccc;">
      <h2 class="mb-4" style="color: gold;">Exención de responsabilidad y divulgación</h2>
      <p>En el caso de un menor, deberá descargar el Formulario de exención de responsabilidad, completarlo y adjuntarlo a continuación:</p>
      <div class="col-md-6">
        <label for="inputFile2" class="form-label">Subir archivo PDF</label>
        <input type="file" class="form-control" id="inputFile2" accept="application/pdf" name="file2">
      </div>
      <hr class="my-4" style="border: 1px solid #ccc;">
      <h2 class="mb-4" style="color: gold;">Comprobante de pago</h2>
      <p>Adjuntar copia del comprobante del depósito o transferencia de la inscripción al concurso:</p>
      <div class="col-md-6">
        <label for="inputFile3" class="form-label">Subir archivo PDF</label>
        <input type="file" class="form-control" id="inputFile3" accept="application/pdf" name="file3">
      </div>
      <hr class="my-4" style="border: 1px solid #ccc;">
      <h2 class="mb-4" style="color: gold;">Adjuntar MP3</h2>
      <p>Adjuntar archivo mp3:</p>
      <div class="col-md-6">
        <label for="inputFile4" class="form-label">Subir archivo MP3</label>
        <input type="file" class="form-control" id="inputFile4" accept=".mp3" name="file4">
      </div>
      <div class="col-12">
        <button type="button" id="generatePdf" class="btn btn-primary">Enviar formulario</button>
      </div>
    </form>
  </section>
</main>

<?php include_once 'includes/inc.footer.php'; ?>