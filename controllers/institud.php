<?php
require_once "../models/institud.php";
$model = new Institud();
//print_r($_POST);
$action = $_POST['action'];

switch ($action){
    case 'newInst':
        echo $model->newInst($_POST);
    break;

    case 'getInst':
        echo $model->getInst($_POST['clave']);
    break;

    case 'updateInst':
        echo($model->updateInst($_POST) );
    break;
    
    case 'deleteInst':
        echo $model->instOff($_POST['clave']);
    break;

/******************************************************* */

    case 'newService':
        echo ($model->setService($_POST));
    break;

    case 'getServices':
        echo $model->getServices($_POST['clave']);
    break;

    case 'deleteService':
        echo $model->deleteService($_POST['service']);
    break;

}