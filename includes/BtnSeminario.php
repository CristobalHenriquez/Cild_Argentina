<style>
    .modal-dialog {
        max-width: 600px;
        /* Ancho máximo para escritorio */
        width: 95%;
        /* Ajuste responsivo para dispositivos más pequeños */
        margin: auto;
    }

    .modal-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        padding: 1rem 1.5rem;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .modal-body {
        padding: 1.5rem;
        line-height: 1.6;
    }

    .modal-footer {
        border-top: 1px solid #dee2e6;
        padding: 1rem 1.5rem;
    }

    .btn-danger {
        font-size: 1rem;
        padding: 0.75rem 1rem;
    }
</style>

<!-- Botones para abrir ventanas -->
<section id="buttons" class="container py-5 text-center">
    <h2>Información adicional</h2>
    <div class="row gap-3 justify-content-center">
        <div class="col-12 col-sm-6 col-lg-4">
            <button class="btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#ventana1" aria-label="Abrir información sobre maestros">
                Maestros
            </button>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
            <button class="btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#ventana2" aria-label="Abrir información sobre inscripciones">
                Inscripciones
            </button>
        </div>
    </div>
</section>

<!-- Ventana 1: Maestros -->
<div class="modal fade" id="ventana1" tabindex="-1" aria-labelledby="ventana1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="ventana1Label">Maestros</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <h3>Concurso Internacional Latinoamérica Danza</h3>
                <p>Las clases del Seminario de Danza del CILD® 2025 estarán a cargo de los siguientes maestros:</p>
                <ul>
                    <li><strong>Clásico Nivel Intermedio:</strong> Alba Serra</li>
                    <li><strong>Clásico Nivel Avanzado:</strong> Alexander Nikolaievich Ananiev</li>
                    <li><strong>Danza Jazz:</strong> Daniel Bartra</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Ventana 2: Inscripciones -->
<div class="modal fade" id="ventana2" tabindex="-1" aria-labelledby="ventana2Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="ventana2Label">Inscripciones</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <h3>Confirmación de Inscripciones</h3>
                <p><strong>Viernes 3/10</strong></p>
                <ul>
                    <li>13:00 a 14:30: Clásico avanzado. Maestro Alexander Ananiev. Clase Grand Prix (obligatoria para participantes Grand Prix).</li>
                    <li>14:30 a 16:00: Clásico intermedio. Maestra Alba Serra. Clase Grand Prix (obligatoria para participantes Grand Prix).</li>
                </ul>
                <p>Para todos los participantes:</p>
                <ul>
                    <li>16:00 a 17:30: Clásico avanzado. Maestro Alexander Ananiev.</li>
                    <li>17:30 a 19:00: Clásico intermedio. Maestra Alba Serra.</li>
                    <li>16:00 a 17:30: Clase jazz. Maestro Daniel Bartra (en escenario).</li>
                </ul>
                <h4>Importes</h4>
                <ul>
                    <li><strong>1 clase:</strong> $20,000 / USD 20</li>
                    <li><strong>2 clases:</strong> $30,000 / USD 30</li>
                    <li><strong>3 clases:</strong> $40,000 / USD 40</li>
                </ul>
                <p>Los maestros que traen a sus alumnas a los cursos pueden presenciar la clase.</p>

                <h4>Medios de Pago</h4>
                <p><strong>Para Depósitos / Transferencias en Argentina (Pesos Argentinos):</strong></p>
                <ul>
                    <li><strong>Banco:</strong> Banco Macro S.A</li>
                    <li><strong>Titular:</strong> Christtin Ramon Omar</li>
                    <li><strong>Caja de Ahorro Nº:</strong> 4014000004760469</li>
                    <li><strong>CBU:</strong> 2850014040000047604694</li>
                    <li><strong>Alias:</strong> FOCA.ANANA.CATRE</li>
                </ul>
                <h4>Depósitos desde el Exterior</h4>
                <p>Western Union a nombre de Ricardo César Ferreira (DNI 22.835.833).</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>