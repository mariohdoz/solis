<?php
/* @var $this FuncionarioController */
/* @var $model Funcionario */

$this->breadcrumbs=array(
	'Funcionarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Funcionario', 'url'=>array('index')),
	array('label'=>'Manage Funcionario', 'url'=>array('admin')),
);
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Registro
	    <small>Registrar un nuevo funcionario.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Funcionario</li>
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
$("#Funcionario_rut_funcionario").Rut({
	on_error: function(){
		alert('El RUT ingresado es incorrecto.');
		$("#Funcionario_rut_funcionario").val('');
	},
})
$("#Funcionario_rut_funcionario").click(function(){
	$("#Funcionario_rut_funcionario").val('');
})
</script>
