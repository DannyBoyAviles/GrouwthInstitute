<?php
  require('access.php');

  $conexion = new mysqli($host, $user, $pass);
  if ($conexion->connect_error) {
    echo "Error:" . $conexion->connect_error;
  }

  $sql = 'CREATE DATABASE institute';
//si la sentencia se realizo correctamete retorna un valor true
  if ($conexion->query($sql) === TRUE) {
    $response['msg']="OK";
    #echo "La base de datos ventas_db se creó exitosamente";
  }else {
    $response['msg']= "Hubo un error";
    #echo "Se presentó un error ".$conexion->error;
  }
  echo json_encode($response);
  $conexion->close();
 ?>