<?php
    session_start();
    require_once "../models/General.php";
    $model = new General();

    echo $model->login($_POST['user'], $_POST['pass']);

?>