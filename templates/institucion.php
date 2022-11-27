<?php require_once "header.php"; ?>

<div class="container mb-3 mt-3">
    <div class="row text-center mb-3">
        <h3>Convenios e instituciones</h3>
    </div>
    <div class="row mb-3" id="form-inst">
        <form onsubmit="return false" method="POST" id="form-institucion">
            <div class="input-group mb-3 w-25">
                <span class="input-group-text">(CCT):</span>
                <input type="text" class="form-control" maxlength="18" style="text-transform: uppercase;" name="cct" id="cct" placeholder="Clave del Centro de Trabajo" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">
                    Nombre de Institución:
                </span>
                <input type="text" class="form-control" maxlength="70" name="name" id="name" style="text-transform: uppercase;" required>
            </div>

            <div class="input-flex">
                <div class="input-group">
                    <span class="input-group-text">
                        Lider de institucion:
                    </span>
                    <input type="text" class="form-control" maxlength="30" name="lider" id="lider" style="text-transform: uppercase;" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">
                        Representante:
                    </span>
                    <input type="text" class="form-control" maxlength="30" name="representante" id="representante" style="text-transform: uppercase;" required>
                </div>
            </div>

        </form>
    </div>
    <div class="row mb-3" id="table-inst">
        <table class="table table-hover table-bordered table-striped table-responsive">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>FOLIO</th>
                    <th>INSTITUCION</th>
                    <th>CONTACTO</th>
                    <th>REPRESENTANTE</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>SomeItem</td>
                    <td>SomeItem</td>
                    <td>SomeItem</td>
                    <td>SomeItem</td>
                    <td>SomeItem</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require_once "footer.php"; ?>