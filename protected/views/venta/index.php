<?php
/* @var $this VentaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ventas',
);

$this->menu=array(
	array('label'=>'Create Venta', 'url'=>array('create')),
	array('label'=>'Manage Venta', 'url'=>array('admin')),
);
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Listado de ventas
	    <small>Visualización de ventas realizadas.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Ventas</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Listado</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
      <div class="col-md-12 col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Listado de ventas</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<?php $this->widget('zii.widgets.grid.CGridView', array(
								'id'=>'venta-grid',
								'itemsCssClass' => 'table table-hover',
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
                    'class'=>'CButtonColumn',
                    'buttons'=>array(
                      'modificar' => array(
                          'label'=>'<i class="fa fa-trash-o "></i>',
                          'url'=>'Yii::app()->createUrl("venta/eliminar", array("id"=>$data->id_venta))',
                      ),
											'modificar' => array(
													'label'=>'<i class="fa fa-pencil-square-o"></i>',
													'url'=>'Yii::app()->createUrl("venta/update", array("id"=>$data->id_venta))',
											),
											'ver' => array(
                          'label'=>'<i class="fa fa-eye "></i>',
                          'url'=>'Yii::app()->createUrl("venta/view", array("id"=>$data->id_venta))',
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
