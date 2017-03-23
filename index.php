<?php
session_start();
$key = '<!$f€w5s%F5Q@_(an7ahlpdgh';
require 'js/conexion.js'; 
$checkbox = '';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Index</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Formulario css -->
    <link href="css/form.css" rel="stylesheet">

    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <!-- menú desplegable de mantenedor de subtitulo-->
    <script type='text/javascript' src="js/dropdowns-enhancement.js"></script>
    <link href="css/dropdowns-enhancement.css" rel="stylesheet">  
  </head>

  <body>
    <!-- comienza contenedor -->
    <div class="container"  style="background: #FF9900; ">

      <div class="page-header"  style="background: FF9900;">
         <a class="navbar-brand" href="?pid=<?php echo md5($key."indice"); ?>"  style="color: inherit;  text-decoration: inherit;"><img src="img/logo.png" style="margin-top: -15%; border-radius: 7px;"></a>
        <div class="row">
	        <div class="col-xs-12 col-sm-6 col-md-8"><p class="lead"></p></div>
	        <div class="col-xs-12 col-sm-6 col-md-8">
            <div class="pull-right">
	        	  <form class="navbar-form" action="?pid=<?php echo md5($key."buscador"); ?>" method="POST" role="Buscar">
					      <div class="input-group">
						      <input type="text" class="form-control" placeholder="Buscar" name="buscar" id="buscar" required>
						      <div class="input-group-btn">
						  	   <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search" title="Buscar"></i></button>
                    <?php if(!isset($_GET['pid']) || $_GET['pid'] == md5($key.'indice')){
                              echo '<a href="?pid='.md5($key."admin").'" class="btn btn-default"><i class="glyphicon glyphicon-user" title="Administrar"></i></a>';
                          }else{
                              echo '<a href="?pid='.md5($key."indice").'" class="btn btn-default"><i class="glyphicon glyphicon-home" title="Home"></i></a>';
                          }
                    ?>
						      </div>
					      </div>
				      </form>
            </div>
	        </div>
		    </div>
      </div>
       

	 <?php

    // Pequeña lógica para capturar la pagina que queremos abrir

    if (isset($_GET['pid']) && $_GET['pid'] == md5($key.'indice')){
      $pagina = 'indice';
    }elseif (isset($_GET['pid']) && $_GET['pid'] == md5($key.'buscador')){
      $pagina = 'buscador';
    }elseif (isset($_GET['pid']) && $_GET['pid'] == md5($key.'admin')){
      $pagina = 'admin';
    }elseif (isset($_GET['pid']) && $_GET['pid'] == md5($key.'mostrar')){
      $pagina = 'mostrar';
    }else{
      $pagina = 'indice';
    }

    

    /* Estamos considerando que el parámetro enviando tiene el mismo nombre del archivo a cargar, si este no fuera así
    se produciría un error de archivo no encontrado */
   
    require_once '' . $pagina . '.php';

    ?>

     
    </div> <!-- / fin container -->
  </body>
</html>
