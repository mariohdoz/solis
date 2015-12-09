<script type="text/javascript">
  function obtenerSeleccion(){
    var selected = $('#arriendo-grid').yiiGridView('getSelection');
    var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/arriendo/test/'+selected;
    alert(selected);

  }
</script>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Actualizar
	    <small>Selección del arriendo que se desea Actualizar.</small>
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
            <h3 class="box-title">Selección de arriendo</h3>
          </div>
					<div class="form">
						<div class="box-body">
              <?php $this->widget('zii.widgets.grid.CGridView', array(
								'id'=>'arriendo-grid',
                'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
								'dataProvider'=>$model->historico(),
								'filter'=>$model,
								'columns'=>array(
									'id_propiedad',
									'rut_arrendatario',
									'fechapago_arriendo',
									'inicio_arriendo',
									'termino_arriendo',
									array(
	                  'header'=>'Valor de arriendo',
										'htmlOptions'=>array('width'=>'10'),
	                  'name'=>'valor_arriendo',
	                  'value'=>'Yii::app()->numberFormatter->format("¤#,##0", $data->valor_arriendo, "$ ")',
                  ),
									array(
										'header'=>'Estado',
										'name'=>'activo_arriendo',
										'value' => '$data->activo_arriendo?Yii::t(\'app\',\'Activo\'):Yii::t(\'app\', \'Terminado\')',
										'filter' => array('0' => Yii::t('app', 'Terminado'), '1' => Yii::t('app', 'Activo')),
										'htmlOptions' => array('style' => "text-align:center;"),
									 ),									/*
									'inscripcion_arriendo',
									'rut_admin',
									'valor_arriendo',
									*/
                  array(
                    'header'=>'Actualizar',
            				'class'=>'CButtonColumn',
            				'template'=>'{email}',
            				'buttons'=>array(
            				'email' => array(
            				'label'=>'<i class="btn btn-primary">Modificar &nbsp;<i class="fa fa-pencil"></i></i>',
            				'url'=>'Yii::app()->createUrl("arriendo/update", array("id"=>$data->id_arriendo))'
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
