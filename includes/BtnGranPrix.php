<!-- Estilos personalizados para ajustar diseño -->
<style>
    .modal-dialog {
        max-width: 600px;
        margin: auto;
    }

    .modal-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .modal-body {
        padding: 20px;
    }

    .modal-footer {
        border-top: 1px solid #dee2e6;
    }
</style>

<!-- Botones para ventanas emergentes -->
<section id="buttons" class="container py-5 text-center">
    <h2>Información adicional</h2>
    <div class="row gap-2 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <button class="btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#ventana1">Categorías</button>
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
            <button class="btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#ventana5">Variaciones Permitidas</button>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <button class="btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#ventana10">Premios y Becas</button>
        </div>
    </div>
</section>

<!-- Ventana 1: Categorías -->
<div class="modal fade" id="ventana1" tabindex="-1" aria-labelledby="ventana1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="ventana1Label">Categorías</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p>El registro en el GRAND PRIX CILD® 2023 está abierto a todos los bailarines de las modalidades de Clásico de Repertorio y Contemporáneo, clasificándose según estilo y edad del participante.</p>
                <p>Las divisiones serán determinadas por la edad al 4 de octubre de 2025.</p>
                <p><strong>Solistas y Dúos:</strong></p>
                <ul>
                    <li>División Jóvenes: 11 – 12 años (1 variación clásico de repertorio y 1 contemporáneo)</li>
                    <li>División Estudiantes: 13 – 14 años (2 variaciones de clásico de repertorio y 1 contemporáneo)</li>
                    <li>División Junior: 15 – 17 años (2 variaciones de clásico de repertorio y 1 contemporáneo)</li>
                    <li>División Senior: 18 – 26 años (2 variaciones de clásico de repertorio y 1 contemporáneo)</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Ventana 2: Inscripción -->
<div class="modal fade" id="ventana2" tabindex="-1" aria-labelledby="ventana2Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="ventana2Label">Inscripción</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p>La inscripción cerrará indefectiblemente el <strong>22 de septiembre de 2025</strong>.</p>
                <p><strong>Preinscripción:</strong> $10.000 argentinos hasta el <strong>15 de septiembre</strong>.</p>
                <h3>Costos:</h3>
                <ul>
                    <li><strong>Solistas:</strong> U$D 100 (dólares cien)</li>
                    <li><strong>Dúos:</strong> U$D 100 (dólares cien) por cada competidor. Se evalúa de manera independiente.</li>
                </ul>
                <h3>MEDIOS DE PAGO</h3>
                <p>Se abonará en la sede del Concurso el día anterior al inicio del mismo.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Ventana 3: Jurado -->
<div class="modal fade" id="ventana3" tabindex="-1" aria-labelledby="ventana3Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="ventana3Label">Jurado</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p>Los integrantes del jurado son:</p>
                <ul>
                    <li>
                        <button class="btn btn-danger w-80 mb-2" data-bs-toggle="modal" data-bs-target="#ventana6">Daniel Bartra Encina</button>
                    </li>
                    <li>
                        <button class="btn btn-danger w-80 mb-2" data-bs-toggle="modal" data-bs-target="#ventana7">Alexander Nikolaievich Ananiev</button>
                    </li>
                    <li>
                        <button class="btn btn-danger w-80 mb-2" data-bs-toggle="modal" data-bs-target="#ventana8">Alba Serra</button>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Ventana 6: Daniel Bartra -->
<div class="modal fade" id="ventana6" tabindex="-1" aria-labelledby="ventana6Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="ventana6Label">Daniel Bartra Encina</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p>
                    Daniel Bartra es un maestro, coreógrafo y director con vasta trayectoria a nivel nacional e internacional en el área artística y docente.
                </p>
                <p>
                    Creó el Método Bartra de Acondicionamiento Biomecánico Funcional, aplicado en el Seminario de Danzas Clásicas Nora Irinova del Teatro del Libertador General San Martín.
                </p>
                <p>
                    Formado en la Escuela Municipal de Danza Clásica de Corrientes, se perfeccionó con reconocidos maestros en diversas disciplinas. Integró el Ballet de Cámara de Corrientes y el Modern Jazz Ballet en Buenos Aires, siendo contratado por el Teatro Colón.
                </p>
                <p>
                    Participó en televisión para Ideas del Sur en el programa "Soñando por cantar". Ha sido docente en diversas instituciones, como la Universidad Nacional de las Artes y la Fundación Julio Bocca. Además, dicta cursos y charlas en el país y el exterior, y actúa como jurado en certámenes internacionales.
                </p>
                <p>
                    Representó a Argentina en eventos realizados en Ecuador, Libia y Polonia. Actualmente, está radicado en Córdoba, donde continúa con su labor docente y la difusión del Método Bartra, recientemente patentado.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Ventana 7: Alexander Nikolaievich -->
