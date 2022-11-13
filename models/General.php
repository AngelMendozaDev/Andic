<?php
class General{
    private $host = "localhost";
    private $user = "root";
    private $pass = "LuisA5841@&";
    private $dbName = "andic";
    private $conn = false;

    public function __construct(){
        $this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->dbName);
        if(!$this->conn){
            $this->conn = false;
            return $this->conn;
        }
        else
            return $this->conn;
        
    }

    public function login($user,$pass){
        if($this->conn != false){
            $query = $this->conn->prepare("SELECT p.id_p, p.nombre, p.app, a.picture FROM persona AS p INNER JOIN angeles AS a ON a.id_angel = p.id_p WHERE p.correo = ? AND a.pass = ?");
            $query->bind_param('ss',$user, $pass);
            $query->execute();
            $result = $query->get_result();
            if($result->num_rows > 0){
                $data = $result->fetch_assoc();
                $_SESSION['ID'] = $data['id_p'];
                $_SESSION['NAME'] = $data['nombre']." ".$data['app'];
                return 1;
            }
            else{
                return -1;
            }
            
        }
        else
        return -1;
    }

}
?>