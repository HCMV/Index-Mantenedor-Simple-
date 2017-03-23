<?php 
require 'js/conexion.js'; 
//obtengo los datos enviados por post y los almaceno en variables
$titulo = $_POST['titulo'];
$id_titulo = $_POST['id_titulo'];
// realizo modificación del nombre del titulo
  $sql = "UPDATE titulo_index SET nombre_titulo = '".$titulo."' where id_titulo = ".$id_titulo."";
  if ($conn->query($sql) === TRUE) {
  	// si la conexión es correcta y consulta son correctas envio al mantenedor de titulos
    header("Location: http://localhost/Index-Mantenedor-Simple--master/?pid=38e8574b105eb4f5ea7d2461773aaf93"); 
  } else {
  	// en caso contrario muestro el error
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
?>