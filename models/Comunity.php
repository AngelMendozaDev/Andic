<?php 
    require_once "General.php";

    class Comunity extends General{
        
        public function serchCP($value){
            $conec = General::getConexion();
            $query = $conec->prepare("SELECT cp.*, e.estado_n FROM cp_col AS cp INNER JOIN estado AS e ON e.id_estado = cp.estado WHERE cp.cp =?");
            $query->bind_param('s',$value);
            $query->execute();
            $request = $query->get_result();
            $query->close();

            if($request->num_rows > 0){
                while($data = $request->fetch_assoc()){
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

        public function getFolio(){
            $conec = General::getConexion();
            $query = $conec->prepare("SELECT sum(id_p+1) AS folio FROM persona ORDER BY id_p ASC LIMIT 1;");
            $query->execute();
            $request = $query->get_result()->fetch_assoc();
            $query->close();

            return $request['folio'];
        }

        public function getUsers(){
            $conec = General::getConexion();
            $query = $conec->prepare("SELECT p.id_p, p.nombre, p.app, p.apm, p.correo, a.perfil FROM persona AS p INNER JOIN angeles AS a ON a.id_angel = p.id_p ORDER BY p.id_p ASC");
            $query->execute();
            $request = $query->get_result();
            $query->close();

            return $request;
        }
    }
