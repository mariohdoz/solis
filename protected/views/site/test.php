<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Configuración
	    <small>Texto aquí.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Solicitud</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Listado de solicitudes</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Listado de solicitudes de externos</h3>
          </div>
					<div class="form">
						<div class="box-body">

					  </div>
            <div class="box-footer">
            </div>
				  </div>
			  </div>
      </div>
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Listado de solicitudes de externos</h3>
          </div>
					<div class="form">
						<div class="box-body">
              <?php $this->widget('zii.widgets.grid.CGridView', array(
								'id'=>'propiedad-grid',
								'itemsCssClass' => 'table table-hover',
								'htmlOptions' => array('class' => 'table-responsive'),
								'dataProvider'=>$model3->Disponible(),
								'filter'=>$model3,
								'columns'=>array(
									'id_propiedad',
              		'rut_cliente',
              		'direccion_propiedad',
              		'tipo_propiedad',
              		'comuna_propiedad',
                  'servicio_propiedad',
									array(
                    'header'=>'Estado',
                    'name'=>'activo_propiedad',
                    'value' => '$data->activo_propiedad?Yii::t(\'app\',\'Disponible\'):Yii::t(\'app\', \'Ocupado\')',
                    'filter' => array('0' => Yii::t('app', 'Ocupado'), '1' => Yii::t('app', 'Disponible')),
                    'htmlOptions' => array('style' => "text-align:center;"),
                   ),
									/*
									'terreno_propiedad',
									'construido_propiedad',
									'tipo_propiedad',
									'servicio_propiedad',
									'activo_propiedad',
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
                    'template'=>'{buscar}  {actualizar}  {eliminar}',
                    'buttons'=>array(
											'eliminar' => array(
													'label'=>'<i class="fa fa-trash-o"></i>',
													'url'=>'Yii::app()->createUrl("propiedad/eliminar", array("id"=>$data->id_propiedad))',
											),
                      'actualizar' => array(
                          'label'=>'<i class="fa fa-pencil-square-o"></i>',
                          'url'=>'Yii::app()->createUrl("propiedad/update", array("id"=>$data->id_propiedad))',
                      ),
											'buscar' => array(
													'label'=>'<i class="fa fa-eye"></i>',
													'url'=>'Yii::app()->createUrl("propiedad/view", array("id"=>$data->id_propiedad))',
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

      <!-- término se container -->
    </div>
  </section>
</div>
