<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Actualizar
	    <small>Selección de arrendatario a actualizar.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Arrendatario</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Selección</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Listado de arrendatarios</h3>
          </div>
					<div class="form">
						<div class="box-body">
              <?php $this->widget('zii.widgets.grid.CGridView', array(
              	'id'=>'arrendatario-grid',
                'itemsCssClass' => 'table table-hover',
                'htmlOptions' => array('class' => 'table-responsive'),
              	'dataProvider'=>$model->search(),
              	'filter'=>$model,
              	'columns'=>array(
                  array(
                    'header'=>'RUT',
                    'name'=>'rut_arrendatario',
                    'value' => '$data->rut_arrendatario',
                    'htmlOptions'=>array('style'=>'width:100px'),
                   ),
              		'nombres_arrendatario',
              		'apellidos_arrendatario',
                  'telefonofijo_arrendatario',
              		'telefonocelular_arrendatario',
              		'correo_arrendatario',
                  array(
                    'header'=>'Empresa',
                    'name'=>'empresa_arrendatario',
                    'value' => '$data->empresa_arrendatario?Yii::t(\'app\',\'Si\'):Yii::t(\'app\', \'No\')',
                    'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Si')),
                    'htmlOptions' => array('style' => "text-align:center;"),
                   ),
              		/*
                  'estadocivil_arrendatario',
              		'profesion_arrendatario',
              		'nrocuenta_arrendatario',
              		'banco_arrendatario',
              		'nacionalidad_arrendatario',
              		'empresa_arrendatario',
              		'activo_arrendatario',
              		*/
                  array(
                    'header'=>'Actualizar',
                    'class'=>'CButtonColumn',
                    'template'=>'{actualizar}',
                    'buttons'=>array(
                        'actualizar' => array(
                            'label'=>'<i class="fa fa-pencil-square-o"></i>',
                            'url'=>'Yii::app()->createUrl("arrendatario/update", array("id"=>$data->rut))',
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
