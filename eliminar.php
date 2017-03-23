<?php 
require 'js/conexion.js'; 
$titulo = $_POST['titulo'];
$id_titulo = $_POST['id_titulo'];
// elimina titulo o subtitulo por el identificador
  $sql = "Delete titulo_index where id_titulo = ".$id_titulo."";
  if ($conn->query($sql) === TRUE) {
    header("Location: http://localhost/Helper/"); 
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
?>