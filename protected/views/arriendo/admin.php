<?php
/* @var $this ArriendoController */
/* @var $model Arriendo */

$this->breadcrumbs=array(
	'Arriendos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Arriendo', 'url'=>array('index')),
	array('label'=>'Create Arriendo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#arriendo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Arriendos</h1>

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
	'id'=>'arriendo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_arriendo',
		'id_propiedad',
		'rut_admin',
		'rut_arrendatario',
		'inscripcion_arriendo',
		'fechapago_arriendo',
		/*
		'inicio_arriendo',
		'termino_arriendo',
		'valor_arriendo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
