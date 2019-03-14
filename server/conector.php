<?php 
    class ConectorBD{
        private $host;
        private $user;
        private $password;
        private $conexion;

        function __construct($host, $user, $password)
        {
            $this->host = $host;
            $this->user = $user;
            $this->password = $password;
        }

        function initConexion($nombre_bd)
        {
            $this->conexion = new mysqli($this->host, $this->user, $this->password, $nombre_bd);
            if ($this->conexion->connect_error){
                return "Error: ".$this->conexion->connect_error;
            }else{
                return "OK";
            }
        }
        function ejecutarQuery($query){
            return $this->conexion->query($query);
          }
        function cerrarConexion(){
            $this->conexion->close();
          }
        
          function insertData($tabla, $data){
            $sql = 'INSERT INTO '.$tabla.' (';
            $i = 1;
            foreach ($data as $key => $value) {
              $sql .= $key;
              if ($i<count($data)) {
                $sql .= ', ';
              }else $sql .= ')';
              $i++;
            }
            $sql .= ' VALUES (';
            $i = 1;
            foreach ($data as $key => $value) {
              $sql .= $value;
              if ($i<count($data)) {
                $sql .= ', ';
              }else $sql .= ');';
              $i++;
            }
            return $this->ejecutarQuery($sql);
            //echo $sql;
          }

    }
?>