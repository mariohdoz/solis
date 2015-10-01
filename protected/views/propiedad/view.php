<?php
/* @var $this PropiedadController */
/* @var $model Propiedad */

$this->breadcrumbs=array(
	'Propiedads'=>array('index'),
	$model->IDPROP,
);

$this->menu=array(
	array('label'=>'List Propiedad', 'url'=>array('index')),
	array('label'=>'Create Propiedad', 'url'=>array('create')),
	array('label'=>'Update Propiedad', 'url'=>array('update', 'id'=>$model->IDPROP)),
	array('label'=>'Delete Propiedad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDPROP),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Propiedad', 'url'=>array('admin')),
);
?>

<h1>View Propiedad #<?php echo $model->IDPROP; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IDPROP',
		'RUTCLIENTE',
		'DIRECCION',
		'CANTPIEZA',
		'CANTBANO',
		'TERRENO',
		'TERRENOCONSTRUIDO',
		'TIPO',
		'SERVICIO',
		'ESTADO',
		'DESCRIPCION',
		'COMUNAPROPIEDAD',
	),
)); ?>