<div class="modal fade" id="ventana7" tabindex="-1" aria-labelledby="ventana7Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="ventana7Label">Alexander Nikolaievich Ananiev</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p>
                    Alexander trabajó como bailarín en compañías rusas como Kirov, Bolshoi y Ensamble P.O.V de Cámara de Moscú, abordando repertorios contemporáneos y folclóricos.
                </p>
                <p>
                    En 1994 llegó a Argentina, alternando roles de bailarín, coreógrafo y maestro en el Instituto Superior de Arte y el Ballet Estable de San Juan. Posteriormente, se desempeñó como ensayista, bailarín solista y coreógrafo.
                </p>
                <p>
                    En el Teatro Colón dictó clases y fue maestro ensayista. Además, participó como jurado en certámenes internacionales.
                </p>
                <p>
                    De 2009 a 2014, fue maestro de ballet en el Centro del Conocimiento y la Academia de Ballet de Moscú en Posadas, Misiones.
                </p>
                <p>
                    Desde 2015, Alexander es maestro y ensayista del Ballet Oficial de Córdoba. También se desempeña como coreógrafo y repositor, además de ser maestro en el Seminario de Danzas Nora Irinova del Teatro del Libertador San Martín en Córdoba.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Ventana 8: Alba Serra -->
<div class="modal fade" id="ventana8" tabindex="-1" aria-labelledby="ventana8Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="ventana8Label">Alba Serra</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p>
                    Alba comenzó sus estudios a los 5 años en Junín con la profesora Sara Cedrola. A los 16 años, se graduó del Instituto Superior de Danzas de Junín.
                </p>
                <p>
                    Practicó gimnasia artística desde los 5 hasta los 17 años en el Club Junín bajo la guía del profesor Cary Mollier. A los 15 años, ganó el concurso Latinoamericano de Ballet, lo que le permitió permanecer en México durante 48 días.
                </p>
                <p>
                    A los 17 años, se mudó a Capital Federal, donde integró el Ballet de la Ciudad de Buenos Aires, el Ballet del Mercosur y Neoclásico. En 1996, ganó el concurso Todo Ballet y pasó un año en Pro Danza de Cuba.
                </p>
                <p>
                    Entre 2001 y 2003, Alba bailó en diversas compañías en Estados Unidos, realizando giras internacionales. En 2007, participó en las aperturas de productos de L'Oreal en eventos destacados como La Rural y el Luna Park. También trabajó en óperas y ballets en el Teatro Colón, obteniendo múltiples medallas en concursos.
                </p>
                <p>
                    Desde 2009, Alba es maestra y ensayista, dirigiendo su propio estudio de ballet y formando a un grupo de jóvenes bailarines talentosos. En 2019, su alumna Romina García Vázquez ganó el concurso Paloma Herrera y recibió becas para el Prix de Lausanne. Ese mismo año, Alba fue invitada a impartir clases en Acámbaro, México.
                </p>
                <p>
                    Sus funciones combinan clásicos de repertorio y obras neoclásicas de su propia creación.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Ventana 4: Competencia -->
<div class="modal fade" id="ventana4" tabindex="-1" aria-labelledby="ventana4Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="ventana4Label">Competencia</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p>El <strong>GRAND PRIX CILD® 2025</strong> se desarrollará en dos rondas y su premiación se realizará al finalizar las mismas.</p>
                <p>La acreditación, grabación de música y ensayo para el Concurso se realizará el día <strong>3 de octubre</strong> a partir de las <strong>8:30 Hs</strong>.</p>

                <h3>Primer día de competencia – 4 de octubre - 14 Hs.</h3>
                <ul>
                    <li><strong>División Jóvenes:</strong> Solistas (1 variación de clásico de repertorio)</li>
                    <li><strong>Divisiones Estudiantes, Junior y Senior:</strong>
                        <ul>
                            <li>Solistas: Presentar 1 variación de clásico de repertorio y 1 de contemporáneo</li>
                            <li>Pas de Deux Clásico sin variaciones</li>
                        </ul>
                    </li>
                </ul>

                <h3>Segundo día de competencia – 5 de octubre - 14 Hs.</h3>
                <ul>
                    <li><strong>División Jóvenes:</strong> Solistas (1 variación de clásico de repertorio)</li>
                    <li><strong>Divisiones Estudiantes, Junior y Senior:</strong>
                        <ul>
                            <li>Solistas: 1 variación de clásico de repertorio</li>
                            <li>Pas de Deux Clásico con variaciones</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Ventana 5: Variaciones Permitidas -->
