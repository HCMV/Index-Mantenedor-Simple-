  <div style="background:white; border-radius:7px;">
 <?php
 $_SESSION["pagina"]=2;

if (isset($_POST['accion'])){
  $accion = $_POST['accion'];
}else{
   $accion = '';
} 
if (isset($_POST['mod'])){
  $mod = $_POST['mod'];
}else{
   $mod = '';
} 
if (isset($_POST['sub'])){
  $sub = $_POST['sub'];
}else{
   $sub = '';
}
if (isset($_POST['del'])){
  $del = $_POST['del'];
}else{
   $del = '';
}



if($accion == "MT"){
  $sql = "SELECT * FROM titulo_index where id_titulo = ".$mod."";

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $nombre_titulo  = $row["nombre_titulo"];
          $id_titulo  = $row["id_titulo"];
        }
  }
}
if($accion == "MS"){
  $sql = "SELECT * FROM titulo_index inner join cuerpo_titulo on id_titulo = cuerpo_id_titulo where id_titulo = ".$mod."";

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $nombre_titulo  = $row["nombre_titulo"];
          $id_titulo  = $row["id_titulo"];
          $cuerpo_tipo = $row["cuerpo_tipo"];
          $cuerpo_detalle = $row["cuerpo_detalle"];
          $cuerpo_asunto = $row["cuerpo_asunto"];
          $cuerpo_solicitud = $row["cuerpo_solicitud"];
          $cuerpo_requisitos = $row["cuerpo_requisitos"];
          $cuerpo_gestion = $row["cuerpo_gestion"];
          $cuerpo_gestion_otros = $row["cuerpo_gestion_otros"];
          $cuerpo_nocumple = $row["cuerpo_nocumple"];
          $cuerpo_cumple = $row["cuerpo_cumple"];
          $cuerpo_cierre = $row["cuerpo_cierre"];
        }
  }
}

if($accion == "D"){

  $sql = "DELETE FROM titulo_index where id_titulo = ".$del."";
  $conn->query($sql);
   

  if($sub <> 0){

    $sql = "DELETE FROM cuerpo_titulo where cuerpo_id_titulo = ".$del."";
    $conn->query($sql);
  }
}
 ?>
 <div class="contents">

      

     
