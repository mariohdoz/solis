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
              <?php
              $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'arriendo-grid',
                'dataProvider'=>$model->search(),
                'selectableRows'=>1,
                //'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('arriendo/test').'/"+$.fn.yiiGridView.getSelection(id);}',	// via 1: para mostrar detalles al seleccionar
                'filter'=>$model,
                'columns'=>array(
                  'fechapago_arriendo',
                  'id_propiedad',
                  'rut_admin',
                  'rut_arrendatario',
                  'valor_arriendo',
                  'termino_arriendo',
                  /*
                  'inicio_arriendo',
                  'termino_arriendo',
                  'valor_arriendo',
                  */
                  array(
                    'class'=>'CButtonColumn',
                    'template'=>'{email}',
                    'buttons'=>array(
                        'email' => array(
                            'label'=>'<i class="fa fa-pencil-square-o"></i>',
                            'url'=>'Yii::app()->createUrl("arriendo/update", array("id"=>$data->id_arriendo))',
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
    </div>
  </section>
</div>
