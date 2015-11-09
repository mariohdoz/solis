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
		var str = rut_arrendatario+"";
    var res = str.split("-");
		var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/arriendo/obtener/'+res[0];
		// http://api.jquery.com/category/ajax/shorthand-methods/
		// http://api.jquery.com/jQuery.getJSON/
		$.getJSON(action, function(data) {
				// limpia la lista
				$('#respuesta').find("").each(function(){ $(this).remove(); });
				$.each(data, function(key, Arrendatario) {
					$( "Arrendatario_nombres_arrendatario" ).prop({
					  disabled: false
					});
					$( "Arrendatario_apellidos_arrendatario" ).prop({
					  disabled: false
					});
					$('#Arriendo_rut_arrendatario').val(Arrendatario.rut_arrendatario);
					$('#Arrendatario_nombres_arrendatario').val(Arrendatario.nombres_arrendatario);
					$('#Arrendatario_apellidos_arrendatario').val(Arrendatario.apellidos_arrendatario);
					$( "#Arrendatario_nombres_arrendatario" ).prop({
					  disabled: true
					});
					$( "#Arrendatario_apellidos_arrendatario" ).prop({
					  disabled: true
					});
					$('#respuesta').append("<li>"+Arrendatario.rut_arrendatario+", "+Arrendatario.nombres_arrendatario+", "+Arrendatario.apellidos_arrendatario+"</li>");
			  	}
				);
			}
		).error(function(jqXHR, textStatus, errorThrown) {
			$("#respuesta").html(jqXHR.responseText);
		});
	}
	function obtenerPropiedad(){
		// no olvides configurar tu CActiveDataProvider con: 'keyAttribute'=>'idcategoria',
		var id_propiedad = $.fn.yiiGridView.getSelection('propiedad');
		var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/arriendo/obtenerpro/'+id_propiedad;
		// http://api.jquery.com/category/ajax/shorthand-methods/
		// http://api.jquery.com/jQuery.getJSON/
		$.getJSON(action, function(data) {
				// limpia la lista
				$('#respuesta').find("").each(function(){ $(this).remove(); });
				$.each(data, function(key, propiedad) {
					$( "Propiedad_direccion_propiedad" ).prop({
						disabled: false
					});
					$( "Propiedad_valor_propiedad" ).prop({
						disabled: false
					});
					$( "Propiedad_rut_cliente" ).prop({
						disabled: false
					});
					$('#Arriendo_id_propiedad').val(propiedad.id_propiedad);
					$('#Propiedad_direccion_propiedad').val(propiedad.direccion_propiedad);
					$('#Propiedad_valor_propiedad').val(propiedad.valor_propiedad);
					$('#Propiedad_rut_cliente').val(propiedad.rut_cliente);
					$( "#Propiedad_valor_propiedad" ).prop({
						disabled: true
					});
					$( "#Propiedad_direccion_propiedad" ).prop({
						disabled: true
					});
					}
				);
			}
		).error(function(jqXHR, textStatus, errorThrown) {
			$("#respuesta").html(jqXHR.responseText);
		});
	}
