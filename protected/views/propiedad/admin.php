
<h1>Manage Propiedads</h1>

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
	'id'=>'propiedad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_propiedad',
		'rut_cliente',
		'direccion_propiedad',
		'numero_propiedad',
		'habitacion_propiedad',
		'bano_propiedad',
		/*
		'terreno_propiedad',
		'construido_propiedad',
		'tipo_propiedad',
		'servicio_propiedad',
		'descripcion_propiedad',
		'comuna_propiedad',
		'amoblado_propiedad',
		'valor_propiedad',
		'activo_propiedad',
		'eliminado_propiedad',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
