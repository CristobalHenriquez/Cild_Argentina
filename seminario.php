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
