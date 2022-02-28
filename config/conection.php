<?php
    class Conexion {
        private $host;
        private $user;
        private $password;
        private $database;

        public function __construct(){
            $this->host = "localhost";
            $this->user = "user_admn";
            $this->password = "l30n10";
            $this->database = "personal_jabali";
        }

        public function conectarse (){
            $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
            if($conn){
                //echo "Conexión exitosa"
            }
            else{
                die('Error de Conexión (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
            }
            return($conn);
        }
    }

?>