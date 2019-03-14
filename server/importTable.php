<?php
    class ConectorBD
    {
      private $host = 'localhost';
      private $user = 'Aviles';
      private $password = '123';
      private $conexion;
    
      function initConexion($nombre_db){
        $this->conexion = new mysqli($this->host, $this->user, $this->password, $nombre_db);
        if ($this->conexion->connect_error) {
          return "Error:" . $this->conexion->connect_error;
        }else {
          return "OK";
        }
      }
  
      
      function getNewTableQuery($nombre_tbl, $campos){
        $sql = 'CREATE TABLE '.$nombre_tbl.' (';
        $length_array = count($campos);
        $i = 1;
        
        foreach ($campos as $key => $value) {
          $sql .= $key.' '.$value;
          if ($i!= $length_array) {
            $sql .= ', ';
          }else { 
            $sql .= ');'; 
          }
          $i++; 
        }
        return $sql;
      }

      function ejecutarQuery($query){
        return $this->conexion->query($query);
      }
      function cerrarConexion(){
        $this->conexion->close();
      }
  
  
    }

#----------------------------------------------------------------------
$nombreTabla = 'orden';

$props['nombre']= 'VARCHAR(50)';
  $props['apellido']= 'VARCHAR(50)';
  $props['email']= 'VARCHAR(50)';
  $props['telefono']= 'VARCHAR(10)';
  $props['compania']= 'VARCHAR(50)';
  $props['tarjeta']= 'VARCHAR(16)';
  $props['n_productos']= 'INT';
  $props['total']= 'INT';

$conector = new ConectorBD();

if ($conector->initConexion('institute')=='OK') {
  $query = $conector->getNewTableQuery($nombreTabla, $props);
  if ($conector->ejecutarQuery($query)) {
    $response['msg']="OK";
  }else {
    $response['msg']="Algo salio mal";
  }
  echo json_encode($response);
  $conector->cerrarConexion();
}else {
  echo $conector->initConexion();
}

 ?>