<?php require_once "header.php"; ?>
<link rel="stylesheet" href="../resources/css/registro.css">

<div class="container h-100 mb-5 mt-3">
    <div class="row h-100" id="Select">
        <div class="col-6">
            <div class="col-header mb-3">
                <h4>Persona</h4>
                <div class="body-col">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" id="serchU" placeholder="Numero/Mail a buscar">
                    </div>
                </div>
            </div>
            <div class="col-body mb-3">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Nombre</th>
                            <th>App</th>
                            <th>Apm</th>
                            <th>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody id="lienzo">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-6">
            <div class="col-header mb-3">
                <h4>Institución</h4>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-school"></i>
                    </span>
                    <input type="text" class="form-control" id="serchI" placeholder="CCT / NOMBRE">
                </div>
            </div>
            <div class="col-body mb-3">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>CCT</th>
                            <th>Nombre</th>
                            <th>Giro</th>
                            <th>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody id="lienzoI">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mt-3 mb-3" id="datos">
        <form onsubmit="return sendInfo()" method="POST" class="col-12" id="form-practicas">
        <input type="text" name="action" id="rol" value="newRegistro">
            <div class="flex-input">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="form-control" id="name-user" readonly>
                    <input type="text" id="user" name="user" hidden >
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
                <select name="tipo-p" class="form-select" required>
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
                    <input type="text" class="form-control" name="matricula" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </span>
                    <select name="semestre" class="form-select" required>
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
                    <input type="date" class="form-control" name="fecha_in" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-calendar-minus    "></i>
                    </span>
                    <input type="date" class="form-control" name="fecha_fn" required>
                </div>
            </div>

            <hr>

            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fas fa-newspaper"></i>
                </span>
                <input type="text" class="form-control" name="name-proy" maxlength="80" placeholder="Nombre del Proyecto" required>
            </div>

            <div class="form-floating">
                <textarea class="form-control" placeholder="Maximo 500 Caracteres" id="proyecto" style="height: 100px" maxlength="500" name="des-proy" required></textarea>
                <label for="proyecto">Descripcion del proyecto:</label>
            </div>
            <br>
            <center>
                <button class="btn btn-success">
                    Registrar &nbsp; <i class="fas fa-save    "></i>
                </button>

                <button class="btn btn-danger" type="button" onclick="resetForm()">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                    &nbsp;
                    Cancelar
                </button>
            </center>
        </form>
    </div>
</div>

<?php require_once "footer.php"; ?>
<script src="../resources/js/registro.js"></script>