<?php
require_once "header.php";
require_once "../models/institud.php";
$model = new Institud();

$rquest = $model->getInstituciones();
?>
<link rel="stylesheet" href="../resources/css/instituciones.css">
<link rel="stylesheet" href="../resources/libs/datatable/css/dataTables.bootstrap5.min.css">

<div class="container mb-3 mt-3">
    <div class="row text-center mb-3">
        <h3>Convenios e instituciones</h3>
    </div>
    <div class="row mb-3">
        <div class="MenuLabel">
            <btn onclick="vistas('N')" class="textLabel" id="register">
                Nuevo Convenio
                &nbsp;
                <i class="fa fa-user-plus" aria-hidden="true"></i>
            </btn>
            <label onclick="vistas('T')" class="textLabel" id="tableI">
                Consulta de instituciones
                &nbsp;
                <i class="fas fa-table    "></i>
            </label>
        </div>
    </div>
    <div class="row mb-3" id="newInst">
        <form onsubmit="return sendInfo()" method="POST" id="form-institucion">
            <input type="text" value="newInst" name="action" id="action" hidden>
            <div class="input-group mb-3 cct">
                <span class="input-group-text">(CCT):</span>
                <input type="text" class="form-control" maxlength="18" style="text-transform: uppercase;" name="cct" id="cct" placeholder="Clave del Centro de Trabajo" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">
                    Nombre de Institución:
                </span>
                <input type="text" class="form-control" maxlength="70" name="name" id="name" style="text-transform: uppercase;" required>
            </div>

            <div class="input-flex mb-3">
                <div class="input-group">
                    <span class="input-group-text">
                        Lider de institucion:
                    </span>
                    <input type="text" class="form-control" maxlength="40" name="lider" id="lider" style="text-transform: uppercase;" placeholder="Ingresar con su grado academico (ING. LIC. DR. MTRO.)" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">
                        Representante:
                    </span>
                    <input type="text" class="form-control" maxlength="40" name="representante" id="representante" style="text-transform: uppercase;" required>
                </div>
            </div>

            <div class="input-flex mb-3">
                <div class="input-group">
                    <span class="input-group-text">Teléfono:</span>
                    <input type="number" class="form-control" name="phone" id="phone" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Sector de la empresa:</span>
                    <select class="form-select" name="tipoIns" id="tipoIns" required>
                        <option value="" selected disabled>Selecciona una opción</option>
                        <option value="1">Educación Pública</option>
                        <option value="2">Educación Privada</option>
                        <option value="3">PyMES</option>
                        <option value="4">Emprendimiento</option>
                        <option value="5">Salud/Bienestar</option>
                    </select>
                </div>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Direccion" id="direccion" name="direccion" style="text-transform: uppercase;" rows="5" minlength="10" maxlength="100" required></textarea>
                <label for="direccion">Dirección:</label>
            </div>

            <center>
                <button class="btn btn-success" id="btn-form">
                    <i class="fa fa-save" aria-hidden="true"></i>
                    &nbsp; Guardar Convenio
                </button>
            </center>

        </form>
    </div>

    <div class="row mb-3" id="table-s">
        <div class="cont-sig" style="position: relative;">
            <span style="position: absolute; top: -10px; right: 20px; font-size: 20px; color: #ff0000; background-color: #fff;" id="btn-close-s">
                <i class="fa fa-times-circle icons" aria-hidden="true"></i>
            </span>
        </div>
        <form onsubmit="return newServices()" method="POST" id="form-servicio">
            <input type="text" value="newService" name="action" id="action-s" hidden>
            <div class="input-group mb-2 cct">
                <span class="input-group-text">
                    Institucion:
                </span>
                <input type="text" class="form-control" maxlength="18" name="cct" id="institud" style="text-transform: uppercase;" readonly required>
            </div>
            <div class="input-group mb-2" id="servicesI">
                <span class="input-group-text">
                    Servicio que ofrece:
                </span>
                <input type="text" class="form-control" maxlength="60" name="service" id="service" placeholder="Servicios" style="text-transform: uppercase;" required>
                <button class="btn btn-success" id="btn-services">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    &nbsp; Agregar Servicio
                </button>
            </div>
        </form>
        <hr style="width: 80%; margin: auto; margin-bottom: 30px; margin-top: 10px; color: #000;">
        <div class="table-box">
            <table class="table table-striped table-hover table-responsive table-bordered" id="myTable">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>Servicio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="lienzo-services">
                    <tr class="text-center">
                        <td width=80%>someText</td>
                        <td width=20%>
                            <button class="btn btn-warning btn-small">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-danger btn-small">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mb-3 h-100" id="table-inst">
        <table class="table table-hover table-bordered table-striped table-responsive" id="table-instituciones">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>FOLIO</th>
                    <th>INSTITUCION</th>
                    <th>REPRESENTANTE</th>
                    <th>CONTACTO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = $rquest->fetch_assoc()) { ?>
                    <tr class="text-center">
                        <td><strong> <?php echo $data['clave']; ?> </strong> </td>
                        <td class="name_box"> <?php echo $data['nombre_ins']; ?> </td>
                        <td class="repre_box"> <?php echo $data['sub']; ?> </td>
                        <td class="phone_box"> <?php echo $data['phone']; ?> </td>
                        <td>
                            <button class="btn btn-primary btn small" onclick="getInstitud('<?php echo $data['clave']; ?>')">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-warning btn-small" onclick="getServices('<?php echo $data['clave']; ?>')">
                                <i class="fa fa-list" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-danger btn-small" onclick="deleteInst('<?php echo $data['clave']; ?>')">
                                <i class="fa fa-power-off" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once "footer.php"; ?>
<script>
    viewFlag = "<?php if (isset($_GET['view'])) echo $_GET['view'];
                else echo  'N'; ?>";
</script>
<script src="../resources/js/instituciones.js"></script>
<script src="../resources/libs/datatable/js/jquery.dataTables.min.js"></script>
<script src="../resources/libs/datatable/js/dataTables.bootstrap5.min.js"></script>