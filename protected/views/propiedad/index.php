<?php
/* @var $this PropiedadController */
/* @var $model Propiedad */

$this->breadcrumbs=array(
	'Propiedads'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Propiedad', 'url'=>array('index')),
	array('label'=>'Create Propiedad', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#propiedad-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Listado de propiedades
	    <small>Vista de todas las propiedades ingresadas.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Propiedades</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Listado</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
      <div class="col-lg-12 col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Lista de propiedades</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<?php $this->widget('zii.widgets.grid.CGridView', array(
								'id'=>'propiedad-grid',
								'dataProvider'=>$model->search(),
								'filter'=>$model,
								'columns'=>array(
									'id_propiedad',
              		'rut_cliente',
              		'direccion_propiedad',
              		'numero_propiedad',
              		'tipo_propiedad',
              		'comuna_propiedad',
                  'servicio_propiedad',
									array(
                    'header'=>'Estado',
                    'name'=>'estado_propiedad',
                    'value' => '$data->estado_propiedad?Yii::t(\'app\',\'Disponible\'):Yii::t(\'app\', \'Ocupado\')',
                    'filter' => array('0' => Yii::t('app', 'Ocupado'), '1' => Yii::t('app', 'Disponible')),
                    'htmlOptions' => array('style' => "text-align:center;"),
                   ),
									/*
									'terreno_propiedad',
									'construido_propiedad',
									'tipo_propiedad',
									'servicio_propiedad',
									'estado_propiedad',
									'descripcion_propiedad',
									'comuna_propiedad',
									'amoblado_propiedad',
									'valor_propiedad',
									'activo_propiedad',
									'eliminado_propiedad',
									*/
									array(
										'header'=>'Acciones',
										'class'=>'CButtonColumn',
									),
								),
							)); ?>

					  </div>
            <div class="box-footer">
            </div>
				  </div>
			  </div>
      </div>
      <!-- término se container -->
    </div>
  </section>
</div>
