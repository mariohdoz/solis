<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */

$this->breadcrumbs=array(
	'Solicituds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Solicitud', 'url'=>array('index')),
	array('label'=>'Manage Solicitud', 'url'=>array('admin')),
);
?>
	<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Solicitud
			<small>Crear solicitud.</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
					<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Administración</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Solicitud</a></li>
			<li class="active">Nueva</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<!-- Inicio se container -->
			<?php $this->renderPartial('_form', array('solicitud'=>$solicitud)); ?>
		</div>
	</section>
	</div>

