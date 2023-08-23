<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiDe Simulador de Declaraciones</title>
   <!-- Latest compiled and minified CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
   <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>-->

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
        /* Estilos personalizados */
        html, body {
            height: 100vh;
        }

        .content {
            flex: 1 0 auto;
        }
        .footer {
            text-align: center;
            padding: 10px;
        }
          input[type=text],input[type=number],input[type=password],input[type=email],input[type=date],select{
            border:none !important;
            border-bottom: 1px outset blue !important;
            border-right: 1px dotted blue !important;
          }
    </style>
</head>
<body class="d-flex flex-column">

        <!-- Contenido de la barra de navegación -->
        <div class="d-flex flex-wrap justify-content-between align-items-center bg-dark rounded border border-4">
        	<div class="p-2">
            	<a href="#">
                	<img src="<?php echo base_url()."/assets/images/utem.png"; ?>" alt="Logo" style="height: 60px; width: 90px;">
            	</a>
        	</div>
        	<div class="p-2"> 
            	<h4 class="text-white">
                    Simulador de Declaraciones (SiDe)
                </h4>
        	</div>

        	<div class="p-2">
            	<div class="d-flex align-items-center justify-content-end">
                    <div class="p-1">
                    	<span class="text-white"><?php echo $_SESSION['name']." ".$_SESSION['lastName']; ?></span>
                    </div>
                    <div class="p-1">
                    	<button class="btn btn-outline-light me-2" >Cambiar contraseña</button>
                    </div>
                    <div class="p-1">
                    	<a class="btn btn-outline-light" href="<?php echo site_url('log_out'); ?>">Cerrar sesión</a>
                    </div>
            	</div>
        	</div>
        </div>
       
    <div class="flex-grow-1 content">
        <div class="container-fluid">
            <div class="row">
                

    
<script type="text/javascript">
    function logout(){
        $.ajax({
            url: '<?php echo site_url('log_out'); ?>',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if(response){
                  confirm("¡Sesión cerrada!...");
                  window.location.href("<?php echo base_url(); ?>");
                }else{
                  alert("¡No se pudo cerrar sesión!...");
                }
            }
        });
    }

</script>   
            
	
