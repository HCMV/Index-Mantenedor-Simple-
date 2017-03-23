<?php 
require 'js/conexion.js'; 

//obtengo datos de post de formulario
$cuerpo_id_titulo     = str_replace('a', '', $_POST['cuerpo_id_titulo']);
$cuerpo_tipo          = $_POST['cuerpo_tipo'];
$cuerpo_detalle       = $_POST['cuerpo_detalle'];
$cuerpo_solicitud     = $_POST['cuerpo_solicitud'];
$cuerpo_asunto        = $_POST['cuerpo_asunto'];
$cuerpo_requisitos    = $_POST['cuerpo_requisitos'];
$cuerpo_gestion       = $_POST['cuerpo_gestion'];
$cuerpo_gestion_otros = $_POST['cuerpo_gestion_otros'];
$cuerpo_nocumple      = $_POST['cuerpo_nocumple'];
$cuerpo_cumple        = $_POST['cuerpo_cumple'];
$cuerpo_cierre        = $_POST['cuerpo_cierre'];


//si conexión es correcta, realizo la consulta
if ($conn){
        $sql = "SELECT * FROM titulo_index where id_titulo = ".$cuerpo_id_titulo." order by posicion_submenu desc limit 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        // si hay registros obtengo el ultimo y sumo 1 
          $posicion_submenu  = $row["posicion_submenu"] + 1;
          $posicion_menu  = $row["posicion_menu"];
        }
    }else{
        // si no hay registros ingreso primera posición al submenú
      $posicion_submenu  = 1;
    }

  }

// si la conexión es correcta consulto por el último id ingresado
  if ($conn){
        $sql = "SELECT * FROM titulo_index order by id_titulo desc limit 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // almaceno el último id y le sumo 1
      while($row = $result->fetch_assoc()) {
          $id_titulo  = $row["id_titulo"] + 1;
      }
    }

  }

// inserto los datos en la tabla de titulos
 $sql = "INSERT INTO titulo_index VALUES (".$id_titulo.",'".$cuerpo_detalle."', ".$posicion_menu.", ".$posicion_submenu.")";
 $conn->query($sql);


// si la conexión es correcta consulto por el id si encuentro resultado, agrego condicion para modificar, en caso contrario la accion es agregar
 if ($conn){
        $sql = "SELECT * FROM cuerpo_titulo where cuerpo_id_titulo = ".$id_titulo."";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $autoincremento = $row["autoincremento"];
          $accion  = 'M';
        }
    }else{
          $accion  = 'A';
    }

  }

// si la accion es agregar, sumo 1 al autoincremento
  if ($accion == "A"){
  if ($conn){
        $sql = "SELECT * FROM cuerpo_titulo order by autoincremento desc limit 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $autoincremento  = $row["autoincremento"] + 1;
        }
    }else{
      $autoincremento  =  1;
    }

  }

// inserto los datos enviados

  $sql = "INSERT INTO cuerpo_titulo VALUES (".$autoincremento.",".$id_titulo.", '".$cuerpo_tipo."', '".$cuerpo_detalle."', '".$cuerpo_asunto."', '".$cuerpo_solicitud."', '".$cuerpo_requisitos."', '".$cuerpo_gestion."', '".$cuerpo_gestion_otros."','".$cuerpo_nocumple."', '".$cuerpo_cumple."', '".$cuerpo_cierre."')";
  
}elseif ($accion = "M"){
  // si accion es modificar, actualizo los datos enviados
  $sql = "UPDATE cuerpo_titulo SET cuerpo_id_titulo = ".$id_titulo.", cuerpo_tipo = '".$cuerpo_tipo."', cuerpo_detalle = '".$cuerpo_detalle."', cuerpo_asunto = '".$cuerpo_asunto."', cuerpo_solicitud = '".$cuerpo_solicitud."', cuerpo_requisitos = '".$cuerpo_requisitos."', cuerpo_gestion = '".$cuerpo_gestion."', cuerpo_gestion_otros = '".$cuerpo_gestion_otros."',cuerpo_nocumple = '".$cuerpo_nocumple."', cuerpo_cumple = '".$cuerpo_cumple."', cuerpo_cierre = '".$cuerpo_cierre."' WHERE autoincremento = ".$autoincremento."";
}
  

  if ($conn->query($sql) === TRUE) {
    // si la conexion y consulta son correctas envio a mantenedor de titulos
   header("Location: http://localhost/Index-Mantenedor-Simple--master/?pid=38e8574b105eb4f5ea7d2461773aaf93"); 
  } else {
    //en caso contrario muestro el error
    echo "Error: " . $sql . "<br>" . $conn->error;
 }

$conn->close();
?>