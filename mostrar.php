<?php
if(isset($_POST['id_titulo'])){
$id_titulo = $_POST['id_titulo'];
}else{
header("location:index.php");
}

 if ($conn){
        $sql = "SELECT * FROM titulo_index inner join cuerpo_titulo on titulo_index.id_titulo=cuerpo_titulo.cuerpo_id_titulo  where id_titulo = ".$id_titulo."";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $nombre_titulo      = $row["nombre_titulo"];
          $cuerpo_tipo        = $row["cuerpo_tipo"];
          $cuerpo_detalle     = $row["cuerpo_detalle"];
          $cuerpo_asunto      = $row["cuerpo_asunto"];
          $cuerpo_solicitud   = $row["cuerpo_solicitud"];
          $cuerpo_requisitos  = $row["cuerpo_requisitos"];
          $cuerpo_gestion     = $row["cuerpo_gestion"];
          $cuerpo_nocumple    = $row["cuerpo_nocumple"];
          $cuerpo_cumple      = $row["cuerpo_cumple"];
          $cuerpo_cierre      = $row["cuerpo_cierre"];

           echo '<div class="table-responsive">
                    <table class="table table-hover">
                      <tr>
                        <th><strong><h4><pre>'.$nombre_titulo.'</pre></h4></strong></th>
                      </tr>
                      <tr style="display: inline-table; ">
                        <td>
                          <h4><strong>Tipo</strong></h4><pre>'.$cuerpo_tipo.'</pre>
                        </td>
                        <td>
                          <h4><strong>Detalle</strong></h4><pre>'.$cuerpo_detalle.'</pre>
                        </td>
                        <td>
                            <h4><strong>Asunto</strong></h4><pre>'.$cuerpo_asunto.'</pre>
                        </td>
                        <td>
                            <h4><strong>Solicitud</strong></h4><pre>'.$cuerpo_solicitud.'</pre>
                        </td>
                        <td>
                            <h4><strong>Previamente</strong></h4><pre>'.$cuerpo_requisitos.'</pre>
                        </td>                      
                      </tr>
                      <tr>
                        <td colspan="2">
                            <h4><strong>Gestión de CS</strong></h4><pre>'.$cuerpo_gestion.'</pre>
                        </td>                        
                      </tr>
                      <tr>
                        <td colspan="2">
                            <h4><strong>No Cumple</strong></h4><pre>'.$cuerpo_nocumple.'</pre>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2">
                            <h4><strong>Cumple</strong></h4><pre>'.$cuerpo_cumple.'</pre>
                        </td>                        
                      </tr>
                      <tr>
                        <td colspan="2" >
                            <h4><strong>Respuesta</strong></h4><pre style="background: #555555; color: white;">'.$cuerpo_cierre.'</pre>
                        </td>                        
                      </tr>
                  </table>
                  <div>';
          		}
          	}
          }
$conn->close();
?>
