<?php
session_start();
$key = 'cu4n70_m4s_c0mpl3j0_m3j05';
require 'js/conexion.js'; 
$checkbox = '';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>MasterBase®</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Formulario css -->
    <link href="css/form.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="css/dropdowns-enhancement.css" rel="stylesheet">

    <!-- Custom styles for this template 
    <link href="css/grid.css" rel="stylesheet">-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type='text/javascript' src="js/dropdowns-enhancement.js"></script>  
<script type="text/javascript">
	$(document).ready(function()
		{
			$("#radio1").click(function () {
					$("form[name=form3]").hide(1000);
          $("form[name=form4]").hide(1000);
          $("form[name=form2]").show(1000);
           	});
 
			$("#radio2").click(function () {	 
					$("form[name=form2]").hide(1000);
          $("form[name=form4]").hide(1000);
					$("form[name=form3]").show(1000);
			});

      $("#radio3").click(function () {   
          $("form[name=form2]").hide(1000);
          $("form[name=form3]").hide(1000);
          $("form[name=form4]").show(1000);
      });


		
 
		 });
</script>
<SCRIPT LANGUAGE="JavaScript">

function ClipBoard() 
{
holdtext.innerText = copytext.innerText;
Copied = holdtext.createTextRange();
Copied.execCommand("Copy");
}

</SCRIPT>

  </head>

  <body>
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

     
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
