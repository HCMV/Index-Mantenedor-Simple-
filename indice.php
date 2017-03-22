<?php
 $_SESSION["pagina"]=0;
 ?>

  <div style="background:white; padding: 55px; border-radius:7px;">
  <p style="padding:5px;">
 <h3 class="contents-heading">Tabla de Contenido</h3>
      <?php
      if ($conn){
      	$sql = "SELECT * FROM titulo_index order by nombre_titulo, posicion_menu, posicion_submenu";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
    		// output data of each row
   		 while($row = $result->fetch_assoc()) {
        	$id  = $row["id_titulo"];
        	$nombre = $row["nombre_titulo"];
        	$posicion_menu = $row["posicion_menu"]; 
        	$posicion_submenu = $row["posicion_submenu"];

        		echo '<div class="contents">';
        		if ($posicion_submenu == 0){
				echo 	'<ul class="list-unstyled">';
        echo      '<form id="mostrar'.$id.'" action="?pid='.md5($key."mostrar").'" method="post">';
        echo      '<input type="hidden" name="id_titulo" value ="'.$id.'" />'; ?>
		  		<li><a name="toc-1ticket" href="#" ><?=$nombre?></a> <!-- onclick="document.getElementById('mostrar<?=$id?>').submit();" -->

      <?php 
        echo  '</form>';
		  		// consulta por submenu
		  		$sql2 = "SELECT * FROM titulo_index where posicion_menu = ".$posicion_menu." order by nombre_titulo, posicion_submenu ";
				$result2 = $conn2->query($sql2);
				while($row2 = $result2->fetch_assoc()) {
				 	$id_sub  = $row2["id_titulo"];
        			$nombre_sub = $row2["nombre_titulo"];
        			$posicion_submenu = $row2["posicion_submenu"];
        		 
		  		if ($posicion_submenu <> 0){
			  		echo			'<ul class="list-unstyled">';
            echo      '<form id="mostrar'.$id_sub.'" action="?pid='.md5($key."mostrar").'" method="post">';
            echo      '<input type="hidden" name="id_titulo" value ="'.$id_sub.'" />'; ?>
			  			<li ><a name="toc-2ticket" href="#" onclick="document.getElementById('mostrar<?=$id_sub?>').submit();"><?=$nombre_sub?></a></li>
			 <?php	echo			'</form></ul>';
		  		}
		  	}

		  	// fin consulta submenu

		  		echo		'</li>';
		  		echo	'</ul>';
		  		}
		  		echo '</div>';

   		}
		
  		} else {
    		echo "Sin resultados";
		}
		$conn2->close();
		$conn->close();
		}
  		?>	
    </p>
      <hr></div>
    </div>