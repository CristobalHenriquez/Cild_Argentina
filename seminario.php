<?php include_once 'includes/inc.head.php'; ?>

<main class="main">

  <section id="seminario" class="container py-5">
    <h1>Seminario</h1>
    <p>En esta edición del CILD® 2025, se realiza un Seminario de Danza enmarcado dentro del Concurso y abierto a todos los bailarines que deseen realizar el mismo, sean o no participantes del CILD®.
      Como destacable, se dictarán clases de danza clásica con los maestros Alexandre Ananiev, Alba Serra y Daniel Bartra.
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
        <p>Selecciona los cursos a los que deseas inscribirte:</p>

        <div class="mb-3">
          <h4>Viernes 3/10</h4>
          <p><strong>Clases Grand Prix (obligatorias para participantes Grand Prix):</strong></p>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="curso1" name="cursos[]" value="GP-clasico-avanzado">
            <label class="form-check-label" for="curso1">13:00 a 14:30 - Clásico avanzado con el maestro Alexander Ananiev</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="curso2" name="cursos[]" value="GP-clasico-intermedio">
            <label class="form-check-label" for="curso2">14:30 a 16:00 - Clásico intermedio con la maestra Alba Serra</label>
          </div>
        </div>

        <div class="mb-3">
          <p><strong>Para todos los participantes:</strong></p>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="curso3" name="cursos[]" value="clasico-avanzado">
            <label class="form-check-label" for="curso3">16:00 a 17:30 - Clásico avanzado con el maestro Alexander Ananiev</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="curso4" name="cursos[]" value="clasico-intermedio">
            <label class="form-check-label" for="curso4">17:30 a 19:00 - Clásico intermedio con la maestra Alba Serra</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="curso5" name="cursos[]" value="jazz">
            <label class="form-check-label" for="curso5">16:00 a 17:30 - Clase jazz con el maestro Daniel Bartra (en escenario)</label>
          </div>
        </div>

        <p class="mt-3"><small>Nota: Los maestros que traen a sus alumnas a los cursos pueden presenciar la clase.</small></p>
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

        // Validación básica del formulario
        const requiredFields = $(this).find('[required]');
        let isValid = true;

        requiredFields.each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('error');
            } else {
                $(this).removeClass('error');
            }
        });

        if (!isValid) {
            Swal.fire({
                title: 'Error',
                text: 'Por favor, completa todos los campos requeridos',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
            return;
        }

        // Mostrar indicador de carga
        const loadingSwal = Swal.fire({
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
            dataType: 'json',
            success: function(response) {
                console.log('Respuesta recibida (raw):', response);
                console.log('Respuesta recibida (parsed):', JSON.parse(JSON.stringify(response)));
                console.log('Respuesta recibida:', response);
                console.log('Tipo de respuesta:', typeof response);
                console.log('¿Es un objeto?', response instanceof Object);
                console.log('¿Tiene la propiedad success?', 'success' in response);

                // Cerrar el diálogo de carga
                loadingSwal.close();

                if (response && typeof response === 'object') {
                    console.log('Entrando en la condición principal');
                    if (response.success === true) {
                        console.log('Condición de éxito detectada');
                        Swal.fire({
                            title: '¡Éxito!',
                            text: response.message || 'Tu inscripción ha sido enviada correctamente.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if (result.isConfirmed && response.redirect) {
                                window.location.href = response.redirect;
                            }
                        });
                    } else {
                        console.log('Condición de error detectada');
                        console.log('Valor de response.success:', response.success);
                        Swal.fire({
                            title: 'Error',
                            text: response.message || 'Ha ocurrido un error al procesar la inscripción',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                } else {
                    console.log('La respuesta no es un objeto válido');
                    console.error('Respuesta inesperada del servidor:', response);
                    Swal.fire({
                        title: 'Error',
                        text: 'Ha ocurrido un error inesperado. Por favor, intenta nuevamente.',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la solicitud AJAX:', {
                    status: status,
                    error: error,
                    responseText: xhr.responseText
                });

                let errorMessage = 'Ha ocurrido un error al enviar el formulario. Por favor, intenta nuevamente.';

                // Intentar parsear la respuesta como JSON
                try {
                    const jsonResponse = JSON.parse(xhr.responseText);
                    if (jsonResponse && jsonResponse.message) {
                        errorMessage = jsonResponse.message;
                    }
                } catch (e) {
                    console.error('No se pudo parsear la respuesta como JSON:', e);
                }

                // Cerrar el diálogo de carga
                loadingSwal.close();

                Swal.fire({
                    title: 'Error',
                    text: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    });

    // Agregar estilos para campos con error
    $('<style>')
        .text('.error { border-color: red !important; }')
        .appendTo('head');
});
</script>
<script>
    // Función para imprimir la respuesta del servidor en la consola
    function printServerResponse() {
        fetch('process_form.php')
            .then(response => response.text())
            .then(data => {
                console.log('Respuesta del servidor (GET):', data);
            })
            .catch(error => {
                console.error('Error al obtener la respuesta del servidor:', error);
            });
    }

    // Llamar a la función cuando se carga la página
    printServerResponse();
</script>
<?php include_once 'includes/inc.footer.php'; ?>

