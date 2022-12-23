<?php
require_once "../models/History.php";
$model = new History();
//print_r($_POST);
$route_folder = "../resources/pictures/news/";
$name_image = "img_" . date('dmHi') . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
$route_save = $route_folder . $name_image;
$res = 0;
if (move_uploaded_file($_FILES["image"]["tmp_name"], $route_save)) {
    $res = $model->newNoticia($_POST, $name_image);
    header('location:../templates/history.php?view=T&res=' . $res);
} else {
    header('location:../templates/history.php?res=2');
}
