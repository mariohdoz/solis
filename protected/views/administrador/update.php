<?php
/* @var $this AdministradorController */
/* @var $model Administrador */

$this->breadcrumbs=array(
	'Administradors'=>array('index'),
	$model->rut_admin=>array('view','id'=>$model->rut_admin),
	'Update',
);

$this->menu=array(
	array('label'=>'List Administrador', 'url'=>array('index')),
	array('label'=>'Create Administrador', 'url'=>array('create')),
	array('label'=>'View Administrador', 'url'=>array('view', 'id'=>$model->rut_admin)),
	array('label'=>'Manage Administrador', 'url'=>array('admin')),
);
?>

<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Actualizar
			<small>Actualizar el arrendatario <?php echo CHtml::encode($model->rut_admin); ?>.</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
					<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Administrador</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Actualizar</li>
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