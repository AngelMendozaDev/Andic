<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andic App</title>
    <link rel="icon" href="resources/pictures/icons/Logo.png">
    <link rel="stylesheet" href="resources/libs/bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/libs/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="resources/css/index.css">
</head>

<body>
    <div class="container-full">
        <div class="login">
            <div class="circle-img">
                <img src="resources/pictures/icons/Logo.png" alt="">
            </div>
            <h3 class="title-log">.:[ Andic A.C. ]:.</h3>
            <hr class="separador">
            <form method="POST" onsubmit="return login()" id="login-form" class="body-login">
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                    </span>
                    <input type="email" maxlength="60" class="form-control" placeholder="some@mail.org" id="mail" name="user" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    <input type="text" maxlength="20" class="form-control" placeholder="password" id="pass" name="pass" required>
                </div>

                <center>
                    <button class="btn btn-success">
                        Ingresar
                    </button>
                </center>

            </form>
            <hr class="separador">
            <div class="footer-login">
                <center>
                    <span class="foot-text">
                        Power By: Angel Mendoza
                    </span>
                </center>
            </div>
        </div>
    </div>

    <script src="resources/libs/jquery.js"></script>
    <script src="resources/libs/sweetalert.js"></script>
    <script src="resources/libs/bootstrap-5/js/bootstrap.min.js"></script>
    <script src="resources/js/index.js"></script>
</body>

</html>