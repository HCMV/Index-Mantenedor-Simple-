<?php 
require 'js/conexion.js'; 
$titulo = $_POST['titulo'];
$id_titulo = $_POST['id_titulo'];

  $sql = "UPDATE titulo_index SET nombre_titulo = '".$titulo."' where id_titulo = ".$id_titulo."";
  if ($conn->query($sql) === TRUE) {
    header("Location: http://mbprocedimientos.esy.es/?pid=3b511438d07dbd9baec409c21d4c4c80"); 
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
?>