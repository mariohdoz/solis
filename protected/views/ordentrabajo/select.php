<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Configuración
	    <small>Texto aquí.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Orden de trabajo</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Historial de ordenes de trabajo</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Listado de ordenes de trabajo</h3>
          </div>
					<div class="form">
						<div class="box-body">
              <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'ordentrabajo-grid',
                'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
                'dataProvider'=>$model->search(),
                'filter'=>$model,
                'columns'=>array(
                  'id_ot',
                  'rut_admin',
                  'rut_funcionario',

                  'inicio_ot',
                  'fechaemision_ot',
                  'servicio_ot',
                  array(
                    'header'=>'Estado',
                    'name'=>'estado_ot',
                    'value' => '$data->estado_ot?Yii::t(\'app\',\'Terminado\'):Yii::t(\'app\', \'Pendiente\')',
                    'filter' => array('0' => Yii::t('app', 'Pendiente'), '1' => Yii::t('app', 'Terminado')),
                    'htmlOptions' => array('style' => "text-align:center;"),
                   ),
                  /*
                  'fechaejecucion_ot',
                  'descripcion_ot',
                  'observacion_ot',
                  'totalpagar_ot',
                  'formapago_ot',
                  */
                  array(
                    'header'=>'Actualizar',
                    'class'=>'CButtonColumn',
                    'template'=>'{actualizar} ',
                    'buttons'=>array(
                      'actualizar' => array(
                        'label'=>'<i class="btn btn-primary">Modificar &nbsp;<i class="fa fa-pencil"></i></i>',
                        'url'=>'Yii::app()->createUrl("ordentrabajo/update", array("id"=>$data->id_ot))'
                      ),
                    ),
                  ),
                ),
              )); ?>
					  </div>
            <div class="box-footer">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#arrendatario">Boton</button>
            </div>
				  </div>
			  </div>
      </div>
      <!-- término se container -->
    </div>
  </section>
</div>
