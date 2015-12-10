<?php
/* @var $this OrdentrabajoController */
/* @var $model Ordentrabajo */

$this->breadcrumbs=array(
	'Ordentrabajos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Ordentrabajo', 'url'=>array('index')),
	array('label'=>'Create Ordentrabajo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ordentrabajo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ordentrabajos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ordentrabajo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_ot',
		'rut_admin',
		'rut_funcionario',
		'descripcion_ot',
		'fechaemision_ot',
		'fechaejecucion_ot',
		'estado_ot',
		/*
		'inicio_ot',
		'servicio_ot',
		'observacion_ot',
		'totalpagar_ot',
		'formapago_ot',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
