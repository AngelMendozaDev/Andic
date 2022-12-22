<?php
require_once "header.php";
require_once "../models/Practicas.php";
$model = new Practicas();
$request = $model->getPracticas();
$request2 = $model->getPracticas();
$request3 = $model->getPracticas();
$request4 = $model->getPracticasT();
?>
<link rel="stylesheet" href="../resources/css/registro.css">
<link rel="stylesheet" href="../resources/css/services.css">
<link rel="stylesheet" href="../resources/libs/datatable/css/dataTables.bootstrap5.min.css">

<div class="container mb-3">
    <div class="row text-center mb-2 mt-3">
        <h3>Servicio Social / Residencias</h3>
    </div>
</div>

<div class="cont-btn">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#table-modal">
        Ver Concentrado &nbsp; <i class="fas fa-clock    "></i>
    </button>
</div>

<div class="tablero mb-5">
    <div class="columna">
        <div class="head-col">
            <h1>Solicitud</h1>
        </div>
        <hr class="separador">
        <div class="body-col">
            <?php while ($item = $request->fetch_assoc()) {
                if ($item['estado'] == 1) { ?>
                    <div class="card" id="card-<?php echo $item['folio_p'] ?>">
                        <div class="card-header">
                            <strong>
                                <?php echo $item['nombre'] . ' ' . $item['app'] . ' ' . $item['apm']; ?>
                            </strong>
                        </div>
                        <div class="card-body">
                            <p class="name_inst"><?php echo strtoupper($item['nombre_ins']); ?></p>
                            <h6 class="card-title">[<?php if ($item['tipo'] == 'S') echo 'SERVICIO SOCIAL';
                                                    else echo 'RESIDENCIA PROFECIONAL' ?>]</h6>
                            <p><?php echo $item['service']; ?></p>
                            <p class="card-text">
                                <?php echo $item['proy']; ?>
                            </p>
                            <center>
                                <button class="btn btn-info btn-small" data-bs-toggle="modal" data-bs-target="#practiqueModal" onclick="getPractica('<?php echo $item['folio_p'] ?>')">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-success btn-small" onclick="changeStatus(`<?php echo $item['folio_p'] ?>`, `2`)">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-danger btn-small" onclick="changeStatus(`<?php echo $item['folio_p'] ?>`, `5`)">
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </button>
                            </center>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
    <div class="columna">
        <div class="head-col">
            <h1>Aceptados</h1>
        </div>
        <div class="body-col">
            <?php while ($item = $request2->fetch_assoc()) {
                if ($item['estado'] == 2) { ?>
                    <div class="card" id="card-<?php echo $item['folio_p'] ?>">
                        <div class="card-header">
                            <strong>
                                <?php echo $item['nombre'] . ' ' . $item['app'] . ' ' . $item['apm']; ?>
                            </strong>
                        </div>
                        <div class="card-body">
                            <p class="name_inst"><?php echo strtoupper($item['nombre_ins']); ?></p>
                            <h6 class="card-title">[<?php if ($item['tipo'] == 'S') echo 'SERVICIO SOCIAL';
                                                    else echo 'RESIDENCIA PROFECIONAL' ?>]</h6>
                            <p><?php echo $item['service']; ?></p>
                            <p class="card-text">
                                <?php echo $item['proy']; ?>
                            </p>
                            <center>
                                <a class="btn btn-primary btn-small" href="../Letters/carta.php?ID=<?php echo $item['folio_p']; ?>" target="_blank">
                                    <i class="fa fa-file-alt" aria-hidden="true"></i>
                                </a>
                                <button class="btn btn-success btn-small" onclick="changeStatus(`<?php echo $item['folio_p'] ?>`, `3`)">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-danger btn-small" onclick="changeStatus(`<?php echo $item['folio_p'] ?>`, `1`)">
                                    <i class="fa fa-undo" aria-hidden="true"></i>
                                </button>
                            </center>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
    <div class="columna">
        <div class="head-col">
            <h1>En Curso</h1>
        </div>
        <div class="body-col">
            <?php while ($item = $request3->fetch_assoc()) {
                if ($item['estado'] == 3) { ?>
                    <div class="card" id="card-<?php echo $item['folio_p'] ?>">
                        <div class="card-header">
                            <strong>
                                <?php echo $item['nombre'] . ' ' . $item['app'] . ' ' . $item['apm']; ?>
                            </strong>
                        </div>
                        <div class="card-body">
                            <p class="name_inst"><?php echo strtoupper($item['nombre_ins']); ?></p>
                            <h6 class="card-title">[<?php if ($item['tipo'] == 'S') echo 'SERVICIO SOCIAL';
                                                    else echo 'RESIDENCIA PROFECIONAL' ?>]</h6>
                            <p><?php echo $item['service']; ?></p>
                            <p class="card-text">
                                <?php echo $item['proy']; ?>
                            </p>
                            <center>
                                <a class="btn btn-primary btn-small" href="../Letters/carta2.php?ID=<?php echo $item['folio_p']; ?>" target="_blank">
                                    <i class="fa fa-file-alt" aria-hidden="true"></i>
                                </a>
                                <button class="btn btn-success btn-small" onclick="changeStatus(`<?php echo $item['folio_p'] ?>`, `4`)">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-danger btn-small" onclick="changeStatus(`<?php echo $item['folio_p'] ?>`, `1`)">
                                    <i class="fa fa-undo" aria-hidden="true"></i>
                                </button>
                            </center>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>


<!-- Modal View -->
<div class="modal fade" id="practiqueModal" tabindex="-1" aria-labelledby="practiqueModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="practiqueModalLabel">Detalles de Estancia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="return false" method="POST" class="col-12" id="form-practicas">
                    <input type="text" name="action" id="rol" value="UpdateRegistro" hidden>
                    <div class="flex-input">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" class="form-control" id="name-user" readonly>
                            <input type="text" id="user" name="user" hidden>
                        </div>
                        <div class="input-group w-50">
                            <span class="input-group-text">
                                <i class="fas fa-school"></i>
                            </span>
                            <input type="text" class="form-control" id="name-escuela" readonly>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-user-tag    "></i>
                        </span>
                        <select name="escuela" id="escuela" class="form-select" required>
                            <option value="" selected disabled>Selecciona una Carrera/Oficio </option>
                        </select>
                    </div>

                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa fa-handshake" aria-hidden="true"></i>
                        </span>
                        <select name="tipo-p" id="tipo-p" class="form-select" required>
                            <option value="" selected disabled>Selecciona el tipo de estancia</option>
                            <option value="S">Servicio Social</option>
                            <option value="R">Residencias Profecionales</option>
                        </select>
                    </div>

                    <hr>
                    <div class="flex-input">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-id-card" aria-hidden="true"></i>
                            </span>
                            <input type="text" class="form-control" name="matricula" id="matricula" required>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            </span>
                            <select name="semestre" class="form-select" id="semestre" required>
                                <option value="" selected disabled>Selecciona tu Semestre</option>
                                <option value="1">1°</option>
                                <option value="2">2°</option>
                                <option value="3">3°</option>
                                <option value="4">4°</option>
                                <option value="5">5°</option>
                                <option value="6">6°</option>
                                <option value="7">7°</option>
                                <option value="8">8°</option>
                                <option value="9">9°</option>
                                <option value="10">10°</option>
                                <option value="11">11°</option>
                                <option value="12">12°</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex-input">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-calendar-plus" aria-hidden="true"></i>
                            </span>
                            <input type="date" class="form-control" name="fecha_in" id="fecha_in" required>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-calendar-minus    "></i>
                            </span>
                            <input type="date" class="form-control" name="fecha_fn" id="fecha_fin" required>
                        </div>
                    </div>

                    <hr>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-newspaper"></i>
                        </span>
                        <input type="text" class="form-control" name="name-proy" id="name-proy" maxlength="80" placeholder="Nombre del Proyecto" required>
                    </div>

                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Maximo 500 Caracteres" id="proyecto" style="height: 100px" maxlength="500" name="des-proy" required></textarea>
                        <label for="proyecto">Descripcion del proyecto:</label>
                    </div>
                    <br>
                    <!-- <center>
                        <button class="btn btn-success">
                            Actualizar
                            <i class="fa fa-unlock" aria-hidden="true"></i>
                        </button>

                    </center> -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    Close
                    <i class="fa fa-undo" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="table-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="table-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="table-modalLabel">Historial de Servicios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-container">
                    <table class="table table-hover table-bordered table-responsive" id="table">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>Matricula</th>
                                <th style="width: 200px;">Nombre</th>
                                <th style="width: 200px;">Institucion</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Inicio</th>
                                <th>Final</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($item = $request4->fetch_assoc()){
                                switch($item['estado']){
                                    case 1:
                                        $estado = "Solicitud";
                                    break;
                                    case 2:
                                        $estado = "Aceptado";
                                    break;
                                    case 3:
                                        $estado = "Curso";
                                    break;
                                    case 4:
                                        $estado = "Finalizado";
                                    break;
                                    case 5:
                                        $estado = "Rechazado";
                                    break;
                                } ?>
                            <tr class="text-center estado_<?php echo $item['estado'] ?>">
                                <td><?php echo $item['matricula']; ?></td>
                                <td><?php echo $item['nombre']." ".$item['app']." ".$item['apm']; ?></td>
                                <td><?php echo $item['nombre_ins']; ?></td>
                                <td><?php echo $item['tipo'] == 'S' ? "SERVICIO SOCIAL":"RESIDENCIAS PROFECIONALES"; ?></td>
                                <td><?php echo $estado; ?></td>
                                <td><?php echo $item['inicio']; ?></td>
                                <td><?php echo $item['fin']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>

<?php require_once "footer.php"; ?>
<script src="../resources/libs/datatable/js/jquery.dataTables.min.js"></script>
<script src="../resources/libs/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="../resources/js/practicas.js"></script>