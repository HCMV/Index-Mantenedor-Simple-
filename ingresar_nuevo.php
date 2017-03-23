<?php 
require 'js/conexion.js'; 
$titulo = $_POST['titulo'];
 // verifico conexión
 if ($conn){
        // consulto por último id
        $sql = "SELECT * FROM titulo_index order by posicion_menu desc limit 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          // aumento en 1 el último id y lo almaceno en la variable, 0 en submenu para que aparezca como titulo
          $posicion_menu  = $row["posicion_menu"] + 1;
          $posicion_submenu = 0;
        }
    }else{
      //si no hay registros seteo la variable como 1 en posicion de menu y 0 en submenu para que aparezca como titulo
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
    header("Location: http://localhost/Index-Mantenedor-Simple--master/?pid=38e8574b105eb4f5ea7d2461773aaf93"); 
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
?>