<?php
  require('access.php');
  require('conector.php');
  require('productos.php');

  $data=Array();
  $data['nombre'] = "'".$_POST['nombre']."'";
  $data['apellido'] = "'".$_POST['apellido']."'";
  $data['email'] = "'".$_POST['email']."'";
  $data['telefono'] = "'".$_POST['telefono']."'";
  $data['compania'] = "'".$_POST['compania']."'";
  $data['tarjeta'] = "'".$_POST['tarjeta']."'"; 
  $data['n_productos'] = "'".$_POST['n_productos']."'";
  $data['total'] = operaciones($_POST['n_productos']);;
  
  

  $con = new ConectorBD( $host,$user,$pass);
  $response['conexion'] = $con->initConexion($database);
  if ($response['conexion']=='OK') {
    if($con->insertData($tabla, $data)){
      $response['msg']="Pago Exitoso";
    }else {
      $response['msg']= "Hubo un error y no se ha podido procesar su pago";
    }
  }else {
    $response['msg']= "No se pudo conectar a la base de datos";
  }
  echo json_encode($response);
 ?>