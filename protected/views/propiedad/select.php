<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Actualizar
	    <small>Selección de la propiedad que se desea Actualizar.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">propiedad</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Actualizar</li>
	  </ol>
  </section>
  <section class='content'>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Seleccion de propiedad</h3>
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
                    'header'=>'Actualizar',
                    'class'=>'CButtonColumn',
                    'template'=>'{email}',
                    'buttons'=>array(
                        'email' => array(
                            'label'=>'<i class="fa fa-pencil-square-o"></i>',
                            'url'=>'Yii::app()->createUrl("propiedad/update", array("id"=>$data->id_propiedad))',
                        ),
                    ),
                  ),
              	),
              )); ?>
						</div>
						<div class="box-footer">
						</div>
					</div>
				</div>
      </div>
    </div>
  </section>
</div>
