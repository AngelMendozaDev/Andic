<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once "General.php";
class Institud extends General
{
    public function getInstituciones()
    {
        $conn = General::getConexion();

        $query = $conn->prepare("SELECT * FROM getInstAct");
        $query->execute();
        $response = $query->get_result();
        $query->close();

        return $response;
    }

    public function newInst($object)
    {
        if (self::existInst(strtoupper($object['cct']), $object['phone']) != true) {
            $conn = General::getConexion();

            $query = $conn->prepare("CALL newInst(?,?,?,?,?,?,?)");
            $query->bind_param('sssssss', strtoupper($object['cct']), strtoupper($object['name']), $object['tipoIns'], strtoupper($object['lider']), strtoupper($object['representante']), $object['phone'], strtoupper($object['direccion']));
            $res = $query->execute();
            $query->close();

            return $res;
        }

        return -1;
    }

    public function existInst($clave, $phone)
    {
        $conn = General::getConexion();

        $query = $conn->prepare("SELECT clave FROM institucion WHERE clave = ? OR phone = ?");
        $query->bind_param('ss', $clave, $phone);
        $query->execute();
        $res = $query->get_result();
        $query->close();

        if ($res->num_rows > 0) {
            return true;
        }

        return false;
    }

    public function getInst($clave)
    {
        $conn = General::getConexion();

        $query = $conn->prepare("SELECT * FROM institucion WHERE clave = ?");
        $query->bind_param('s', $clave);
        $query->execute();
        $request = $query->get_result()->fetch_assoc();

        $query->close();

        return json_encode($request);
    }

    public function updateInst($object)
    {
        $conn = General::getConexion();
        $query = $conn->prepare("Call updateInst(?,?,?,?,?,?,?)");
        $query->bind_param('sssssss', strtoupper($object['cct']), strtoupper($object['name']), $object['tipoIns'], strtoupper($object['lider']), strtoupper($object['representante']), $object['phone'], strtoupper($object['direccion']));
        $res = $query->execute();
        $query->close();

        return $res;
    }

    public function instOff($clave){
        $conn = General::getConexion();

        $query = $conn->prepare("UPDATE institucion SET estado = 0 WHERE clave = ?");
        $query->bind_param("s",$clave);
        $res = $query->execute();

        $query->close();

        return $res;
    }


    /*************************************************++
     * SERVICIOS
     **************************/

    public function setService($object)
    {
        $conn = General::getConexion();

        $query = $conn->prepare("INSERT INTO servicios (inst,service) VALUES (?,?)");
        $query->bind_param("ss", $object['cct'], strtoupper($object['service']));
        $res = $query->execute();

        $query->close();

        return $res;
    }

    public function getServices($clave)
    {
        $conn = General::getConexion();

        $query = $conn->prepare("SELECT * FROM servicios WHERE inst = ?");
        $query->bind_param("s", $clave);
        $query->execute();
        $res = $query->get_result();
        $query->close();

        if ($res->num_rows > 0) {

            while ($item = $res->fetch_assoc()) {
                $json[] = array(
                    "id" => $item['registro_c'],
                    "name" => $item['service']
                );
            }

            return json_encode($json);
        }

        return 0;
    }

    public function deleteService($service)
    {
        $conn = General::getConexion();

        $query = $conn->prepare("DELETE FROM servicios WHERE registro_c = ?");
        $query->bind_param("s", $service);
        $res = $query->execute();

        $query->close();

        return $res;
    }

}
