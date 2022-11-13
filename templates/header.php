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
                    <a href="" class="circle-opt">
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
                        <a href="" class="sub-opt">
                            Soporte Tecnico
                        </a>
                    </li>
                    <li class="submain-item">
                        <a href="" class="sub-opt">
                            Cambiar Contraseña
                        </a>
                    </li>
                    <hr class="separador">
                    <li class="submain-item">
                        <a href="" class="sub-opt">
                            <button class="btn btn-danger">
                                Cerrar Sesión
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </header>

    <div class="menu-lateral">
        <div class="menu-head">
            <div class="img-box">
                <img src="../resources/pictures/icons/Logo.png" alt="">
            </div>
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
                                    <a href="">
                                        <i class="fas fa-user-tie"></i>
                                        Personal
                                    </a>
                                </li>
                                <li class="sub-option">
                                    <a href="">

                                    </a>
                                </li>
                                <li class="sub-option">
                                    <a href="">

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#OptionsAccordion">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#OptionsAccordion">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
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