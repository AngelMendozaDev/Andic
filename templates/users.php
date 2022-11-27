<?php
require_once "header.php";
require_once "../models/Comunity.php";
$model = new Comunity();
$request = $model->getUsers();
?>
<link rel="stylesheet" href="../resources/css/users.css">
<link rel="stylesheet" href="../resources/libs/datatable/css/dataTables.bootstrap5.min.css">

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
        <form onsubmit="return sendInfo()" method="POST" class="form-users" id="form-users">
            <input type="text" value="newUser" id="Action" name="Action" hidden>
            <div class="input-group mb-3" style="width: 200px;">
                <span class="input-group-text">
                    Folio:
                </span>
                <input type="text" class="form-control" style="font-weight: 700;" id="folio" readonly>
            </div>

            <div class="flex-cont mb-3">
                <div class="input-group">
                    <span class="input-group-text">Nombre:</span>
                    <input type="text" name="nombre" id="nombre" class="form-control" maxlength="30" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Paterno:</span>
                    <input type="text" name="app" id="app" class="form-control" maxlength="25" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Materno:</span>
                    <input type="text" name="apm" id="apm" class="form-control" maxlength="25" required>
                </div>
            </div>

            <div class="flex-cont mb-3">
                <div class="input-group">
                    <label class="input-group-text">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" name="nacimiento" id="nac" required="required">
                </div>

                <div class="input-group">
                    <label class="input-group-text">Sexo:</label>
                    <select name="sexo" id="sexo" class="form-select" required>
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
                    <input type="number" class="form-control" name="phone" id="phone" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                </div>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Calle y Numero:</span>
                <input type="text" class="form-control" name="street" id="calle" maxlength="60" style="text-transform: uppercase;" required>
            </div>
            <div class="flex-cont">
                <div class="input-group">
                    <span class="input-group-text">Codigo Postal:</span>
                    <input type="number" class="form-control" name="codePos" id="codePos" maxlength="6" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Colonia:</span>
                    <select name="col" id="col" class="form-select" required>
                        <option value="" selected="true" disabled>Selecciona una Colonia</option>
                    </select>
                </div>
            </div>

            <div class="flex-cont">
                <div class="input-group">
                    <span class="input-group-text">Municipio:</span>
                    <input type="text" class="form-control" id="mun" readonly>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Estado:</span>
                    <input type="text" class="form-control" id="edo" readonly>
                </div>
            </div>

            <center>
                <button class="btn btn-success" type="submit">
                    <i class="fas fa-save    "></i>
                    Guardar Información
                </button>
            </center>

        </form>
    </div>

    <div class="row mb-5 mt-3 w-100" id="TableUser" class="tableBox">
        <table class="table table-striped table-bordered table-hover table-responsive" id="table-Us">
            <thead class="thead-inverse">
                <tr class="text-center">
                    <th>Folio</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Mail</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $request->fetch_assoc()) { ?>
                    <tr class="text-center">
                        <td scope="row"><?php echo $item['id_p']; ?></td>
                        <td><?php echo $item['nombre']; ?></td>
                        <td><?php echo $item['app']; ?></td>
                        <td><?php echo $item['apm']; ?></td>
                        <td><?php echo $item['correo']; ?></td>
                        <td>
                            <button class="btn btn-primary btn-small" onclick="viewUser(`<?php echo $item['id_p']; ?>`)">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-success btn-small">
                                <i class="fa fa-unlock" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once "footer.php"; ?>
<script src="../resources/libs/datatable/js/jquery.dataTables.min.js"></script>
<script src="../resources/libs/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="../resources/libs/datatable/js/dataTables.buttons.min.js"></script>
<script>
    viewFlag = "<?php if (isset($_GET['view'])) echo $_GET['view'];
                else echo 'N'; ?>";
</script>
<script src="../resources/js/users.js"></script>