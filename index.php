<?php
session_start();
$key = '<!$f€w5s%F5Q@_(an7ahlpdgh';
require 'js/conexion.js'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico">

    <title>Index</title>

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     
    <!-- Formulario css -->
    <link href="css/form.css" rel="stylesheet">


    <!-- menú desplegable de mantenedor de subtitulo-->
    <script type='text/javascript' src="js/dropdowns-enhancement.js"></script>
    <link href="css/dropdowns-enhancement.css" rel="stylesheet">  
    <!-- pruebas -->
    <script type="text/javascript">
    $(document).ready(function(){
       $('#modaltitulo').click(function(){
        $('#server_msg_modal').modal('show');
       });
       $('#modaltitulo2').click(function(){
        $('#modal_subtitulo').modal('show');
       });
      $('#modalsubtitulo').click(function(){
       $('#modal_subtitulo').modal('show');
      });
      $("#cancelar").click(function() {
        $(':input','#form2').val("");
      });
    });
</script>

<script>
$(document).ready(function() {
    $('#userForm')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'The full name is required'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z\s]+$/,
                            message: 'The full name can only consist of alphabetical characters'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email address is required'
                        },
                        emailAddress: {
                            message: 'The email address is not valid'
                        }
                    }
                },
                website: {
                    validators: {
                        notEmpty: {
                            message: 'The website address is required'
                        },
                        uri: {
                            allowEmptyProtocol: true,
                            message: 'The website address is not valid'
                        }
                    }
                }
            }
        })
        .on('success.form.fv', function(e) {
            // Save the form data via an Ajax request
            e.preventDefault();

            var $form = $(e.target),
                id    = $form.find('[name="id"]').val();

            // The url and method might be different in your application
            $.ajax({
                url: 'http://jsonplaceholder.typicode.com/users/' + id,
                method: 'PUT',
                data: $form.serialize()
            }).success(function(response) {
                // Get the cells
                var $button = $('button[data-id="' + response.id + '"]'),
                    $tr     = $button.closest('tr'),
                    $cells  = $tr.find('td');

                // Update the cell data
                $cells
                    .eq(1).html(response.name).end()
                    .eq(2).html(response.email).end()
                    .eq(3).html(response.website).end();

                // Hide the dialog
                $form.parents('.bootbox').modal('hide');

                // You can inform the user that the data is updated successfully
                // by highlighting the row or showing a message box
                bootbox.alert('The user profile is updated');
            });
        });

    $('.editButton').on('click', function() {
        // Get the record's ID via attribute
        var id = $(this).attr('data-id');

        $.ajax({
            url: 'http://jsonplaceholder.typicode.com/users/' + id,
            method: 'GET'
        }).success(function(response) {
            // Populate the form fields with the data returned from server
            $('#userForm')
                .find('[name="id"]').val(response.id).end()
                .find('[name="name"]').val(response.name).end()
                .find('[name="email"]').val(response.email).end()
                .find('[name="website"]').val(response.website).end();

            // Show the dialog
            bootbox
                .dialog({
                    title: 'Edit the user profile',
                    message: $('#userForm'),
                    show: false // We will show it manually later
                })
                .on('shown.bs.modal', function() {
                    $('#userForm')
                        .show()                             // Show the login form
                        .formValidation('resetForm'); // Reset form
                })
                .on('hide.bs.modal', function(e) {
                    // Bootbox will remove the modal (including the body which contains the login form)
                    // after hiding the modal
                    // Therefor, we need to backup the form
                    $('#userForm').hide().appendTo('body');
                })
                .modal('show');
        });
    });
});
</script>
    <!-- pruebas

  -->
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

 
<hr>


    <div id="responsive" class="modal fade" tabindex="-1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Responsive</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <h4>Some Input</h4>
            <p><input class="form-control" type="text"></p>
            <p><input class="form-control" type="text"></p>
            <p><input class="form-control" type="text"></p>
            <p><input class="form-control" type="text"></p>
            <p><input class="form-control" type="text"></p>
            <p><input class="form-control" type="text"></p>
            <p><input class="form-control" type="text"></p>
          </div>
          <div class="col-md-6">
            <h4>Some More Input</h4>
            <p><input class="form-control" type="text"></p>
            <p><input class="form-control" type="text"></p>
            <p><input class="form-control" type="text"></p>
            <p><input class="form-control" type="text"></p>
            <p><input class="form-control" type="text"></p>
            <p><input class="form-control" type="text"></p>
            <p><input class="form-control" type="text"></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default" >Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>

  
</div>
  </body>
</html>
