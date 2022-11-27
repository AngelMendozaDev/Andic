<?php 
    require_once "../models/Comunity.php";
    $model = new Comunity();
    //print_r($_POST);
    $action = $_POST['Action'];

    switch($action){
        case 'getCol':
            echo ($model->serchCP($_POST['cp']));
        break;
        case 'getFolio':
            echo ( $model->getFolio());
        break;

        case 'newUser':
            echo $model->newUser($_POST);
        break;

        case 'getUser':
            echo $model->getUser($_POST['person']);
        break;
        
        case 'newPerson':
            echo $model->newPerson($_POST);
        break;

        case 'updateUser':
            echo $model->updateUser($_POST);
        break;

        case 'userOff':
            echo $model->userOff($_POST['user']);
        break;
    }
?>