<?php 
require 'js/conexion.js'; 

//print_r($_POST)."<br>";


$cuerpo_id_titulo   = $_POST['id_titulo'];
$cuerpo_tipo        = $_POST['cuerpo_tipo'];
$cuerpo_detalle     = $_POST['cuerpo_detalle'];
$cuerpo_asunto     = $_POST['cuerpo_asunto'];
$cuerpo_solicitud   = $_POST['cuerpo_solicitud'];
$cuerpo_requisitos  = $_POST['cuerpo_requisitos'];
$cuerpo_gestion     = $_POST['cuerpo_gestion'];
$cuerpo_gestion_otros = $_POST['cuerpo_gestion_otros'];
$cuerpo_nocumple    = $_POST['cuerpo_nocumple'];
$cuerpo_cumple      = $_POST['cuerpo_cumple'];
$cuerpo_cierre      = $_POST['cuerpo_cierre'];



 $sql = "UPDATE  titulo_index SET nombre_titulo = '".$cuerpo_detalle."' where id_titulo = ".$cuerpo_id_titulo."";
 $conn->query($sql);



 
  $sql = "UPDATE cuerpo_titulo SET cuerpo_tipo = '".$cuerpo_tipo."', cuerpo_detalle = '".$cuerpo_detalle."', cuerpo_asunto = '".$cuerpo_asunto."', cuerpo_solicitud = '".$cuerpo_solicitud."', cuerpo_requisitos = '".$cuerpo_requisitos."', cuerpo_gestion = '".$cuerpo_gestion."', cuerpo_gestion_otros = '".$cuerpo_gestion_otros."',cuerpo_nocumple = '".$cuerpo_nocumple."', cuerpo_cumple = '".$cuerpo_cumple."', cuerpo_cierre = '".$cuerpo_cierre."' WHERE cuerpo_id_titulo = ".$cuerpo_id_titulo."";

  

  if ($conn->query($sql) === TRUE) {
   header("Location: http://mbprocedimientos.esy.es/?pid=3b511438d07dbd9baec409c21d4c4c80"); 
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
 }

$conn->close();
?>