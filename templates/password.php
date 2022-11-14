<?php require_once "header.php"; ?>
<link rel="stylesheet" href="../resources/css/pass.css">
<!-- Code View -->

<div class="container">
    <div class="row text-center">
        <h4 class="view-title">
            Cambio de Contraseña
        </h4>
    </div>

    <div class="row">
        <div class="alert alert-warning" role="alert">
            El cambio de contraseña es ilimitado, asegurate guardar tu nueva contraseña en un lugar seguro,
            es indispensable que para este proceso rwcuerdes tu contraseña actual.
            <br>
            <strong>
                Nota: Una vez se efectue el cambio de contraseña, deberas loguearte de nuevo!
            </strong>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-12">
            <form method="POST" onsubmit="return false" id="form-pass">
                <input type="password" class="my-input" maxlength="20" placeholder="Ingresa Tu contraseña actual" id="Actual" name="actual" required>
                <hr class="separador" style="color: #000; margin-top: 30px; margin-bottom: 30px;">
                <div class="pass-cont">
                    <input type="password" class="my-input" maxlength="20" placeholder="Ingresa tú nueva Contraseña" id="Pass1" name="pass1" required>
                    <span class="text-error">
                        La nueva contraseña no coincide...
                    </span>
                </div>
                <div class="pass-cont">
                    <input type="password" class="my-input" maxlength="20" placeholder="Confirma Contraseña" id="Pass2" name="pass2" required>
                    <span class="text-error">
                        La nueva contraseña no coincide...
                    </span>
                </div>

                <button class="btn btn-success">
                    <i class="fa fa-save" aria-hidden="true"></i>
                    &nbsp;
                    Guardar Información
                </button>
            </form>
        </div>
    </div>
</div>


<?php require_once "footer.php"; ?>
<script src="../resources/js/pass.js"></script>