<?php if($accion == "AT"){ 
   echo'
    <form name="form2" action="ingresar_nuevo.php"  role="form2" method="POST">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-box">
          <div class="form-top">
            <div class="form-top-left">
              <h3>Mantenedor de Títulos</h3>
                <p>Ingrese un Título</p>
            </div>
            <div class="form-top-right">
              <i class="glyphicon glyphicon-book"></i>
            </div>
            </div>
            <div class="form-bottom contact-form">
            <div class="form-group">
              <label class="sr-only" for="titulo">Título:</label>
                <input type="text" name="titulo" placeholder="Ingrese un título..." class="form-control" id="titulo" required>
            </div>
              <button type="submit" class="btn-f ">Guardar</button>&nbsp;&nbsp;<button onClick="javascript:window.history.back();" type="submit" class="btn-f pull-right">Cancelar</button>
        </div>
        </div>
      </div>
    </form>';
}elseif($accion == "MS"){
echo'
         <form name="form4" action="modificar_cuerpo.php" method="POST" role="form4">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3 form-box">
              <div class="form-top">
                <div class="form-top-left">
                  <h3>Mantenedor de Subtítulos</h3>
                    <p>Ingrese un subtítulo al título seleccionado</p>
                </div>
                <div class="form-top-right">
                  <i class="glyphicon glyphicon-book"></i>
                </div>
                </div>
                <div class="form-bottom contact-form">
                  <div class="form-group">  
                  </div>
                  <div class="form-group">  
                    <label class="sr-only" for="cuerpo_tipo">Tipo:</label>
                    <input type="hidden" name="id_titulo" value="'.$id_titulo.'">
                    <input type="text" name="cuerpo_tipo" value="'.$cuerpo_tipo.'" placeholder="Tipo..." class="form-control" id="tipo" required>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_detalle">Detalle</label>
                    <input type="text" name="cuerpo_detalle" value="'.$cuerpo_detalle.'"" placeholder="Detalle..." class="form-control" id="detalle" required>
                  </div>
                   <div class="form-group">
                    <label class="sr-only" for="cuerpo_detalle">Detalle</label>
                    <input type="text" name="cuerpo_asunto" value="'.$cuerpo_asunto.'" placeholder="Detalle..." class="form-control" id="asunto" required>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_solicitud">Solicitud</label>
                    <textarea name="cuerpo_solicitud"  placeholder="Solicitud..." rows="5" class="form-control" id="solicitud" style="resize: none;" required>'.$cuerpo_solicitud.'</textarea>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_requisitos">Previamente</label>
                    <textarea name="cuerpo_requisitos"  placeholder="Previamente..." rows="5" class="form-control" id="requisitos" style="resize: none;" required>'.$cuerpo_requisitos.'</textarea>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_gestion">Gestión de CS</label>
                    <textarea name="cuerpo_gestion" placeholder="Gestion de CS..." rows="5" class="form-control" id="gestion" style="resize: none;" required>'.$cuerpo_gestion.'</textarea>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_gestion">Gestión otras áreas</label>
                    <textarea name="cuerpo_gestion_otros"  placeholder="Gestión otras áreas..." rows="5" class="form-control" id="gestion_otros" style="resize: none;" required>'.$cuerpo_gestion_otros.'</textarea>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_nocumple">No Cumple</label>
                    <textarea name="cuerpo_nocumple"  placeholder="No Cumple por..." rows="5" class="form-control" id="solicitud" style="resize: none;" required>'.$cuerpo_nocumple.'</textarea>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_cumple">Cumple</label>
                    <textarea name="cuerpo_cumple" placeholder="Cumple por..." rows="5" class="form-control" id="solicitud" style="resize: none;" required>'.$cuerpo_cumple.'</textarea>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_cierre">Respuesta Cierre</label>
                    <textarea name="cuerpo_cierre"  placeholder="Respuesta Cierre..." rows="5" class="form-control" id="solicitud" style="resize: none;" required>'.$cuerpo_cierre.'</textarea>
                  </div>
                    <button type="submit" class="btn-f ">Guardar</button>&nbsp;&nbsp;<button onClick="javascript:window.history.back();" type="submit" class="btn-f pull-right">Cancelar</button>
                </div>
            </div>
          </div>
      </form>';
  }elseif($accion == "MT"){ 
   echo'
    <form name="form2" action="modificar_nuevo.php"  role="form2" method="POST">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-box">
          <div class="form-top">
            <div class="form-top-left">
              <h3>Mantenedor de Títulos</h3>
                <p>Ingrese un Título</p>
            </div>
            <div class="form-top-right">
              <i class="glyphicon glyphicon-book"></i>
            </div>
            </div>
            <div class="form-bottom contact-form">
            <div class="form-group">
              <label class="sr-only" for="titulo">Título:</label>
                <input type="hidden" name="id_titulo" value="'.$id_titulo.'">
                <input type="text" name="titulo" value="'.$nombre_titulo.'" placeholder="Ingrese un título..." class="form-control" id="titulo" required>
            </div>
              <button type="submit" class="btn-f ">Guardar</button>&nbsp;&nbsp;<button onClick="javascript:window.history.back();" type="submit" class="btn-f pull-right">Cancelar</button>
        </div>
        </div>
      </div>
    </form>';
  }elseif($accion == "AS"){?>
         <form name="form4" action="ingresar_cuerpo.php" method="POST" role="form4">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3 form-box">
              <div class="form-top">
                <div class="form-top-left">
                  <h3>Mantenedor de Subtítulos</h3>
                    <p>Ingrese un subtítulo al título seleccionado</p>
                </div>
                <div class="form-top-right">
                  <i class="glyphicon glyphicon-book"></i>
                </div>
                </div>
                <div class="form-bottom contact-form">
                  <div class="btn-group">
                    <button data-toggle="dropdown" class="btn-select btn-default dropdown-toggle">Seleccione Título Principal <span class="caret"></span></button>
                      <ul class="dropdown-menu pull-middle pull-center noclose">
                        <?php 

                     if($sub==""){
                          if ($conn){
                            $sql = "SELECT * FROM titulo_index order by nombre_titulo";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) {

                                  if($row['posicion_submenu'] == 0){
                                    echo "<li><input type='radio' id=". $row['id_titulo'] .'a'." name='cuerpo_id_titulo' value=". $row['id_titulo'] . "><label for=". $row['id_titulo'] .'a'. ">" . $row['nombre_titulo'] . "</label></li>";
                                    }
                              }
                            }
                          }
                          }
                        ?>
                      </ul>
                  </div>
                  <div class="form-group">  
                  </div>
                  <div class="form-group">  
                    <label class="sr-only" for="cuerpo_tipo">Tipo:</label>
                    <input type="text" name="cuerpo_tipo" placeholder="Tipo..." class="form-control" id="tipo" required>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_detalle">Detalle</label>
                    <input type="text" name="cuerpo_detalle" placeholder="Detalle..." class="form-control" id="detalle" required>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_solicitud">Asunto</label>
                    <textarea name="cuerpo_asunto" placeholder="Asunto..." rows="5" class="form-control" id="asunto" style="resize: none;" required></textarea>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_solicitud">Solicitud</label>
                    <textarea name="cuerpo_solicitud" placeholder="Solicitud..." rows="5" class="form-control" id="solicitud" style="resize: none;" required></textarea>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_requisitos">Previamente</label>
                    <textarea name="cuerpo_requisitos" placeholder="Previamente..." rows="5" class="form-control" id="requisitos" style="resize: none;" required></textarea>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_gestion">Gestión de CS</label>
                    <textarea name="cuerpo_gestion" placeholder="Gestion de CS..." rows="5" class="form-control" id="gestion" style="resize: none;" required></textarea>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_gestion">Gestión otras áreas</label>
                    <textarea name="cuerpo_gestion_otros" placeholder="Gestión otras áreas..." rows="5" class="form-control" id="gestion_otros" style="resize: none;" required></textarea>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_nocumple">No Cumple</label>
                    <textarea name="cuerpo_nocumple" placeholder="No Cumple por..." rows="5" class="form-control" id="solicitud" style="resize: none;" required></textarea>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_cumple">Cumple</label>
                    <textarea name="cuerpo_cumple" placeholder="Cumple por..." rows="5" class="form-control" id="solicitud" style="resize: none;" required></textarea>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="cuerpo_cierre">Respuesta Cierre</label>
                    <textarea name="cuerpo_cierre" placeholder="Respuesta Cierre..." rows="5" class="form-control" id="solicitud" style="resize: none;" required></textarea>
                  </div>
                    <button type="submit" class="btn-f ">Guardar</button>&nbsp;&nbsp;<button onClick="javascript:window.history.back();" type="submit" class="btn-f pull-right">Cancelar</button>
                </div>
            </div>
          </div>
      </form>   
