<!DOCTYPE html>
<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"> <!-- Resource style -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src='<?php echo Yii::app()->request->baseUrl; ?>/js/mainb.js'></script> <!-- Modernizr -->
		<title>Sol y Cobre</title>
	</head>
	<nav class="navbar navbar-default" role="navigation">
		<!-- El logotipo y el icono que despliega el menú se agrupan
             para mostrarlos mejor en los dispositivos móviles -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-ex1-collapse">
				<span class="sr-only">Desplegar navegación</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logoV2.png" width="100px" height="30px"></a>
		</div>

		<!-- Agrupar los enlaces de navegación, los formularios y cualquier
             otro elemento que se pueda ocultar al minimizar la barra -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#informacion">Informaci&#243;n</a></li>
			</ul>
		</div>
	</nav>

	<body>


	<?php echo $content; ?>

	</body>
</html>