<div class="modal fade" id="ventana5" tabindex="-1" aria-labelledby="ventana5Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="ventana5Label">Variaciones Permitidas</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p><strong>Variaciones permitidas para las presentaciones de Clásico de Repertorio:</strong></p>
                <ul>
                    <li><strong>Noches de Walpurgis:</strong> Todas las Variaciones</li>
                    <li><strong>Grand Pas Classique de Auber:</strong> Pas de Deux y Variaciones</li>
                    <li><strong>Coppelia:</strong>
                        <ul>
                            <li>Pas de Deux de Swanilda y Franz, Acto II</li>
                            <li>Variaciones</li>
                        </ul>
                    </li>
                    <li><strong>Diana y Acteon:</strong> Pas de Deux y Variaciones</li>
                    <li><strong>Don Quijote:</strong>
                        <ul>
                            <li>Grand Pas de Deux de Kriti y Basil, Acto IV</li>
                            <li>Entrada de Kriti, Acto I</li>
                            <li>Kriti, Acto I</li>
                            <li>Kriti, sueño</li>
                            <li>Mistress de las Dríadas</li>
                            <li>Esmeralda y variaciones del Pas de Deux</li>
                            <li>Cupido</li>
                        </ul>
                    </li>
                    <li><strong>Festival de las Flores de Genzano:</strong> Pas de Deux y Variaciones</li>
                    <li><strong>Giselle:</strong>
                        <ul>
                            <li>Pas Paisan</li>
                            <li>Pas de Deux o Variaciones, Acto I</li>
                            <li>Variación de Mirtha, Acto II</li>
                            <li>Grand Pas de Deux de Giselle y Albert, Acto II</li>
                        </ul>
                    </li>
                    <li><strong>Harlequinade (Satanella):</strong> Pas de Deux y Variaciones</li>
                    <li><strong>La Bayadera:</strong>
                        <ul>
                            <li>Pas de Deux o Variaciones de Gamzatti y Solor</li>
                            <li>Pas de Deux de Nikia y Solor, Acto II</li>
                            <li>Tercera Variación de Sombras, Acto II</li>
                        </ul>
                    </li>
                    <li><strong>La File Mal Gardee:</strong> Pas de Deux de Lisa y Colin, Acto III y Variaciones</li>
                    <li><strong>La Sylphide:</strong> Variaciones del Pas de Deux</li>
                    <li><strong>El Corsario:</strong>
                        <ul>
                            <li>Pas de Deux de Sclave y el Merchant, Acto II</li>
                            <li>Odaliscas</li>
                        </ul>
                    </li>
                    <li><strong>Paquita:</strong> Todas las Variaciones</li>
                    <li><strong>Raymonda:</strong> Todas las Variaciones</li>
                    <li><strong>La Bella Durmiente:</strong>
                        <ul>
                            <li>Variaciones de las Hadas</li>
                            <li>Aurora, Acto I y Acto II</li>
                            <li>El Príncipe, Acto II</li>
                            <li>Pas de Deux y Variaciones</li>
                        </ul>
                    </li>
                    <li><strong>Lago de los Cisnes:</strong>
                        <ul>
                            <li>Pas de Trois, Acto I y Variaciones</li>
                            <li>Pas de Deux de Odile, sus Variaciones y Sigfrido</li>
                        </ul>
                    </li>
                    <li><strong>Talismán:</strong> Pas de Deux y sus Variaciones</li>
                    <li><strong>Llama de París:</strong> Pas de Deux y Variaciones</li>
                    <li><strong>El Cascanueces:</strong> Pas de Deux y Variaciones</li>
                    <li><strong>Laurencia:</strong> Variación de Laurencia</li>
                    <li><strong>El Despertar de Flora</strong></li>
                    <li><strong>Fairy Doll</strong></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

<!-- Ventana 10: Premios y Becas -->
<div class="modal fade" id="ventana10" tabindex="-1" aria-labelledby="ventana10Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="ventana10Label">Premios y Becas</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p>Los premios serán entregados finalizado el <strong>GRAND PRIX CILD</strong> (5/10/2025).</p>

                <h3>Premios:</h3>
                <ul>
                    <li><strong>1º Premio:</strong> Medalla</li>
                    <li><strong>2º Premio:</strong> Medalla</li>
                    <li><strong>3º Premio:</strong> Medalla</li>
                </ul>

                <h3>Becas GRAND PRIX CILD® 2025:</h3>
                <ul>
                    <li><strong>Cuban Classical Ballet School</strong> (Miami - EEUU): Summer Class 2024 y actuación en el Festival Internacional de Miami.</li>
                    <li><strong>Salzburg International Ballet Academy</strong> (Austria)</li>
                    <li><strong>Ajkun Ballet Theatre</strong> (Nueva York - EEUU)</li>
                    <li><strong>Arts Ballet Theater School</strong> (Miami - EEUU):
                        <ul>
                            <li>Curso de verano</li>
                        </ul>
                    </li>
                    <li><strong>Escuela Fundación Julio Bocca</strong> (Capital Federal - Argentina)</li>
                    <li><strong>Open Ballet School</strong> (Paraná – Entre Ríos – Argentina):
                        <ul>
                            <li>Curso intensivo de verano y vacaciones de invierno (Fecha a convenir con el alumno)</li>
                        </ul>
                    </li>
                    <li><strong>Estudio Alba Serra</strong> (Capital Federal – Argentina)</li>
                    <li><strong>Escuela de Ballet Adriana Assaf</strong> (San Pablo – Brasil): Summer Class 2026 y actuación con el grupo de ballet.</li>
                    <li><strong>Barcelona Dance Center</strong> (Barcelona – España)</li>
                </ul>

                <p>Los premiados son seleccionados para participar del <strong>Miami International Ballet Competition 2026</strong> (Miami - EEUU).</p>

                <p class="mt-3 text-danger"><em>Nota:</em> <strong>Las becas de estudio y selectivos NO incluyen pasajes ni alojamiento.</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>