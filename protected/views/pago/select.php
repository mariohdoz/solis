<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Registrar pago
	    <small>Seleccionar arriendo para realizar pago.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Pago</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Seleccion de arriendo</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Listado de arriedos</h3>
          </div>
					<div class="form">
						<div class="box-body">
              <?php
              $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'arriendo-grid',
                'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
                'dataProvider'=>$model->Busqueda(),
                'selectableRows'=>1,
                'filter'=>$model,
                'columns'=>array(
                  'fechapago_arriendo',
                  'id_propiedad',
                  'rut_arrendatario',
                  array(
	                  'header'=>'Valor de arriendo',
										'htmlOptions'=>array('width'=>'10'),
	                  'name'=>'valor_arriendo',
	                  'value'=>'Yii::app()->numberFormatter->format("¤#,##0", $data->valor_arriendo, "$ ")',
                  ),
                  'inicio_arriendo',
                  'termino_arriendo',
                  /*
                  'rut_admin',
                  'termino_arriendo',
                  'valor_arriendo',
                  */
                  array(
                    'header'=>'Pagos',
                    'class'=>'CButtonColumn',
                    'template'=>'{actualizar}',
                    'buttons'=>array(
                        'actualizar' => array(
                          'label'=>'<i class="btn btn-google-plus">Pagos &nbsp;<i class="fa fa-money"></i></i>',
                          'url'=>'Yii::app()->createUrl("pago/listado", array("id"=>$data->id_arriendo))',
                        ),
                    ),
                  ),
                ),
              ));
               ?>
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
