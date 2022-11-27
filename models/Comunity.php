<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
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
        $query = $conec->prepare("SELECT p.* FROM persona AS p INNER JOIN angeles AS a ON a.id_angel = p.id_p WHERE p.estado = 1 AND a.perfil = 1 ORDER BY p.id_p DESC");
        $query->execute();
        $request = $query->get_result();
        $query->close();

        return $request;
    }

    public function getComunity()
    {
        $conec = General::getConexion();
        $query = $conec->prepare("SELECT p.* FROM persona AS p INNER JOIN angeles AS a ON a.id_angel = p.id_p WHERE p.estado = 1 AND a.perfil = 2 ORDER BY p.id_p DESC");
        $query->execute();
        $request = $query->get_result();
        $query->close();

        return $request;
    }

    public function newPerson($object)
    {
        if (self::userExist($object['mail'], $object['phone']) == false) {
            $conec = General::getConexion();
            $query = $conec->prepare('CALL newPerson(?,?,?,?,?,?,?,?,?)');
            $query->bind_param('sssssssss', strtoupper($object['nombre']), strtoupper($object['app']), strtoupper($object['apm']), $object['sexo'], $object['nacimiento'], $object['mail'], $object['phone'], strtoupper($object['street']), $object['col']);
            $res = $query->execute();

            $query->close();

            return $res;
        } else
            return "2";
    }

    public function newUser($object)
    {
        if (self::userExist($object['mail'], $object['phone']) == false) {
            $conec = General::getConexion();
            $query = $conec->prepare('CALL newUser(?,?,?,?,?,?,?,?,?)');
            $query->bind_param('sssssssss', strtoupper($object['nombre']), strtoupper($object['app']), strtoupper($object['apm']), $object['sexo'], $object['nacimiento'], $object['mail'], $object['phone'], strtoupper($object['street']), $object['col']);
            $res = $query->execute();

            $query->close();

            return $res;
        } else
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

    public function getUser($person)
    {
        $conec = General::getConexion();
        $query = $conec->prepare("SELECT p.*, d.calle, d.cp AS folCP, c.cp, c.col FROM persona AS p INNER JOIN domicilio AS d ON d.id_dom = p.id_p INNER JOIN cp_col AS c ON c.n_registro = d.cp WHERE p.id_p = ?");
        $query->bind_param('s', $person);
        $query->execute();
        $res = $query->get_result();
        $query->close();

        return json_encode($res->fetch_assoc());
    }

    public function updateUser($object)
    {
        $conec = General::getConexion();
        $query = $conec->prepare('CALL updatePerson(?,?,?,?,?,?,?,?,?,?)');
        $query->bind_param('ssssssssss', strtoupper($object['nombre']), strtoupper($object['app']), strtoupper($object['apm']), $object['sexo'], $object['nacimiento'], $object['mail'], $object['phone'], strtoupper($object['street']), $object['col'], $object['user']);
        $res = $query->execute();

        $query->close();

        return $res;
    }

    public function userOff($user)
    {
        $conec = General::getConexion();
        $query = $conec->prepare('UPDATE persona SET estado = 0 WHERE id_p = ?');
        $query->bind_param('s', $user);
        $res = $query->execute();

        $query->close();

        return $res;

    }

    public function userOn($user)
    {
        $conec = General::getConexion();
        $query = $conec->prepare('UPDATE persona SET estado = 1 WHERE id_p = ?');
        $query->bind_param('s', $user);
        $res = $query->execute();

        $query->close();

        return $res;

    }
}
