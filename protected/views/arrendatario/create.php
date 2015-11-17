<?php
/* @var $this ArrendatarioController */
/* @var $model Arrendatario */

$this->breadcrumbs=array(
	'Arrendatarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Arrendatario', 'url'=>array('index')),
	array('label'=>'Manage Arrendatario', 'url'=>array('admin')),
);
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Registrar
	    <small>Registrar un arrendatario.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Arrendatarios</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Registrar</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
      <!-- término se container -->
    </div>
  </section>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.Rut.min.js" type="text/javascript"></script>
<script>
$("#Arrendatario_rut_arrendatario").Rut({
	on_error: function(){
		alert('El RUT ingresado es incorrecto.');
		$("#Arrendatario_rut_arrendatario").val('');
	},
})
$("#Arrendatario_rut_arrendatario").click(function(){
	$("#Arrendatario_rut_arrendatario").val('');
})
</script>
