<?php
    require_once "General.php";

    class Institud extends General{
        public function getInstituciones(){
            return "Inst";
        }

        public function newInst($object){
            $conn = General::getConexion();

            $query = $conn->prepare("CALL newInst(?,?,?,?,?,?,?)");
            $query->bind_param('sssssss',strtoupper($object['cct']) ,strtoupper($object['name']), $object['tipoIns'] ,strtoupper($object['lider']) ,strtoupper($object['representante']),$object['phone'], strtoupper($object['direccion']));
            $res = $query->execute();
            $query->close();

            return $res;
        }

        public function existInst($clave, $phone){
            $conn = General::getConexion();

            $query = $conn->prepare("SELECT clave FROM institucion WHERE clave = ? AND phone = ?");
            $query->bind_param('ss',$clave,$phone);
            $query->execute();
            $res = $query->get_result();
            $query->close();

            if($res->num_rows > 0){
                return true;
            }

            return false;
        }


    }
?>