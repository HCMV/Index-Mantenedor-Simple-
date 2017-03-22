<?php 
require 'js/conexion.js'; 

//print_r($_POST)."<br>";


$cuerpo_id_titulo   = str_replace('a', '', $_POST['cuerpo_id_titulo']);
$cuerpo_tipo        = $_POST['cuerpo_tipo'];
$cuerpo_detalle     = $_POST['cuerpo_detalle'];
$cuerpo_solicitud   = $_POST['cuerpo_solicitud'];
$cuerpo_asunto      = $_POST['cuerpo_asunto'];
$cuerpo_requisitos  = $_POST['cuerpo_requisitos'];
$cuerpo_gestion     = $_POST['cuerpo_gestion'];
$cuerpo_gestion_otros = $_POST['cuerpo_gestion_otros'];
$cuerpo_nocumple    = $_POST['cuerpo_nocumple'];
$cuerpo_cumple      = $_POST['cuerpo_cumple'];
$cuerpo_cierre      = $_POST['cuerpo_cierre'];


if ($conn){
        $sql = "SELECT * FROM titulo_index where id_titulo = ".$cuerpo_id_titulo." order by posicion_submenu desc limit 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $posicion_submenu  = $row["posicion_submenu"] + 1;
          $posicion_menu  = $row["posicion_menu"];
        }
    }else{
      $posicion_submenu  = 1;
    }

  }

  if ($conn){
        $sql = "SELECT * FROM titulo_index order by id_titulo desc limit 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $id_titulo  = $row["id_titulo"] + 1;
        }
    }

  }


 $sql = "INSERT INTO titulo_index VALUES (".$id_titulo.",'".$cuerpo_detalle."', ".$posicion_menu.", ".$posicion_submenu.")";
 $conn->query($sql);



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



  $sql = "INSERT INTO cuerpo_titulo VALUES (".$autoincremento.",".$id_titulo.", '".$cuerpo_tipo."', '".$cuerpo_detalle."', '".$cuerpo_asunto."', '".$cuerpo_solicitud."', '".$cuerpo_requisitos."', '".$cuerpo_gestion."', '".$cuerpo_gestion_otros."','".$cuerpo_nocumple."', '".$cuerpo_cumple."', '".$cuerpo_cierre."')";
  
}elseif ($accion = "M"){
  $sql = "UPDATE cuerpo_titulo SET cuerpo_id_titulo = ".$id_titulo.", cuerpo_tipo = '".$cuerpo_tipo."', cuerpo_detalle = '".$cuerpo_detalle."', cuerpo_asunto = '".$cuerpo_asunto."', cuerpo_solicitud = '".$cuerpo_solicitud."', cuerpo_requisitos = '".$cuerpo_requisitos."', cuerpo_gestion = '".$cuerpo_gestion."', cuerpo_gestion_otros = '".$cuerpo_gestion_otros."',cuerpo_nocumple = '".$cuerpo_nocumple."', cuerpo_cumple = '".$cuerpo_cumple."', cuerpo_cierre = '".$cuerpo_cierre."' WHERE autoincremento = ".$autoincremento."";
}
  

  if ($conn->query($sql) === TRUE) {
   header("Location: http://mbprocedimientos.esy.es/?pid=3b511438d07dbd9baec409c21d4c4c80"); 
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
 }

$conn->close();
?>