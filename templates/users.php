<?php require_once "header.php"; ?>
<link rel="stylesheet" href="../resources/css/users.css">

<div class="container mt-5 mb-3">
    <div class="row">
        <div class="MenuLabel">
            <btn onclick="vistas('N')" class="textLabel" id="register">
                Registro de Usuarios
                &nbsp;
                <i class="fa fa-user-plus" aria-hidden="true"></i>
            </btn>
            <label onclick="vistas('T')" class="textLabel" id="tableU">
                Consulta de Usuarios
                &nbsp;
                <i class="fas fa-table    "></i>
            </label>
        </div>
    </div>
    <div class="row h-100 mt-3 mb-5" id="newUser">
        <form action="" method="POST" class="form-users">
            <div class="input-group mb-3" style="width: 200px;">
                <span class="input-group-text">
                    Folio:
                </span>
                <input type="text" class="form-control" id="folio" readonly>
            </div>

            <div class="flex-cont mb-3">
                <div class="input-group">
                    <span class="input-group-text">Nombre:</span>
                    <input type="text" name="" id="" class="form-control" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Paterno:</span>
                    <input type="text" name="" id="" class="form-control" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Materno:</span>
                    <input type="text" name="" id="" class="form-control" required>
                </div>
            </div>

            <div class="flex-cont mb-3">
                <div class="input-group">
                    <label class="input-group-text">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" name="nacimiento" id="nac" required="required">
                </div>

                <div class="input-group">
                    <label class="input-group-text">Sexo:</label>
                    <select name="sexo" id="sexo" class="form-select">
                        <option value="" selected="true" disabled>Selecciona tu Sexo</option>
                        <option value="H">Hombre</option>
                        <option value="M">Mujer</option>
                        <option value="P">Prefiero no decirlo</option>
                    </select>
                </div>
            </div>
            <div class="flex-cont">
                <div class="input-group">
                    <span class="input-group-text">Correo:</span>
                    <input type="mail" class="form-control" name="mail" id="mail" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Telefono:</span>
                    <input type="number" class="form-control" name="phone" id="phone" required>
                </div>
            </div>

            <div class="flex-cont">
                <div class="input-group">
                    <span class="input-group-text">Codigo Postal:</span>
                    <input type="text" class="form-control">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Colonia:</span>
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="flex-cont">
                <div class="input-group">
                    <span class="input-group-text">Municipio:</span>
                    <input type="text" class="form-control">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Estado:</span>
                    <input type="text" class="form-control">
                </div>
            </div>

        </form>
    </div>

    <div class="row mb-5 mt-3" id="TableUser">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Some Title</th>
                    <th>Some Title</th>
                    <th>Some Title</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">Some Text</td>
                    <td>Some Text</td>
                    <td>Some Text</td>
                </tr>
                <tr>
                    <td scope="row">Some Text</td>
                    <td>Some Text</td>
                    <td>Some Text</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require_once "footer.php"; ?>
<script src="../resources/js/users.js"></script>