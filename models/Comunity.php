<?php
require_once "General.php";

class Comunity extends General
{

    public function serchCP($value)
    {
        $conec = General::getConexion();
        $query = $conec->prepare("SELECT cp.*, e.estado_n FROM cp_col AS cp INNER JOIN estado AS e ON e.id_estado = cp.estado WHERE cp.cp =?");
        $query->bind_param('s', $value);
        $query->execute();
        $request = $query->get_result();
        $query->close();

        if ($request->num_rows > 0) {
            while ($data = $request->fetch_assoc()) {
                $json[] = array(
                    "folio" => $data['n_registro'],
                    "col" => $data['col'],
                    "mun" => $data['mun'],
                    "edo" => $data['estado_n']
                );
            }
            return json_encode($json);
        }

        return -1;
    }

    public function getFolio()
    {
        $conec = General::getConexion();
        $query = $conec->prepare("SELECT id_p AS folio FROM persona ORDER BY id_p DESC LIMIT 1;");
        $query->execute();
        $request = $query->get_result()->fetch_assoc();
        $query->close();

        return $request['folio'];
    }

    public function getUsers()
    {
        $conec = General::getConexion();
        $query = $conec->prepare("SELECT p.id_p, p.nombre, p.app, p.apm, p.correo, a.perfil FROM persona AS p INNER JOIN angeles AS a ON a.id_angel = p.id_p ORDER BY p.id_p ASC");
        $query->execute();
        $request = $query->get_result();
        $query->close();

        return $request;
    }

    public function newUser($object)
    {
        if (self::userExist($object['mail'], $object['phone']) == false) {
            $conec = General::getConexion();
            $query = $conec->prepare('CALL newUser(?,?,?,?,?,?,?,?)');
            $query->bind_param('ssssssss', $object['nombre'], $object['app'], $object['apm'], $object['sexo'], $object['nacimiento'], $object['mail'], $object['phone'], $object['col']);
            $res = $query->execute();

            $query->close();

            return $res;
        }
        else
            return "2";
    }

    public function userExist($mail, $phone)
    {
        $conec = General::getConexion();
        $query = $conec->prepare("SELECT id_p FROM persona WHERE correo = ? OR tel = ?");
        $query->bind_param('ss', $mail, $phone);
        $query->execute();
        $res = $query->get_result();
        $query->close();

        if ($res->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function getUser($person){
        $conec = General::getConexion();
        $query = $conec->prepare("SELECT p.*, d.calle, d.cp FROM persona AS p INNER JOIN domicilio AS d ON d.id_dom = p.id_p WHERE p.id_p = ?");
        $query->bind_param('s',$person);
        $query->execute();
        $res = $query->get_result();
        $query->close();

        return json_encode($res->fetch_assoc());
    }
}
