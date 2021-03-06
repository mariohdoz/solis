
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.formatCurrency-1.4.0.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/i18n/jquery.formatCurrency.es-CL.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.Rut.min.js" type="text/javascript"></script>

<script>

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
			$('#Venta_id_propiedad').val(propiedad.id_propiedad);
			$('#Propiedad_direccion_propiedad').val(propiedad.direccion_propiedad);
			$('#Propiedad_valor_propiedad').val(propiedad.valor_propiedad);
			$('#Propiedad_valor_propiedad').formatCurrency({region: 'es-CL'
        , roundToDecimalPlace: -1});
			ganancia();
			$('#Propiedad_rut_cliente').val(propiedad.rut_cliente);
			$( "#Propiedad_valor_propiedad" ).prop({
				disabled: true
			});
			$( "#Propiedad_direccion_propiedad" ).prop({
				disabled: true
			});
		});
	}).error(function(jqXHR, textStatus, errorThrown) {
		$("#respuesta").html(jqXHR.responseText);
	});
}
function ganancia(){
	var id_propiedad = $.fn.yiiGridView.getSelection('propiedad');
	var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/arriendo/obtenerpro/'+id_propiedad;
	$.getJSON(action, function(data) {
		// limpia la lista
		$('#respuesta').find("").each(function(){ $(this).remove(); });
		$.each(data, function(key, propiedad) {
			var a = $('#Venta_comisioncomprador_venta').val();
			var b = $('#Venta_comisioncliente_venta').val();
			var cont = propiedad.valor_propiedad * ((parseInt(a)+parseInt(b))/100);
			cont = Math.round(cont);
			$('#Venta_ganancia_venta').val(cont);
			$('#Venta_ganancia_venta').formatCurrency({region: 'es-CL'
				, roundToDecimalPlace: -1});
		});
	}).error(function(jqXHR, textStatus, errorThrown) {
		$("#respuesta").html(jqXHR.responseText);
	});
}
function aja()
{
	var a = $('#Venta_comisioncomprador_venta').val();
	var b = $('#Venta_comisioncliente_venta').val();
	var cont = $('#Propiedad_valor_propiedad').val() * ((parseInt(a)+parseInt(b))/100);
	cont = Math.round(cont);
	$('#Venta_ganancia_venta').val(cont);
	$('#Venta_ganancia_venta').formatCurrency({region: 'es-CL'
		, roundToDecimalPlace: -1});
}
$(document).ready(function() {
	$('#Propiedad_valor_propiedad').formatCurrency({region: 'es-CL'
		, roundToDecimalPlace: -1});
	$('#Venta_ganancia_venta').formatCurrency({region: 'es-CL'
		, roundToDecimalPlace: -1});
	$("#Venta_rutcomprador_venta").Rut({
		on_error: function(){
			alert('El RUT ingresado es incorrecto.');
			$('#Venta_rutcomprador_venta').val('');
		},
	});
	$("#Venta_rutcomprador_venta").click(function(){
		$("#Venta_rutcomprador_venta").val('');
	});
});

</script>
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
								'direccion_propiedad'
						// via 2: para mostrar detalles al hacer click en un icono.
							),
						));
						?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success center-block" data-dismiss="modal">Aceptar</button>
			</div>
		</div>
	</div>
</div>
<div class="content-wrapper">
	<section class="content-header">
    <h1>
	    Actualizar
	    <small>Actualizar venta.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Venta</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Actualizar</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
			<?php
			/* @var $this VentaController */
			/* @var $model Venta */
			/* @var $form CActiveForm */
			?>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'venta-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			)); ?>
			<div class="col-md-12">
				<?php echo $form->errorSummary($model,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>
			</div>
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Selección de la propiedad.</h3>
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
							<div class="col-xs-8">
								<div class="form-group">
									<?php echo $form->label($model3,'direccion_propiedad'); ?>
									<?php echo $form->textField($model3,'direccion_propiedad', array('class'=>'form-control', 'disabled'=>'true')); ?>
									<?php echo $form->error($model3,'direccion_propiedad'); ?>
								</div>
							</div>
							<div class="col-xs-4">
								<?php echo $form->label($model3,'valor_propiedad'); ?>
								<?php echo $form->textField($model3,'valor_propiedad', array('class'=>'form-control', 'disabled'=>'true', 'onchange'=>"applyFormatCurrency(document.getElementById('Propiedad_valor_propiedad'));"));?>
								<?php echo $form->error($model3,'valor_propiedad'); ?>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#propiedad">Cargar propiedad</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Datos de la venta</h3>
					</div>
					<div class="form">
						<div class="box-body">
							<div class="col-xs-3">
								<div class="form-group">
									<?php echo $form->labelEx($model,'rutcomprador_venta'); ?>
									<?php echo $form->textField($model,'rutcomprador_venta',array('class'=>'form-control', 'placeholder'=>'Ejemplo: 12345678-9')); ?>
								</div>
							</div>
							<div class="col-xs-3">
								<div class="form-group">
									<?php echo $form->labelEx($model,'comisioncliente_venta'); ?>
									<?php echo $form->dropDownList($model,'comisioncliente_venta',
											array(
													'1' => '1%',
													'2' => '2%',
													'3' => '3%',
													'4' => '4%',
											),
											array("class"=>"form-control select2", 'onchange'=>'aja()'),
											array('empty' => '(Seleccione la cantidad de baños)')); ?>

								</div>
							</div>
							<div class="col-xs-3">
								<div class="form-group">
									<?php echo $form->labelEx($model,'comisioncomprador_venta'); ?>
									<?php echo $form->dropDownList($model,'comisioncomprador_venta',
											array(
													'1' => '1%',
													'2' => '2%',
													'3' => '3%',
													'4' => '4%',
											),
											array("class"=>"form-control select2", 'onchange'=>'aja()'),
											array('empty' => '(Seleccione la cantidad de baños)')); ?>
								</div>
							</div>
							<div class="col-xs-3">
								<div class="form-group">
									<?php echo $form->labelEx($model,'ganancia_venta'); ?>
									<?php echo $form->textField($model,'ganancia_venta',array('class'=>'form-control')); ?>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<?php echo $form->labelEx($model,'nombrescomprador_venta'); ?>
									<?php echo $form->textField($model,'nombrescomprador_venta',array('class'=>'form-control', 'placeholder'=>'Ingrese los nombres del comprador.')); ?>

								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<?php echo $form->labelEx($model,'apellidoscomprador_venta'); ?>
									<?php echo $form->textField($model,'apellidoscomprador_venta',array('class'=>'form-control', 'placeholder'=>'Ingrese apellidos del comprador.')); ?>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar venta' : 'Actualizar venta', array('class'=>'btn btn-primary' , 'tabindex'=>5)); ?>
						</div>
					</div>
				</div>
			</div>
			<?php $this->endWidget(); ?>
    </div>
  </section>
</div>
