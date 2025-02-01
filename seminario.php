<?php include_once 'includes/inc.head.php'; ?>

<main class="main">

  <section id="seminario" class="container py-5">
    <h1>Seminario</h1>
    <p>En esta edición del CILD® 2025, se realiza un Seminario de Danza enmarcado dentro del Concurso y abierto a todos los bailarines que deseen realizar el mismo, sean o no participantes del CILD®.
      Como destacable, se dictarán clases de danza clásica con los maestros Alexandre Ananiev y Alba Serra.
    </p>
  </section>

  <?php include_once 'includes/BtnSeminario.php'; ?>

  <div class="container py-5">
    <h2 class="mb-4 text-center">Formulario de inscripción</h2>

    <form action="process_form.php" method="POST" enctype="multipart/form-data" class="row g-4">
      <input type="hidden" name="formulario_origen" value="seminario">

      <!-- Datos personales -->
      <fieldset class="border p-3">
        <legend class="w-auto px-2">Datos Personales</legend>
        <div class="row">
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
            <label class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" name="email" required>
          </div>
        </div>
      </fieldset>

      <!-- Cursos -->
      <fieldset class="border p-3 mt-4">
        <legend class="w-auto px-2" style="color: gold;">Cursos</legend>
        <div class="mb-3">
          <h4>Jueves 07 de septiembre</h4>
          <div class="form-check">
            <input type="radio" class="form-check-input" id="input7septiembre" name="curso" value="clásico-avanzado" required>
            <label class="form-check-label" for="input7septiembre">14:00 a 15:30 hs - Clásico Avanzado con el maestro Alexander Ananiev.</label>
          </div>
        </div>
        <div class="mb-3">
          <h4>Viernes 08 de septiembre</h4>
          <div class="form-check">
            <input type="radio" class="form-check-input" id="inputLorena" name="curso" value="clásico-intermedio" required>
            <label class="form-check-label" for="inputLorena">09:00 a 10:30 hs - Clásico Intermedio con la maestra Lorena Bello.</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" id="inputJose" name="curso" value="clásico-avanzado-jose" required>
            <label class="form-check-label" for="inputJose">10:30 a 12:00 hs - Clásico Avanzado con el maestro José María Vázquez.</label>
          </div>
        </div>
      </fieldset>

      <!-- Comprobante de pago -->
      <fieldset class="border p-3 mt-4">
        <legend class="w-auto px-2" style="color: gold;">Comprobante de Pago</legend>
        <p>Adjuntar copia del comprobante del depósito o transferencia de la inscripción al concurso:</p>
        <div class="col-md-6">
          <label class="form-label">Subir archivo PDF</label>
          <input type="file" class="form-control" name="file_pago" accept=".pdf" required>
        </div>
      </fieldset>

      <!-- Botón de envío -->
      <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary px-5">Enviar Formulario</button>
      </div>
    </form>

  </div>

</main>

<?php include_once 'includes/inc.footer.php'; ?>