</script>
<div class="modal fade modal-Default" id="arrendatario" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 style="text-align: center">Seleccionar arrendatario</h3>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<?php
						$this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'arrendatario',
							'selectableRows'=>1,
							'selectionChanged'=>'obtenerSeleccion',	// via 1: para mostrar detalles al seleccionar
							'dataProvider'=>$dataProvider,
							'filter' => $model2,
							'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css'),
							'summaryText' => 'Se encontraron {count} arrendatarios activos',
							'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
							'columns'=>array(
						// nota que con htmlOptions se puede personalizar el tamano de la columna
								array('name'=>'rut_arrendatario','htmlOptions'=>array('width'=>'80px')),
						// nota que aqui no se usa array, sino directamente el nombre de la columna
								'nombres_arrendatario',
						// via 2: para mostrar detalles al hacer click en un icono.
								array(
										'header' => '(fake) Actions',
										'class' => 'CButtonColumn',
										'viewButtonImageUrl' => Yii::app()->baseUrl . '/css/gridViewStyle/images/' . 'gr-view.png',
										'updateButtonImageUrl' => Yii::app()->baseUrl . '/css/gridViewStyle/images/' . 'gr-update.png',
										'deleteButtonImageUrl' => Yii::app()->baseUrl . '/css/gridViewStyle/images/' . 'gr-delete.png',
								),
							),
						));
						?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade modal-default" id="propiedad" tabindex="-2" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 style="text-align: center">Seleccionar propiedad</h3>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<?php
						$this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'propiedad',
							'selectableRows'=>1,
							'selectionChanged'=>'obtenerPropiedad',	// via 1: para mostrar detalles al seleccionar
							'dataProvider'=>$dataProvider2,
							'filter' => $model3,
							'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css'),
							'summaryText' => 'Se encontraron {count} arrendatarios activos',
							'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
							'columns'=>array(
						// nota que con htmlOptions se puede personalizar el tamano de la columna
								array('name'=>'id_propiedad','htmlOptions'=>array('width'=>'80px')),
						// nota que aqui no se usa array, sino directamente el nombre de la columna
								'direccion_propiedad',
								'numero_propiedad',
						// via 2: para mostrar detalles al hacer click en un icono.
							),
						));
						?>
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
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'arriendo-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>false,
		)); ?>
		<div class="row">
			<?php if(($msgs=Yii::app()->user->getFlashes())!=null): ?>
				<?php foreach($msgs as $type => $message):?>
					<div class="alert alert-<?php echo $type;?>" style="margin-left: 10px; margin-right: 10px ">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Error</strong> <?php echo $message;?>
					</div>
				<?php endforeach;?>
			<?php endif; ?>
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Selección del arrendatario</h3>
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
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Selección de la propiedad</h3>
          </div><!-- /.box-header -->
					<div class="form">
						<div class="box-body">
							<div class="col-xs-6">
								<div class="form-group">
									<?php echo $form->labelEx($model,'id_propiedad'); ?>
									<?php echo $form->textField($model,'id_propiedad',array('class'=>'form-control', 'placeholder'=>'Ingrese el número de ficha de la propiedad o seleccione una.')); ?>
									<?php echo $form->error($model,'id_propiedad'); ?>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<?php echo $form->labelEx($model3,'rut_cliente'); ?>
									<?php echo $form->textField($model3,'rut_cliente',array('class'=>'form-control','disabled'=>'true', 'placeholder'=>'RUT del propietario.')); ?>
									<?php echo $form->error($model3,'rut_cliente'); ?>
								</div>
							</div>
							<div class="col-xs-9">
								<div class="form-group">
									<?php echo $form->label($model3,'direccion_propiedad'); ?>
									<?php echo $form->textField($model3,'direccion_propiedad', array('class'=>'form-control', 'disabled'=>'true')); ?>
									<?php echo $form->error($model3,'direccion_propiedad'); ?>
								</div>
							</div>
							<div class="col-xs-3">
								<?php echo $form->label($model3,'valor_propiedad'); ?>
								<?php echo $form->textField($model3,'valor_propiedad', array('class'=>'form-control', 'disabled'=>'true')); ?>
								<?php echo $form->error($model3,'valor_propiedad'); ?>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#propiedad">Cargar propiedad</button>
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
											<?php echo $form->dateField($model,'fechapago_arriendo', array('class'=>'form-control', 'tabindex'=>1)); ?>
										</div>
										<div class="form-group">
											<?php echo $form->labelEx($model,'inicio_arriendo'); ?>
											<?php echo $form->dateField($model,'inicio_arriendo', array('class'=>'form-control', 'tabindex'=>3)); ?>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<?php echo $form->labelEx($model,'termino_arriendo'); ?>
											<?php echo $form->dateField($model,'termino_arriendo', array('class'=>'form-control', 'tabindex'=>2)); ?>
										</div>
										<div class="form-group">
											<?php echo $form->labelEx($model,'valor_arriendo'); ?>
											<?php echo $form->textField($model,'valor_arriendo', array('class'=>'form-control', 'placeholder'=>'Ingresar valor pactado con el arrendatario Ej: "500000".', 'tabindex'=>4)); ?>
										</div>
									</div>
								</div><!-- form -->
							</div>
							<!-- código acá -->
						</div>
						<div class="box-footer">
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear arriendo' : 'Actualizar arriendo', array('class'=>'btn btn-primary' , 'tabindex'=>5)); ?>
            </div>
						<?php $this->endWidget(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
