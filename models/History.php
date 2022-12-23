<?php
require_once "General.php";
class History extends General{
    public function newNoticia($object, $image){
        $conn = General::getConexion();
        
        $query = $conn->prepare("CALL newNoticia(?,?,?,?)");
        $query->bind_param("ssss",$object['año'], $object['title'], $image ,$object['texto']);
        $res = $query->execute();

        $query->close();

        return $res;
    }

    public function getNoticias(){
        $conn = General::getConexion();

        $query = $conn->prepare("SELECT * FROM getNoticias");
        $query->execute();
        $request = $query->get_result();

        $query->close();

        return $request;
    }

    public function deleteNoticia($folio){
        $conn = General::getConexion();

        $query = $conn->prepare("DELETE FROM acciones WHERE id_accion = ?");
        $query->bind_param('s',$folio);
        $res = $query->execute();

        $query->close();

        return $res;
    }

}
?>