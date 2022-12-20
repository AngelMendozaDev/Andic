<?php
require_once "header.php";
require_once "../models/Practicas.php";
$model = new Practicas();
$request = $model->getPracticas();
?>
<link rel="stylesheet" href="../resources/css/services.css">

<div class="container">
    <div class="row text-center mb-2 mt-3">
        <h3>Servicio Social / Residencias</h3>
    </div>
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
                                <button class="btn btn-info btn-small" data-bs-toggle="modal" data-bs-target="#practiqueModal">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-success btn-small">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-danger btn-small">
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
            <div class="card">
                <div class="card-header">
                    PERSON NAME
                </div>
                <div class="card-body">
                    <h5 class="card-title">[TYPE SERVICES]</h5>
                    <h6>PROYECT TITLE</h6>
                    <p class="card-text">Proyect- description - With supporting text below as a natural lead-in to additional content.</p>
                    <center>
                        <button class="btn btn-info btn-small">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-success btn-small">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-danger btn-small">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="columna">
        <div class="head-col">
            <h1>En Curso</h1>
        </div>
        <div class="body-col">
            <div class="card">
                <div class="card-header">
                    PERSON NAME
                </div>
                <div class="card-body">
                    <h5 class="card-title">[TYPE SERVICES]</h5>
                    <h6>PROYECT TITLE</h6>
                    <p class="card-text">Proyect- description - With supporting text below as a natural lead-in to additional content.</p>
                    <center>
                        <button class="btn btn-info btn-small">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-success btn-small">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-danger btn-small">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </button>
                    </center>
                </div>
            </div>
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
                <form action="">
                    <div class="input-flex mb-3">
                        <div class="input-group">
                            <span class="input-group-text">
                                Persona:
                            </span>
                            <input type="text" class="form-control">
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">
                                Escuela:
                            </span>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            Carrera:
                        </span>
                        <input type="text" class="form-control">
                    </div>

                    <div class="input-flex mb-3">
                        <div class="input-group">
                            <span class="input-group-text">
                                Servicio:
                            </span>
                            <input type="text" class="form-control">
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">

                            </span>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php require_once "footer.php"; ?>