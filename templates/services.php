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
                                <?php echo $item['nombre'].' '.$item['app'].' '.$item['apm']; ?>
                            </strong>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">[<?php echo strtoupper($item['nombre_ins']); ?>]</h6>
                            <h6><?php echo $item['service']; ?></h6>
                            <p class="card-text">
                                <?php echo $item['proy']; ?>
                            </p>
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

<?php require_once "footer.php"; ?>