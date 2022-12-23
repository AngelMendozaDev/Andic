<?php
    require_once "../models/History.php";
    $model = new History();

    //print_r($_POST);

    $route = "../resources/pictures/news/" . $_POST['image'];
    $request = $model->deleteNoticia($_POST['folio']);
    if($request == 1){
        if($route != "../resources/pictures/news/noData.png")
            unlink($route);
        echo 1;
    }
    
?>