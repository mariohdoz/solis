<?php
/* @var $this ArriendoController */
/* @var $model Arriendo */

$this->breadcrumbs=array(
	'Arriendos'=>array('index'),
	$model->id_arriendo,
);

$this->menu=array(
	array('label'=>'List Arriendo', 'url'=>array('index')),
	array('label'=>'Create Arriendo', 'url'=>array('create')),
	array('label'=>'Update Arriendo', 'url'=>array('update', 'id'=>$model->id_arriendo)),
	array('label'=>'Delete Arriendo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_arriendo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Arriendo', 'url'=>array('admin')),
);
?>

<h1>View Arriendo #<?php echo $model->id_arriendo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_arriendo',
		'id_propiedad',
		'rut_admin',
		'rut_arrendatario',
		'inscripcion_arriendo',
		'fechapago_arriendo',
		'inicio_arriendo',
		'termino_arriendo',
		'valor_arriendo',
	),
)); ?>
