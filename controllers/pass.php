<?php 
    session_start();
    require_once "../models/General.php";
    $model = new General();
    echo $model->changuePass($_SESSION['ID'],$_POST['actual'],$_POST['pass1']);
?>