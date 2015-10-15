<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->rut_cliente,
);

$this->menu=array(
	array('label'=>'List Cliente', 'url'=>array('index')),
	array('label'=>'Create Cliente', 'url'=>array('create')),
	array('label'=>'Update Cliente', 'url'=>array('update', 'id'=>$model->rut_cliente)),
	array('label'=>'Delete Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rut_cliente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cliente', 'url'=>array('admin')),
);
?>

<div class="content-wrapper">
	<section class="content-header">
		<h1>Configuración<small>Registrar Propietario</small></h1>
		<ol class="breadcrumb">
			<li><a href="?r=intra/index"><i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Clientes</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Registrar Propietario</li>
		</ol>
	</section>
	<section class="content">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Registro de propietario</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<div class="col-md-6 ">
						<div class="form-group">
							<h3>Cliente <?php echo $model->rut_cliente; ?></h3>
							<?php $this->widget('zii.widgets.CDetailView', array(
										'data'=>$model,
										'attributes'=>array(
											'rut_cliente',
											array(
												'header'=>'Nombre completo',
												'name'=>'nombres_cliente',
												'value'=>$model->nombres_cliente.' '.$model->apellidos_cliente,
											),
											'profesion_cliente',
											'domicilio_cliente',
											'correo_cliente',
											'telefonofijo_cliente',
											'telefonocelular_cliente',
											'nrocuenta_cliente',
											'banco_cliente',
											'tipocuenta_cliente',
											array(
												'header'=>'Estado',
												'name'=>'activo_cliente',
												'value'=>$mdoel->activo_cliente1!=1?'Se encuentra activo':'Se encuentra desactivado',
											)
										),
									)
								);
						 	?>
						</div><!-- /.box-body -->
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<h3>Seleccionar Documentos</h3>
							<?php $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
									 'id' => 'uploadFile',
									 'config' => array(
											 'action' => Yii::app()->createUrl('propiedad/upload/',array('id'=>$model->rut_cliente)),
											 'allowedExtensions' => array("pdf","doc","gif","png",'jpg','jpeg','docx','xls','xlsx'), //array("jpg","jpeg","gif","exe","mov" and etc...
											 'sizeLimit' => 10 * 1024 * 1024, // maximum file size in bytes
											 'buttonText' => 'Selección',
											 //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
											 //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
											 'messages' => array(
													 'typeError' => "{file} posee una extención invalida. se acepta solamente {extensions}.",
													 'sizeError' => "{file} Es muy largo, el tamaño máximo permitido es de {sizeLimit}.",
													 'minSizeError' => "{file} Es muy pequeño, el tamaño mínimo permitido es de {minSizeLimit}.",
													 'emptyError' => "{file} está vacío, por favor selecciones otro archivo disntito.",
													 'onLeave' => "Los archivos seleccionados se están subiendo al servidor. si usted deja la página la carga será cancelada."
											 ),
											 'showMessage' => "js:function(message){ alert(message); }"
									 )
							 ));
							 ?>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<div class="pull-left">
						<div class="row buttons" style="margin-left: 10px ">
							<?php echo CHtml::submitButton('Guardar', array('class'=>'btn btn-success')); ?>
							&nbsp;&nbsp;
							<?php $this->widget('application.extensions.data.EBackButtonWidget'); ?>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.box -->
	</section>
</div>
