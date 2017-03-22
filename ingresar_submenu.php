<?php 
require 'js/conexion.js'; 

$posicion_menu = $_POST['posicion_menu'];
$titulo = $_POST['titulo_submenu'];
 if ($conn){
        $sql = "SELECT * FROM titulo_index where posicion_menu = ".$posicion_menu." order by posicion_submenu desc limit 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $posicion_submenu  = $row["posicion_submenu"] + 1;
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



  $sql = "INSERT INTO titulo_index VALUES (".$id_titulo.",'".$titulo."', ".$posicion_menu.", ".$posicion_submenu.")";
print_r($sql);
  if ($conn->query($sql) === TRUE) {
    //header("Location: http://mbprocedimientos.esy.es/?pid=3b511438d07dbd9baec409c21d4c4c80"); 
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
 }

$conn->close();
?>