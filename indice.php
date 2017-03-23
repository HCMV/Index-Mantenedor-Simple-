<?php
 $_SESSION["pagina"]=0;
 ?>

  <div style="background:white; padding: 5px 5px 0px; border-radius:7px;">
  <h3 class="contents-heading">Tabla de Contenido</h3>
      <?php
      // valida si conexión es correcta, ejecuta la consulta sql
      if ($conn){
      	$sql = "SELECT * FROM titulo_index order by nombre_titulo, posicion_menu, posicion_submenu";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
    		// si el numero de columnas es mayor a 0, obtengo los datos de la consulta 
   		 while($row = $result->fetch_assoc()) {
        	$id  = $row["id_titulo"];
        	$nombre = $row["nombre_titulo"];
        	$posicion_menu = $row["posicion_menu"]; 
        	$posicion_submenu = $row["posicion_submenu"];

        echo '<div class="contents">';
            // si la variable posicion_submenu es igual a 0, genera títulos de index
        	if ($posicion_submenu == 0){
				echo 	'<ul class="list-unstyled">';
        echo  '<form id="mostrar'.$id.'" action="?pid='.md5($key."mostrar").'" method="post">';
        echo  '<input type="hidden" name="id_titulo" value ="'.$id.'" />';
		  	echo	'<li><a name="toc-1ticket" href="#" >'.$nombre.'</a>';
        echo  '</form>';
		  		// consulta por los submenu de cada título principal
		  		$sql2 = "SELECT * FROM titulo_index where posicion_menu = ".$posicion_menu." order by nombre_titulo, posicion_submenu ";
				  $result2 = $conn->query($sql2);

          if ($result2->num_rows > 0) {
				    while($row2 = $result2->fetch_assoc()) {
				 	      $id_sub  = $row2["id_titulo"];
        		  	$nombre_sub = $row2["nombre_titulo"];
        		  	$posicion_submenu = $row2["posicion_submenu"];
        		 
		  		   if ($posicion_submenu <> 0){
			  		    echo			'<ul class="list-unstyled">';
                echo      '<form id="mostrar'.$id_sub.'" action="?pid='.md5($key."mostrar").'" method="post">';
                echo      '<input type="hidden" name="id_titulo" value ="'.$id_sub.'" />';
			  			  echo      '<li ><a name="toc-2ticket" href="#" onclick="document.getElementById(\'mostrar'.$id_sub.'\').submit()">'.$nombre_sub.'</a></li>';
			          echo			'</form></ul>';
		  		    }
		  	   }
        }

		  	// fin consulta submenu

		  		echo		'</li>';
		  		echo	'</ul>';
		  		}
		  		echo '</div>';

   		}
		
  		} else {
        // si no hay datos envío el mensaje sin resultados
    		echo "Sin resultados";
		}

		$conn->close();
		}
  		?>	
    </p>
      <hr></div>
    </div>