<script type="text/javascript">
  function obtenerSeleccion(){
    var selected = $('#venta-grid').yiiGridView('getSelection');
    var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/venta/test/'+selected;
    alert(selected);

  }
</script>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Actualizar
	    <small>Selección de la venta que se desea Actualizar.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Clientes</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Registrar Propietario</li>
	  </ol>
  </section>
  <section class='content'>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Selección de venta</h3>
          </div>
					<div class="form">
						<div class="box-body">
              <?php $this->widget('zii.widgets.grid.CGridView', array(
              	'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',

                'htmlOptions' => array('class' => 'table-responsive'),
              	'dataProvider'=>$model->search(),
              	'filter'=>$model,
              	'columns'=>array(
              		'id_venta',
              		'id_propiedad',
              		'rut_admin',
              		'nombrescomprador_venta',
              		'apellidoscomprador_venta',
              		'rutcomprador_venta',
              		/*
              		'comisioncomprador_venta',
              		'comisioncliente_venta',
              		'ganancia_venta',
              		*/
                  array(
                    'header'=>'Actualizar',
                    'class'=>'CButtonColumn',
                    'template'=>'{actualizar}',
                    'buttons'=>array(
                        'actualizar' => array(
                          'label'=>'<i class="btn btn-primary">Modificar &nbsp;<i class="fa fa-pencil"></i></i>',
                            'url'=>'Yii::app()->createUrl("venta/update", array("id"=>$data->id_venta))',
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
