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
      <a href="https://drive.google.com/file/d/1tr3iS_aIzVD4_6phlJOgF4QyZK12254y/view?usp=sharing"
        class="btn btn-dark"
        target="_blank"
        rel="noopener noreferrer">
        Exención de Responsabilidad
      </a>
      <a href="https://drive.google.com/file/d/12cs_h1UWu-OQ4J6tqfxVMVHaU1p2Vj1R/view?usp=sharing"
        class="btn btn-dark"
        target="_blank"
        rel="noopener noreferrer">
        Autorización del Participante Menor
      </a>
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
    <h2 class="mb-4 text-center">Formulario de inscripción</h2>
    <h2 class="mb-4 text-warning">Datos del participante (Solistas, Dúos y Tríos)</h2>

    <form action="process_form.php" method="POST" enctype="multipart/form-data" class="row g-3">
      <input type="hidden" name="formulario_origen" value="concursocild">

      <!-- Datos personales -->
      <div class="col-md-6">
        <label for="inputName" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="inputName" name="nombre" required>
      </div>
      <div class="col-md-6">
        <label for="inputLastName" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="inputLastName" name="apellido" required>
      </div>
      <div class="col-md-6">
        <label for="inputDni" class="form-label">Número CI / Pasaporte / DNI</label>
        <input type="text" class="form-control" id="inputDni" name="dni" required>
      </div>
      <div class="col-md-6">
        <label for="inputBirthDate" class="form-label">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="inputBirthDate" name="fecha_nacimiento" required>
      </div>
      <div class="col-md-6">
        <label for="inputEdad" class="form-label">Edad</label>
        <input type="number" class="form-control" id="inputEdad" name="edad" required>
      </div>
      <div class="col-md-6">
        <label for="inputCiudadania" class="form-label">Ciudadanía</label>
        <input type="text" class="form-control" id="inputCiudadania" name="ciudadania" required>
      </div>
      <div class="col-md-6">
        <label for="inputEmail" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" id="inputEmail" name="email" required>
      </div>
      <div class="row">
        <div class="col-12 col-md-6 mb-3">
          <label for="inputTelefono" class="form-label">Teléfono / WhatsApp</label>
          <div class="input-group">
            <input type="tel"
              class="form-control"
              id="inputTelefono"
              name="telefono"
              placeholder="+54 9 11 1234-5678"
              pattern="\+[0-9]{1,3}\s?[0-9]{1,4}\s?[0-9]{4,14}"
              title="Por favor, ingresa el número en formato internacional: +[código de país] [código de área] [número]"
              required>
            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#telefonoInfoModal">
              <i class="bi bi-question-circle"></i>
            </button>
          </div>
          <small class="form-text text-muted d-block mt-2">
            Formato: +[país] [área] [número]<br>
            Ej. Argentina: +54 9 11 1234-5678
          </small>
        </div>
      </div>
      <!-- Modal con información adicional -->
      <div class="modal fade" id="telefonoInfoModal" tabindex="-1" aria-labelledby="telefonoInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="telefonoInfoModalLabel">Cómo ingresar tu número de teléfono</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Para ingresar correctamente tu número de teléfono o WhatsApp, sigue estos pasos:</p>
              <ol>
                <li>Comienza con el signo "+" seguido del código de país (por ejemplo, +54 para Argentina).</li>
                <li>Si es un número móvil en Argentina, agrega un 9 después del código de país.</li>
                <li>Luego, ingresa el código de área sin el 0 inicial.</li>
                <li>Finalmente, ingresa el número local sin el 15 inicial (para números móviles).</li>
              </ol>
              <p>Ejemplos:</p>
              <ul>
                <li>Número de Buenos Aires: +54 9 11 1234-5678</li>
                <li>Número de Córdoba: +54 9 351 123-4567</li>
                <li>Número de Rosario: +54 9 341 234-5678</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <hr class="my-4">
      <h2 class="mb-4 text-warning">Concurso CILD</h2>

      <div class="col-md-6">
        <label for="inputModalidad" class="form-label">Modalidad en la que se inscribe</label>
        <input type="text" class="form-control" id="inputModalidad" name="modalidad" required>
      </div>
      <div class="col-md-6">
        <label for="inputObra" class="form-label">Nombre de la coreografía / Variación / Obra</label>
        <input type="text" class="form-control" id="inputObra" name="obra" required>
      </div>
      <div class="col-md-6">
        <label for="inputCategoria" class="form-label">Categoría</label>
        <select class="form-control" id="inputCategoria" name="categoria" required>
          <option value="" disabled selected>Seleccionar</option>
          <option value="solista">Solista</option>
          <option value="duo">Dúo</option>
          <option value="trio">Trío</option>
          <option value="grupo">Grupo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="inputCantidad" class="form-label">Cantidad de integrantes del grupo</label>
        <input type="number" class="form-control" id="inputCantidad" name="cantidad_integrantes" required>
      </div>

      <div class="col-md-12">
        <label class="form-label">Integrantes del Grupo</label>
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
            <?php for ($i = 1; $i <= 10; $i++) : ?>
              <tr>
                <td><input type="text" class="form-control" name="nombre_<?php echo $i; ?>"></td>
                <td><input type="number" class="form-control" name="edad_<?php echo $i; ?>"></td>
                <td><input type="text" class="form-control" name="responsable_<?php echo $i; ?>"></td>
                <td><input type="text" class="form-control" name="autorizacion_<?php echo $i; ?>"></td>
              </tr>
            <?php endfor; ?>
          </tbody>
        </table>
      </div>

      <hr class="my-4">
      <h2 class="mb-4 text-warning">Documentación requerida</h2>

      <div class="col-md-6">
        <label for="inputFile1" class="form-label">Autorización para menores (PDF)</label>
        <input type="file" class="form-control" id="inputFile1" name="file_autorizacion" accept=".pdf">
      </div>
      <div class="col-md-6">
        <label for="inputFile2" class="form-label">Exención de responsabilidad (PDF)</label>
        <input type="file" class="form-control" id="inputFile2" name="file_responsabilidad" accept=".pdf">
      </div>
      <div class="col-md-6">
        <label for="inputFile3" class="form-label">Comprobante de pago (PDF)</label>
        <input type="file" class="form-control" id="inputFile3" name="file_pago" accept=".pdf" required>
      </div>
      <div class="col-md-6">
        <label for="inputFile4" class="form-label">Archivo MP3 (Opcional)</label>
        <input type="file" class="form-control" id="inputFile4" name="file_musica" accept=".mp3">
      </div>

      <div class="col-md-6">
        <label for="inputDivision" class="form-label">División</label>
        <select class="form-control" id="inputDivision" name="division" required>
          <option value="" disabled selected>Seleccionar</option>
          <option value="infantil">Infantil</option>
          <option value="joveneso">Jóvenes</option>
          <option value="estudiantes">Estudiantes</option>
          <option value="juniors">Juniors</option>
          <option value="seniors">Seniors</option>
          <option value="masters">Masters</option>
        </select>
      </div>

      <hr class="my-4">
      <h2 class="mb-4 text-warning">Coreografía</h2>
      <div class="col-md-12">
        <label class="form-label">¿Compite en Coreografía?</label>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="inputCoreografiaSi" name="coreografia" value="si" required>
          <label class="form-check-label" for="inputCoreografiaSi">Sí</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="inputCoreografiaNo" name="coreografia" value="no" required>
          <label class="form-check-label" for="inputCoreografiaNo">No</label>
        </div>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary px-5">Enviar Formulario</button>
      </div>
    </form>
  </section>

</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $('form').on('submit', function(e) {
        e.preventDefault();
        
        // Mostrar indicador de carga
        Swal.fire({
            title: 'Procesando...',
            text: 'Por favor espera mientras procesamos tu inscripción',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        var formData = new FormData(this);

        $.ajax({
            url: 'process_form.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                try {
                    if (typeof response === 'string') {
                        response = JSON.parse(response);
                    }

                    if (response.success) {
                        Swal.fire({
                            title: '¡Éxito!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'index.php';
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                } catch (e) {
                    console.error('Error al procesar la respuesta:', e);
                    Swal.fire({
                        title: 'Error',
                        text: 'Ha ocurrido un error al procesar la respuesta del servidor',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la solicitud:', error);
                Swal.fire({
                    title: 'Error',
                    text: 'Ha ocurrido un error al enviar el formulario',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    });
});
</script>
<?php include_once 'includes/inc.footer.php'; ?>