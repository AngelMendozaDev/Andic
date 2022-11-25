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
        
        case 'resetPass':
            echo "Reset Password";
        break;
    }
?>