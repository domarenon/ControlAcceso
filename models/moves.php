<?php
    include dirname(__file__,2).'/config/conection.php';
    
    class Moves {
        private $con;
        private $link;

        function __construct(){
            $this->con = new Conexion();
            $this->link = $this->con->conectarse();
        }


        public function newMove ($data){
            $query="INSERT INTO jabali_moves (id_user, st_grade, st_name, st_code, st_unit, st_dependency, st_move, dt_datetime) VALUES ('".$data['id_user']."','".$data['st_grade']."','".$data['st_name']."','".$data['st_code']."','".$data['st_unit']."','".$data['st_dependency']."','".$data['st_move']."', NOW())";
            $result = mysqli_query($this->link,$query);
            if (mysqli_affected_rows($this->link)>0){
                return true;
            }else{
                return false;
            }
        }

        public function getMovesBySearch($data=NULL){
            if(!empty($data)){
                $query="SELECT id_move, id_user, st_grade, st_name, st_code, st_unit, st_dependency, st_move, dt_datetime FROM jabali_moves WHERE st_grade LIKE '%".$data."%' OR st_name LIKE '%".$data."%' OR st_code LIKE '%".$data."%' OR st_move LIKE '%".$data."%' OR dt_datetime LIKE '%".$data."%' OR st_unit LIKE '%".$data."%' OR st_dependency LIKE '%".$data."%' ORDER BY dt_datetime DESC";
                $result = mysqli_query($this->link,$query);
                $data = array();
                while ($data[]=mysqli_fetch_assoc($result));
                array_pop($data);
                return $data;
            }else{
                return false;
            }
        }

        public function getMoves (){
            $query="SELECT id_move, id_user, st_grade, st_name, st_code, st_unit, st_dependency, st_move, dt_datetime FROM jabali_moves WHERE 1 ORDER BY dt_datetime DESC   ";
            $result = mysqli_query($this->link,$query);
            $data = array();
            while ($data[]=mysqli_fetch_assoc($result));
            array_pop($data);
            return $data;
        }


        public function exportMoves($data=NULL){
            if(!empty($data)){
                $query = "";
                if(!empty($data['select_user'])){
                    $query = "id_user= ".$data['select_user']. " AND ";
                }
                if(!empty($data['select_unity'])){
                    $query = "st_unit= '".$data['select_unity']."' AND ";
                }
                if(!empty($data['select_dependency'])){
                    $query = "st_dependency= '".$data['select_dependency']."' AND ";
                }
                if(!empty($data['select_movement']))
                {
                    $query = $query . " st_move = '". $data['select_movement'] ."' AND ";
                }

                $query = $query . " dt_datetime BETWEEN CAST('". $data['start'] ."' AS DATE) AND CAST('". $data['end'] ."' AS DATE) ";
                $query_f="SELECT id_move, id_user, st_grade, st_name, st_code, st_unit, st_dependency, st_move, dt_datetime FROM jabali_moves WHERE ". $query ." ORDER BY dt_datetime ASC";
                $result = mysqli_query($this->link,$query_f);
                $data = array();
                while ($data[]=mysqli_fetch_assoc($result));
                array_pop($data);
                return $data;
            }else{
                return false;
            }
        }
        
    }

?>