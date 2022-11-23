<?php 
    require_once "../models/Comunity.php";
    $model = new Comunity();
    $action = $_POST['Action'];

    switch($action){
        case 'getCol':
            echo ($model->serchCP($_POST['cp']));
        break;
        
        case 'getFolio':
            echo ( $model->getFolio());
        break;
    }
?>