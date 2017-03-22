<?php
if (isset($_POST['buscar'])){
  $buscar = $_POST['buscar'];
}else{
   $buscar = '';
}


 if ($conn){
        $sql = "SELECT * FROM titulo_index where nombre_titulo like '%".$buscar."%' order by id_titulo";

    $result = $conn->query($sql);
    echo '<table class="table table-hover">
                  <tr>
                    <th>Resultados</th>
                  </tr>';
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $nombre_titulo  = $row["nombre_titulo"];
          $id_titulo  = $row["id_titulo"];
          echo '
                  <tr>
                    <form id="mostrar'.$id_titulo.'" action="?pid='.md5($key."mostrar").'" method="post">
                    <td>
                    <input type="hidden" name="id_titulo" value ="'.$id_titulo.'" />'?>
                    <a href="#" onclick="document.getElementById('mostrar<?=$id_titulo?>').submit();" style="color: inherit; text-decoration: inherit; "><div style="height:100%;width:100%;"><?=$nombre_titulo?></div></a>
                    <?php
                echo'    </td>
                    </form>
                  </tr>';
        }
    }else{    echo '
                  <tr>
                    <td>No se encontraron coincidencias</td>
                  </tr>';}

              echo  '</tr>
                      </table>';
  }

$conn->close();
?>