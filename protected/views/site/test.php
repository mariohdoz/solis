<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Configuración
	    <small>Vista de arriendo de la propiedad de la ficha número .</small>
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
								'itemsCssClass' => 'table table-hover',
								'htmlOptions' => array('class' => 'table-responsive'),
								'dataProvider'=>$model->search2(),
								'filter'=>$model,
								'columns'=>array(
									'id_arriendo',
									'id_propiedad',
									'rut_admin',
									'rut_arrendatario',
									'inscripcion_arriendo',
									'fechapago_arriendo',
									/*
									'inicio_arriendo',
									'termino_arriendo',
									'valor_arriendo',
									*/
									array(
                    'class'=>'CButtonColumn',
                    'buttons'=>array(
                      'modificar' => array(
                          'label'=>'<i class="fa fa-trash-o "></i>',
                          'url'=>'Yii::app()->createUrl("arriendo/eliminar", array("id"=>$data->id_arriendo))',
                      ),
											'modificar' => array(
													'label'=>'<i class="fa fa-pencil-square-o"></i>',
													'url'=>'Yii::app()->createUrl("arriendo/update", array("id"=>$data->id_arriendo))',
											),
											'ver' => array(
                          'label'=>'<i class="fa fa-eye "></i>',
                          'url'=>'Yii::app()->createUrl("arriendo/view", array("id"=>$data->id_arriendo))',
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
