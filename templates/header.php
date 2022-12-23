<?php
session_start();
if (isset($_SESSION['ID'])) {
    //echo $_SESSION['ID'];
} else {
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenid@: <?php echo $_SESSION['NAME'] ?></title>
    <link rel="icon" href="../resources/pictures/icons/Logo.png">
    <link rel="stylesheet" href="../resources/libs/bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/libs/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../resources/css/menus.css">
</head>

<body>

    <header class="nav-bar">
        <div class="icon-box">
            <img src="../resources/pictures/icons/Logo.png" alt="Andic AC logo">
            <span class="nav-title">
                &nbsp;
                <?php echo $_SESSION['NAME'] ?>
            </span>
        </div>

        <div class="option-box">
            <ul class="main-menu">
                <li>
                    <a href="main.php" class="circle-opt">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="" class="circle-opt">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                    </a>
                </li>
                <li style="position: relative;" id="btn-sub">
                    <a href="#" class="circle-opt">
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
            <div class="sub-main-menu" id="sub-main">
                <ul class="submain">
                    <li class="submain-item">
                        <a href="https://api.whatsapp.com/send?phone=525535512583&text=Hola%20buenas%20noches,%20solicito%20soporte%20tecnico" target="_blank" class="sub-opt">
                            Soporte Tecnico
                        </a>
                    </li>
                    <li class="submain-item">
                        <a href="password.php" class="sub-opt">
                            Cambiar Contraseña
                        </a>
                    </li>
                    <hr class="separador">
                    <li class="text-center">
                        <a href="../controllers/close.php" class="sub-opt">
                            <button class="btn btn-danger">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                Cerrar Sesión
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </header>

    <div class="menu-lateral">
        <div class="control-box">
            <input type="checkbox" id="status-side" hidden>
            <label for="status-side" id="open-side">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </label>
            <label for="status-side" id="close-side">
                <i class="fa fa-times-circle" aria-hidden="true"></i>
            </label>
        </div>
        <div class="menu-head">
            <div class="img-box">
                <img src="../resources/pictures/photos/no_data.png" alt="">
            </div>
            <br>
            <h4 class="user-name">
                <?php echo $_SESSION['NAME']; ?>
            </h4>
        </div>
        <hr class="separador">
        <div class="menu-body">
            <div class="accordion" id="OptionsAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ComunityOption" aria-expanded="true" aria-controls="ComunityOption">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            &nbsp;
                            Comunidad ANDIC
                        </button>
                    </h2>
                    <div id="ComunityOption" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#OptionsAccordion">
                        <div class="accordion-body">
                            <ul class="sub-menu">
                                <li class="sub-option">
                                    <a href="users.php">
                                        <i class="fas fa-user-tie"></i>
                                        Personal
                                    </a>
                                </li>
                                <li class="sub-option">
                                    <a href="comunity.php">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        Comunidad
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fa fa-school" aria-hidden="true"></i>
                            Instituciones Convenios
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#OptionsAccordion">
                        <div class="accordion-body">
                            <ul class="sub-menu">
                                <li class="sub-option">
                                    <a href="institucion.php">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        Nuevo Convenio
                                    </a>
                                </li>
                                <li class="sub-option">
                                    <a href="registro.php">
                                        <i class="fas fa-file-alt"></i>
                                        Nueva solicitud
                                    </a>
                                </li>
                                <li class="sub-option">
                                    <a href="services.php">
                                        <i class="fa fa-people-arrows" aria-hidden="true"></i>
                                        Servicio Social / Residencias
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                            &nbsp;
                            Control de Pagina web
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#OptionsAccordion">
                        <ul class="sub-menu">
                            <li class="sub-option">
                                <a href="history.php">
                                    <i class="fa fa-newspaper" aria-hidden="true"></i>
                                    Historias
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-footer">
            <span>
                Power By: Angel Mendoza [2022]
            </span>
        </div>
    </div>