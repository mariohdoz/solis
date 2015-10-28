<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->rut_cliente,
);

$this->menu=array(
	array('label'=>'List Cliente', 'url'=>array('index')),
	array('label'=>'Create Cliente', 'url'=>array('create')),
	array('label'=>'Update Cliente', 'url'=>array('update', 'id'=>$model->rut_cliente)),
	array('label'=>'Delete Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rut_cliente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cliente', 'url'=>array('admin')),
);
?>

<div class="content-wrapper">
	<section class="content-header">
		<h1>Configuración<small>Registrar Propietario</small></h1>
		<ol class="breadcrumb">
			<li><a href="?r=intra/index"><i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Clientes</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Registrar Propietario</li>
		</ol>
	</section>
	<?php $this->renderPartial('_vista', array('model'=>$model)); ?>
</div>
