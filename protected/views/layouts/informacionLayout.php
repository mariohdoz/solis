<!DOCTYPE html>
<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet' type='text/css'>
		<link rel="import" href="http://fonts.googleapis.com/css?family=Concert+One">
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"> <!-- Resource style -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<title>Sol y Cobre</title>
	</head>
	<body>
	<header class="cd-header2">
		<div id="cd-logo"><a href="#0">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logoV2.png" width="150px" height="50px" alt="Logo"></a></div>
	</header>

	<?php echo $content; ?>
	</body>
</html>
