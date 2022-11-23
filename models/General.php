<?php
class General
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "LuisA5841@&";
    private $dbName = "andic";
    private $conn = false;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbName);
        if (!$this->conn) {
            $this->conn = false;
            return $this->conn;
        } else
            return $this->conn;
    }

    public function getConexion(){
        return $this->conn;
    }

    public function login($user, $pass)
    {
        if ($this->conn != false) {
            $query = $this->conn->prepare("SELECT p.id_p, p.nombre, p.app, a.picture FROM persona AS p INNER JOIN angeles AS a ON a.id_angel = p.id_p WHERE p.correo = ? AND a.pass = ?");
            $query->bind_param('ss', $user, $pass);
            $query->execute();
            $result = $query->get_result();
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                $_SESSION['ID'] = $data['id_p'];
                $_SESSION['NAME'] = $data['nombre'] . " " . $data['app'];
                return 1;
            } else {
                return -1;
            }
        } else
            return -1;
    }

    public function isPass($user, $clave)
    {
        if ($this->conn != false) {
            $query = $this->conn->prepare("SELECT pass FROM angeles WHERE id_angel = ?");
            $query->bind_param('s', $user);
            $query->execute();
            $result = $query->get_result()->fetch_assoc();
            if ($result['pass'] == $clave) {
                return true;
            } else
                return false;
        }
        return false;
    }

    public function changuePass($user, $clave_a, $newClave){
        if($this->conn != false){
            if(self::isPass($user, $clave_a) == true){
                $query = $this->conn->prepare("UPDATE angeles SET pass = ? WHERE id_angel = ?");
                $query->bind_param('ss',$newClave, $user);
                $res = $query->execute();

                $query->close();

                return $res;
            }
            else
                return 0;
        }
        
        return -1;
    }
}
