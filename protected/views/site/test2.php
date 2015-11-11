<?php
/* @var $this ArriendoController */
/* @var $model Arriendo */

$this->breadcrumbs=array(
	'Arriendos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Arriendo', 'url'=>array('index')),
	array('label'=>'Manage Arriendo', 'url'=>array('admin')),
);
?>
<script>
	/*
		MUY IMPORTANTE:
		Tu CActiveDataProvider debe proveer esta configuracion:
			'keyAttribute'=>'idcategoria',
		para que  var idcategoria = $.fn.yiiGridView.getSelection('categorias');
		devuelva un valor de seleccion.
	*/
	function obtenerSeleccion(){
		// no olvides configurar tu CActiveDataProvider con: 'keyAttribute'=>'idcategoria',
		var rut_arrendatario = $.fn.yiiGridView.getSelection('arrendatario');
		var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/site/obtener/'+rut_arrendatario;
		alert(action);
		// http://api.jquery.com/category/ajax/shorthand-methods/
		// http://api.jquery.com/jQuery.getJSON/
		$.getJSON(action, function(data) {
			// limpia la lista
			$('#respuesta').find("li").each(function(){ $(this).remove(); });

			  $.each(data, function(key, prod) {
				$('#respuesta').append("<li>"+rut_arrendatario+", "+nombres_arrendatario+", "+apellidos_arrendatario+"</li>");
			  });
		}).error(function(jqXHR, textStatus, errorThrown) {
			$("#respuesta").html(jqXHR.responseText);
		});
	}
</script>
<div class="modal fade modal-primary" id="arrendatario" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 style="text-align: center">Seleccionar arrendatario</h3>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">

				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade modal-primary" id="propiedad" tabindex="-2" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 style="text-align: center">Seleccionar propiedad</h3>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">

				</div>
			</div>
		</div>
	</div>
</div>

<div class="content-wrapper">
	<section class="content-header">
	  <h1>
	    Configuración
	    <small>Ingresar nuevo arriendo.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Clientes</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Registrar Propietario</li>
	  </ol>
	</section>
	<section class="content">

		<div class="row">
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Selección del arrendatario</h3>
          </div><!-- /.box-header -->
					<div class="form">
						<div class="box-body">
							<?php
								$this->widget('zii.widgets.grid.CGridView', array(
									'id'=>'arrendatario',
									'selectableRows'=>1,
									'selectionChanged'=>'obtenerSeleccion',	// via 1: para mostrar detalles al seleccionar
							    'dataProvider'=>$dataProvider,
							    'columns'=>array(
								// nota que con htmlOptions se puede personalizar el tamano de la columna
						        array('name'=>'rut_arrendatario','htmlOptions'=>array('width'=>'80px')),
								// nota que aqui no se usa array, sino directamente el nombre de la columna
						        'nombres_arrendatario',
								// via 2: para mostrar detalles al hacer click en un icono.
						        array(
					            'class'=>'CButtonColumn',
											'template' => '{detallarproducto}',
											'buttons' => array(
												'detallarproducto'=>array(
													'label'=>'ver productos',
													'imageUrl'=>'images/demo1/view.png',
													'click'=>'js:obtenerSeleccion',
												),
											),
						        ),
							    ),
								));
								?>
						</div>
						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'arriendo-form',
							// Please note: When you enable ajax validation, make sure the corresponding
							// controller action is handling ajax validation correctly.
							// There is a call to performAjaxValidation() commented in generated controller code.
							// See class documentation of CActiveForm for details on this.
							'enableAjaxValidation'=>false,
						)); ?>
						<div class="box-footer">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#arrendatario">Cargar arrendatario</button>
            </div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Selección de la propiedad</h3>
          </div><!-- /.box-header -->
					<div class="form">
						<div class="box-body">
							<div class="col-xs-12">
								<div class="form-group">
									<?php echo $form->labelEx($model,'rut_arrendatario'); ?>
									<?php echo $form->textField($model,'rut_arrendatario',array('size'=>10,'maxlength'=>10, 'class'=>'form-control', 'placeholder'=>'Ingrese el RUT del arrendatario o seleccione uno.')); ?>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<?php echo $form->label($model2,'nombres_arrendatario'); ?>
									<?php echo $form->textField($model2,'nombres_arrendatario', array('class'=>'form-control', 'disabled'=>'true')); ?>
									<?php echo $form->error($model2,'nombres_arrendatario'); ?>
								</div>
							</div>
							<div class="col-xs-6">
								<?php echo $form->label($model2,'apellidos_arrendatario'); ?>
								<?php echo $form->textField($model2,'apellidos_arrendatario', array('class'=>'form-control', 'disabled'=>'true')); ?>
								<?php echo $form->error($model2,'apellidos_arrendatario'); ?>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#arrendatario">Cargar arrendatario</button>
            </div>
					</div>
				</div>
			</div>
			<!--Salto de linea-->
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos del arriendo</h3>
          </div><!-- /.box-header -->
					<div class="form">

						<div class="box-body">
							<div class="form-group">
								<?php
								/* @var $this ArriendoController */
								/* @var $model Arriendo */
								/* @var $form CActiveForm */
								?>

								<div class="form">
									<?php echo $form->errorSummary($model,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>
									<div class="col-md-6">

										<div class="form-group">
											<?php echo $form->labelEx($model,'fechapago_arriendo'); ?>
											<?php echo $form->dateField($model,'fechapago_arriendo', array('class'=>'form-control')); ?>
										</div>

										<div class="form-group">
											<?php echo $form->labelEx($model,'inicio_arriendo'); ?>
											<?php echo $form->dateField($model,'inicio_arriendo', array('class'=>'form-control')); ?>
										</div>
									</div>
									<div class="col-md-6">

										<div class="form-group">
											<?php echo $form->labelEx($model,'termino_arriendo'); ?>
											<?php echo $form->dateField($model,'termino_arriendo', array('class'=>'form-control')); ?>
										</div>

										<div class="form-group">
											<?php echo $form->labelEx($model,'valor_arriendo'); ?>
											<?php echo $form->textField($model,'valor_arriendo', array('class'=>'form-control', 'placeholder'=>'Ingresar valor pactado con el arrendatario Ej: "500000".')); ?>
										</div>
									</div>
								</div><!-- form -->
							</div>
							<!-- código acá -->
						</div>
						<div class="box-footer">
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear arriendo' : 'Actualizar arriendo', array('class'=>'btn btn-primary')); ?>
            </div>
						<?php $this->endWidget(); ?>
					</div>
				</div>
			</div>

		</div>
	</section>
</div>

<p>
	Aqui deberia aparecer la respuesta:
	<ul id='respuesta'></ul>
</p>
