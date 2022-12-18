<?php 
require_once "../models/Practicas.php";
$model = new Practicas();
//print_r($_POST);
$action = $_POST['action'];

switch($action){
    case 'getUser':
       echo $model->getUsers($_POST['user']);
    break;
    case 'getInst':
        echo $model->getInst($_POST['clave']);
     break;

     case 'getServices':
         echo $model->getServices($_POST['clave']);
      break;

     case 'newRegistro':
         echo $model->newRegistro($_POST);
      break;
}

?>