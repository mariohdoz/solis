<?php
/* @var $this ClienteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clientes',
);

$this->menu=array(
	array('label'=>'Create Cliente', 'url'=>array('create')),
	array('label'=>'Manage Cliente', 'url'=>array('admin')),
);
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Modificar
	    <small>Modificar un cliente.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Cliente</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Modificar</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Listado de clientes</h3>
          </div>
					<div class="form">
						<div class="box-body">
              <div class="form-group ">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                	'id'=>'cliente-grid',
									'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',

                	'dataProvider'=>$model->search(),
                	'filter'=>$model,
                	'columns'=>array(
                  array('name' => 'rut_cliente', 'htmlOptions'=>array('style'=>'width:100px')),
              		'nombres_cliente',
              		'apellidos_cliente',
                  'telefonocelular_cliente',
                  'correo_cliente',
              		/*
                  'estadocivil_cliente' ,
              		'profesion_cliente',
              		'domicilio_cliente',
              		'correo_cliente',
              		'telefonofijo_cliente',
              		'telefonocelular_cliente',
              		'nrocuenta_cliente',
              		'banco_cliente',
              		'tipocuenta_cliente',
              		'activo_cliente',
              		*/
									array(
                    'header'=>'Actualizar',
                    'class'=>'CButtonColumn',
                    'template'=>'{buscar}  {actualizar}  {eliminar}',
                    'buttons'=>array(
											'eliminar' => array(
													'label'=>'<i class="fa fa-trash-o"></i>',
													'url'=>'Yii::app()->createUrl("cliente/eliminar", array("id"=>$data->rut))',
											),
                      'actualizar' => array(
                          'label'=>'<i class="fa fa-pencil-square-o"></i>',
                          'url'=>'Yii::app()->createUrl("cliente/update", array("id"=>$data->rut))',
                      ),
											'buscar' => array(
													'label'=>'<i class="fa fa-eye"></i>',
													'url'=>'Yii::app()->createUrl("cliente/view", array("id"=>$data->rut))',
											),
                    ),
                  ),
              	),
              )); ?>
              </div>
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
