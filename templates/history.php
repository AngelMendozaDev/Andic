<?php require_once "header.php";
require_once "../models/History.php";
$model = new History();
$request = $model->getNoticias();
?>
<link rel="stylesheet" href="../resources/css/users.css">
<link rel="stylesheet" href="../resources/libs/datatable/css/dataTables.bootstrap5.min.css">

<div class="container mt-5 mb-3">
    <div class="row">
        <div class="MenuLabel">
            <btn onclick="vistas('N')" class="textLabel" id="register">
                Registro de Noticia
                &nbsp;
                <i class="fa fa-newspaper" aria-hidden="true"></i>
            </btn>
            <label onclick="vistas('T')" class="textLabel" id="tableH">
                Consultar Noticias
                &nbsp;
                <i class="fas fa-table"></i>
            </label>
        </div>
    </div>
    <div class="row h-100 mt-3 mb-5" id="newHistory">
        <form action="../controllers/history.php" method="POST" enctype="multipart/form-data" class="form-users" id="form-history">
            <input type="text" name="action" id="action" value="newNot" hidden>
            <div class="flex-cont mb-3">
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                    <select name="año" id="año" class="form-select" required>
                        <option value="" disabled selected>Selecciona un año...</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa fa-italic" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="form-control" name="title" maxlength="60" placeholder="Titulo de Noticia" required>
                </div>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
                <input type="file" accept="image/*" name="image" id="image" class="form-control" placeholder="Media JPG, JPEG, PNG." required>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Cuentanos que ocurrio!" id="flotingDescrip" style="height: 100px" name="texto"></textarea>
                <label for="flotingDescrip">Cuentanos que ocurrio!!!</label>
            </div>

            <center>
                <button class="btn btn-success" id="btn-form" type="submit">
                    <i class="fas fa-save"></i>
                    &nbsp;
                    Guardar Información
                </button>
            </center>

        </form>
    </div>

    <div class="row mb-5 mt-3 w-100" id="TableHistory" style="overflow-x: scroll;" class="tableBox">
        <table class="table table-striped table-bordered table-hover table-responsive" id="table-Us">
            <thead class="thead-inverse">
                <tr class="text-center">
                    <th>Año</th>
                    <th>Titulo</th>
                    <th>Texto</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $request->fetch_assoc()) { ?>
                    <tr class="text-center">
                        <td scope="row"><?php echo $item['ano']; ?></td>
                        <td><?php echo $item['titulo']; ?></td>
                        <td><?php echo $item['texto']; ?></td>
                        <td>
                            <div style="height: 150px;">
                                <img src="../resources/pictures/news/<?php echo $item['media']; ?>" height="100%">
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-small" onclick="deleteNot(`<?php echo $item['id_accion']; ?>`,`<?php echo $item['media']; ?>`)">
                                <i class="fa fa-trash" aria-hidden="true"></i>
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
    SQLflag = "<?php if (isset($_GET['res'])) echo $_GET['res'];
                else echo 'N'; ?>";
    if(SQLflag == 1){
        swal("Registro exitoso", "...", "success");
    }
    else if(SQLflag != 'N'){
        swal("Ooops!","Ocurrio un error inesperado, intenta de nuevo mas tarde","error");
    }
</script>
<script src="../resources/js/history.js"></script>