<?php 
require 'js/conexion.js'; 
$titulo = $_POST['titulo'];
 if ($conn){
        $sql = "SELECT * FROM titulo_index order by posicion_menu desc limit 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $posicion_menu  = $row["posicion_menu"] + 1;
          $posicion_submenu = 0;
        }
    }else{
      $posicion_menu  = 1;
      $posicion_submenu = 0;
    }

  }

  if ($conn){
        $sql = "SELECT * FROM titulo_index order by id_titulo desc limit 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $id_titulo  = $row["id_titulo"] + 1;
        }
    }else{
      $id_titulo=1;
    }

  }



  $sql = "INSERT INTO titulo_index VALUES (".$id_titulo.",'".$titulo."', ".$posicion_menu.", ".$posicion_submenu.")";
  if ($conn->query($sql) === TRUE) {
    header("Location: http://mbprocedimientos.esy.es/?pid=3b511438d07dbd9baec409c21d4c4c80"); 
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
?>