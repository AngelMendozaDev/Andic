<?php 
require_once "../models/Practicas.php";
$model = new Practicas();

//print_r($_POST);
$action = $_POST['action'];

    switch($action){
        case 'getPractica':
            echo $model->getPractica($_POST['folio']);
        break;
        case 'changeStatus':
            echo $model->changeStatus($_POST['folio'], $_POST['status']);
        break;
        case 'getPDF':

        break;
    }
?>