<?php }elseif($accion <> "AT" || $accion <> "AS" || $accion <> "MT" || $accion <> "MS"){ ?>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-box">
          <div class="form-top">
            <div class="form-top-left">
              <h3>Mantenedor de títulos</h3>
                <p>Seleccione un título/subtítulo para modificar</p>
            </div>
            <div class="form-top-right">
              <i class="glyphicon glyphicon-book"></i>
            </div>
          </div>  

          <div class="table-responsive">
            <table class="table" style="background: #DF5E08; background: rgba(223,94,8, 0.9);" >
              <tr>
                <td class="col-md-1">
                  <form action="?pid=<?php echo md5($key."admin"); ?>" method="POST" role="form3">
                    <input type="hidden" name="accion" value="AT">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-plus" title="Nuevo Titulo"></i></button>
                  </form>
                </td>
                <td class="col-md-0">
                  <form action="?pid=<?php echo md5($key."admin"); ?>" method="POST" role="form3">
                    <input type="hidden" name="accion" value="AS">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-plus-sign" title="Nuevo Subtitulo"></i></button>
                  </form>
                </td>
             </tr>
            </table>
          </div>
          <form action="?pid=<?php echo md5($key."admin"); ?>" method="POST" role="form4">
            
                <?php 
                      if ($conn){
                        $sql = "SELECT * FROM titulo_index order by nombre_titulo, posicion_menu";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          echo '<div class="table-responsive">
                                  <table class="table table-hover" style="background: #FF9900; opacity:0.9;">
                                  <tr>
                                    <th >Nombre</th>
                                    <th colspan="2" class="col-md-2">Opciones</th>
                                  </tr>';
                                  $i=1;
                          while($row = $result->fetch_assoc()) {
                          $submenu = $row['posicion_submenu'];
                          if($submenu == 0){
                            $accion = "MT";
                          }else{
                            $accion = "MS";
                          } 
                          echo '
                                  <tr>
                                    <td>'.$row['nombre_titulo'].'</td>

                                    <td class="align-left">
                                      </div>
                          
                                       <form name="'.$i.'" action="#" method="POST" role="formmod'.$i.'">
                                       <input type="hidden" name="accion" value="'.$accion.'">
                                       <input type="hidden" name="mod" value="'.$row['id_titulo'].'">
                                       <input type="hidden" name="sub" value="'.$row['posicion_submenu'].'">
                                       <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-edit" title="Nuevo Subtitulo"></i></button>
                                        </form>

                                      </div>
                                      </div>
                                    </td>
                                    <td>
                                      </div>
                                        <form name="'.$i.'" action="#" method="POST" role="form3">
                                       <input type="hidden" name="accion" value="D">
                                       <input type="hidden" name="del" value="'.$row['id_titulo'].'">
                                       <input type="hidden" name="sub" value="'.$row['posicion_submenu'].'">
                                       <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-remove" title="Nuevo Subtitulo"></i></button>
                                        </form>
                                      </div>
                                    </td>

                                  ';
                                  $i++;

                          }
                          echo '</tr>
                                  </table>
                                  </div>  ';
                        }
                      }
                      
                    ?>

              <br>
               
             
        </div>
      </div>
    </form>

<?php }?>
  </div>
<hr>
