<?php
    include dirname(__file__,2).'/config/conection.php';
    
    class Users {
        private $con;
        private $link;

        function __construct(){
            $this->con = new Conexion();
            $this->link = $this->con->conectarse();
        }

        public function getUsers (){
            $query="SELECT id_user, st_grade, st_name, st_code, st_mail, st_phone, st_unit, st_dependency FROM jabali_users WHERE 1";
            $result = mysqli_query($this->link,$query);
            $data = array();
            while ($data[]=mysqli_fetch_assoc($result));
            array_pop($data);
            return $data;
        }

        public function newUser ($data){
            $query="INSERT INTO jabali_users (st_grade, st_name, st_code, st_mail, st_phone, st_unit, st_dependency, im_profilepic) VALUES ('".$data['st_grade']."','".$data['st_name']."','".$data['st_code']."','".$data['st_mail']."','".$data['st_phone']."','".$data['st_unit']."','".$data['st_dependency']."','".$data['im_profilepic']."')";
            $result = mysqli_query($this->link,$query);
            if (mysqli_affected_rows($this->link)>0){
                return true;
            }else{
                return false;
            }
        }

        public function getUserById ($id_user=NULL){
            if(!empty($id_user)){
                $query='SELECT  id_user, st_grade, st_name, st_code, st_mail, st_phone, st_unit, st_dependency, CASE WHEN im_profilepic = "" THEN "default-user.jpg" ELSE im_profilepic END AS im_profilepic FROM jabali_users WHERE id_user = '.$id_user;
                $result = mysqli_query($this->link,$query);
                $data = array();
                while ($data[]=mysqli_fetch_assoc($result));
                array_pop($data);
                return $data;
            }else{
                return false;
            }
        }

        public function getUserByCode ($st_code=NULL){
            if(!empty($st_code)){
                $query='SELECT  id_user, st_grade, st_name, st_code, st_mail, st_phone, st_unit, st_dependency, CASE WHEN im_profilepic = "" THEN "default-user.jpg" ELSE im_profilepic END AS im_profilepic FROM jabali_users WHERE st_code = "' .$st_code.'"';
                $result = mysqli_query($this->link,$query);
                $data = array();
                while ($data[]=mysqli_fetch_assoc($result));
                array_pop($data);
                return $data;
            }else{
                return false;
            }
        }

        public function setEditUser ($data){
            if(!empty($data['id_user'])){
                $query="UPDATE jabali_users SET st_grade='".$data['st_grade']."', st_name='".$data['st_name']."', st_mail='".$data['st_mail']."', st_phone='".$data['st_phone']."', st_unit='".$data['st_unit']."', st_dependency='".$data['st_dependency']."', im_profilepic='".$data['im_profilepic']."' WHERE id_user = '".$data['id_user']."'";
                $result = mysqli_query($this->link,$query);
                if ($result){
                    return true;
                }
                else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function deleteUser ($id_user=NULL){
            if(!empty($id_user)){
                $query="DELETE FROM jabali_users WHERE id_user = ".$id_user;
                $result = mysqli_query($this->link,$query);
                if (mysqli_affected_rows($this->link)>0){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function getUsersBySearch($data=NULL){
            if(!empty($data)){
                $query="SELECT id_user, st_grade, st_name, st_code, st_mail, st_phone, st_unit, st_dependency FROM jabali_users WHERE st_grade LIKE '%".$data."%' OR st_name LIKE '%".$data."%' OR st_code LIKE '%".$data."%' OR st_mail LIKE '%".$data."%' OR st_phone LIKE '%".$data."%' OR st_unit LIKE '%".$data."%' OR st_dependency LIKE '%".$data."%'";
                $result = mysqli_query($this->link,$query);
                $data = array();
                while ($data[]=mysqli_fetch_assoc($result));
                array_pop($data);
                return $data;
            }else{
                return false;
            }
        }

        public function getUserList(){
            $query="SELECT st_code, id_user, st_name, st_unit FROM jabali_users ";
            $result = mysqli_query($this->link,$query);
            $data = array();
            while ($data[]=mysqli_fetch_assoc($result));
            array_pop($data);
            return $data;
            
        }

        public function getUnitList(){
            $query="SELECT DISTINCT st_unit FROM jabali_users ";
            $result = mysqli_query($this->link,$query);
            $data = array();
            while ($data[]=mysqli_fetch_assoc($result));
            array_pop($data);
            return $data;
            
        }

        public function getDependencyList(){
            $query="SELECT DISTINCT st_dependency FROM jabali_users ";
            $result = mysqli_query($this->link,$query);
            $data = array();
            while ($data[]=mysqli_fetch_assoc($result));
            array_pop($data);
            return $data;
            
        }

        public function exportBarCodes($data=NULL){
            if(!empty($data)){
                $query_f="SELECT /*id_user, st_grade, st_name, st_code, st_unit, st_dependency*/ FROM jabali_users WHERE 1" ;
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