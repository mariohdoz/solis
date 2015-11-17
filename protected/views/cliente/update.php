<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->rut_cliente=>array('view','id'=>$model->rut_cliente),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cliente', 'url'=>array('index')),
	array('label'=>'Create Cliente', 'url'=>array('create')),
	array('label'=>'View Cliente', 'url'=>array('view', 'id'=>$model->rut_cliente)),
	array('label'=>'Manage Cliente', 'url'=>array('admin')),
);
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Actualizar
	    <small>Actualizar información del cliente <?php echo $model->rut_cliente ?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">algo</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">acción</li>
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
$('#Cliente_rut_cliente').ready(function(){
	$('#Cliente_rut_cliente').Rut({
    on_error: function(){
			alert('El RUT ingresado es incorrecto.');
		},
  });
});


</script>
