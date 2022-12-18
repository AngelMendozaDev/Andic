<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once "General.php";
class Practicas extends General
{
    public function getUsers($clave)
    {
        $conn = General::getConexion();

        $query = $conn->prepare("SELECT id_p, nombre, app, apm FROM persona WHERE nombre LIKE '%$clave%' OR correo LIKE '%$clave%' OR app LIKE '%$clave%' OR apm LIKE '%$clave%'");
        $query->execute();
        $request = $query->get_result();
        $query->close();

        if ($request->num_rows > 0) {

            while ($data = $request->fetch_assoc()) {
                $json[] = array(
                    "ID" => $data['id_p'],
                    "name" => $data['nombre'],
                    "app" => $data['app'],
                    "apm" => $data['apm']
                );
            }

            return json_encode($json);
        }
        return 1;
    }

    public function getInst($clave)
    {
        $conn = General::getConexion();

        $query = $conn->prepare("SELECT clave, nombre_ins, repre, estado FROM institucion WHERE clave LIKE '%$clave%' OR nombre_ins LIKE '%$clave%'");
        $query->execute();
        $request = $query->get_result();
        $query->close();

        if ($request->num_rows > 0) {

            while ($data = $request->fetch_assoc()) {
                if ($data['estado'] == 1) {
                    $json[] = array(
                        "clave" => $data['clave'],
                        "name" => $data['nombre_ins'],
                        "dir" => $data['repre']
                    );
                }
            }

            return json_encode($json);
        }
        return 1;
    }

    public function getServices($clave)
    {
        $conn = General::getConexion();

        $query = $conn->prepare("SELECT * FROM servicios WHERE inst = ?");
        $query->bind_param('s', $clave);
        $query->execute();
        $res = $query->get_result();

        $query->close();

        if ($res->num_rows > 0) {
            while ($item = $res->fetch_assoc()) {
                $json[] = array(
                    "id" => $item['registro_c'],
                    "servicio" => $item['service']
                );
            }

            return json_encode($json);
        }

        return 1;
    }

    public function newRegistro($object)
    {
        if (self::existRegistro($object['matricula'], $object['tipo-p']) == false) {
            $conn = General::getConexion();

            $proy = $object['name-proy'] . "*" . $object['des-proy'];

            $query = $conn->prepare("CALL newPractica(?,?,?,?,?,?,?,?)");
            $query->bind_param('ssssssss', $object['user'], $object['escuela'], strtoupper($object['matricula']), $object['semestre'], $object['tipo-p'], $object['fecha_in'], $object['fecha_fn'], strtoupper($proy));
            $res = $query->execute();
            $query->close();

            return $res;
        }

        return 0;
    }

    public function existRegistro($matricula, $tipo)
    {
        $conn = General::getConexion();

        $query = $conn->prepare('SELECT folio_p  FROM practicas WHERE matricula = ? AND tipo = ?');
        $query->bind_param('ss', $matricula, $tipo);
        $query->execute();
        $res = $query->get_result();

        $query->close();

        if ($res->num_rows > 0) {
            return true;
        }
        return 0;
    }

/** * ***********************************
 *      Practicas Gefe
 **********************/
    public function getPracticas(){
        $conn = General::getConexion();

        $query = $conn->prepare("SELECT * FROM getPracticasAct");
        $query->execute();
        $request = $query->get_result();

        $query->close();

        return $request;
    }

}