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
                <input type="file" class="form-control" name="file_pago" accept=".pdf" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Archivo MP3 (opcional)</label>
                <input type="file" class="form-control" name="file_musica" accept=".mp3" required>
            </div>

            <!-- Botón de envío -->
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary">Enviar formulario</button>
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