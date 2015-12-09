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
                    'header'=>'Actualizar',
                      'class'=>'CButtonColumn',
                      'template'=>'{email}',
                      'buttons'=>array(
                          'email' => array(
                              'label'=>'<i class="btn btn-google-plus">Eliminar &nbsp;<i class="fa fa-trash-o"></i></i>',
                              'url'=>'Yii::app()->createUrl("ordentrabajo/eliminar", array("id"=>$data->id_ot))'
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
