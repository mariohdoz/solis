<?php
/* @var $this PropiedadController */
/* @var $model Propiedad */

$this->breadcrumbs=array(
	'Propiedads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Propiedad', 'url'=>array('index')),
	array('label'=>'Manage Propiedad', 'url'=>array('admin')),
);
?>
<script>
	function obtenerCliente(){
		var rut = $.fn.yiiGridView.getSelection('cliente');
		var str = rut+"";
		var res = str.split("-");
		var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/propiedad/obtener/'+res[0];
		$.getJSON(action, function(data) {
			$.each(data, function(key, cliente) {
				$('#Propiedad_rut_cliente').val(cliente.rut_cliente);
				$('#Cliente_correo_cliente').val(cliente.correo_cliente);
				$('#Cliente_nombres_cliente').val(cliente.nombres_cliente);
				$('#Cliente_apellidos_cliente').val(cliente.apellidos_cliente);
			});
		}).error(function(jqXHR, textStatus, errorThrown) {
			$("#respuesta").html(jqXHR.responseText);
		});
	}
</script>
<div class="modal fade modal-default" id="cliente" tabindex="-2" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 style="text-align: center">Seleccionar Cliente</h3>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<?php
						$this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'cliente',
							'itemsCssClass' => 'table table-hover',
							'htmlOptions' => array('class' => 'table-responsive'),
							'selectableRows'=>1,
							'selectionChanged'=>'obtenerCliente',	// via 1: para mostrar detalles al seleccionar
							'dataProvider'=>$model2->search(),
							'filter' => $model2,
							'summaryText' => 'Se encontraron {count} Clientes activos',
							'columns'=>array(
						// nota que con htmlOptions se puede personalizar el tamano de la columna
								array('name'=>'rut_cliente','htmlOptions'=>array('width'=>'90px')),
						// nota que aqui no se usa array, sino directamente el nombre de la columna
								'nombres_cliente',
								'apellidos_cliente',
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
      Configuración
      <small>Registrar propiedad </small>
	  </h1>
	  <ol class="breadcrumb">
      <li><i class="fa fa-dashboard">&nbsp;</i><?php echo CHtml::link('Inicio', array('intra/index')) ?></li>
      <li class="active"><?php echo CHtml::link('Propiedades', array('/propiedad/ver')) ?></li>
      <li class="active">Registrar propiedad</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
			<div class="col-md-12">
				<?php if(($msgs=Yii::app()->user->getFlashes())!=null): ?>
         <?php foreach($msgs as $type => $message):?>
           <div class="alert alert-<?php echo $type;?>" style="margin-left: 10px; margin-right: 10px ">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong><?php
							 if($type == 'danger'){
								 echo 'Error';
							 }elseif ($type == 'success'){
								 echo 'Éxito';
							 };
							?> !</strong> <?php echo $message;?>.
           </div>
         <?php endforeach;?>
       <?php endif; ?>
			</div>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'propiedad-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			)); ?>
      <!-- Inicio se container -->
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Selección del propietario.</h3>
					</div><!-- /.box-header -->
					<div class="form">
						<div class="box-body">
							<div class="col-xs-12 col-md-6 col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model,'rut_cliente'); ?>
									<?php echo $form->textField($model,'rut_cliente',array('class'=>'form-control', 'placeholder'=>'RUT del propietario.')); ?>
									<?php echo $form->error($model,'rut_cliente'); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model2,'correo_cliente'); ?>
									<?php echo $form->textField($model2,'correo_cliente',array('class'=>'form-control','disabled'=>'true', 'placeholder'=>'Correo del propietario.')); ?>
									<?php echo $form->error($model2,'correo_cliente'); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-6">
								<div class="form-group">
									<?php echo $form->label($model2,'nombres_cliente'); ?>
									<?php echo $form->textField($model2,'nombres_cliente', array('class'=>'form-control', 'disabled'=>'true', 'placeholder'=>'Nombres del propietario.')); ?>
									<?php echo $form->error($model2,'nombres_cliente'); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-6">
								<?php echo $form->label($model2,'apellidos_cliente'); ?>
								<?php echo $form->textField($model2,'apellidos_cliente', array('class'=>'form-control', 'disabled'=>'true','placeholder'=>'Apellidos del propietario.'));?>
								<?php echo $form->error($model2,'apellidos_cliente'); ?>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#cliente"><i class="fa fa-spinner"> &nbsp;&nbsp;Cargar cliente</i></button>
							<?php echo CHtml::link('<i class="fa fa-plus"></i> &nbsp;&nbsp;Nuevo Cliente ', array('cliente/create'), array('class'=>'btn btn-success')); ?>
						</div>
					</div>
				</div>
			</div>
      <!-- término se container -->
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Datos de la propiedad.</h3>
					</div><!-- /.box-header -->
					<div class="form">
						<div class="box-body">
							<?php echo $form->errorSummary($model,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>
							<div class="col-xs-12 col-md-6 col-lg-6">
								<div class="form-group">


									<?php echo $form->labelEx($model,'servicio_propiedad'); ?>
                  <?php echo $form->dropDownList($model,'servicio_propiedad',
                      array(
                          'Venta' => 'Venta',
                          'Arriendo' => 'Arriendo',
                      ),
                      array("class"=>"form-control select2", 'empty' => 'Seleccione tipo de servicio')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model,'tipo_propiedad'); ?>
                  <?php echo $form->dropDownList($model,'tipo_propiedad',
                      array(
                          'Casa' => 'Casa',
                          'Departamento Habitación' => 'Departamento Habitación',
                          'Local' => 'Local',
                          'Oficina Casa' => 'Oficina Casa',
                          'Galpón' => 'Galpón',
                          'Oficina Departamento' => 'Oficina Departamento',
                          'Sitio Comercial' => 'Sitio Comercial',
                          'Sitio Recidencial' => 'Sitio Recidencial',
                          'Propiedad de inversión' => 'Propiedad de inversión',
                          'Terreno' => 'Terreno'
                      ),
                      array("class"=>"form-control select2", 'empty' => 'Seleccione el tipo de propiedad')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model,'comuna_propiedad'); ?>
                  <?php echo $form->dropDownList($model,'comuna_propiedad',
                      array(
                          'Antofagasta' => 'Antofagasta',
                          'Calama' => 'Calama',
                          'Iquique' => 'Iquique'
                          ),
                      array("class"=>"form-control select2",  'empty' => 'Seleccione la comuna de la propiedad')); ?>
								</div>
							</div>
							<div class="col-xs-8 col-md-4 col-lg-4">
								<div class="form-group">
									<?php echo $form->labelEx($model,'direccion_propiedad'); ?>
                  <?php echo $form->textField($model,'direccion_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese la dirección de la propiedad')); ?>
								</div>
							</div>
							<div class="col-xs-4 col-md-2 col-lg-2">
								<div class="form-group">
									<?php echo $form->labelEx($model,'numero_propiedad'); ?>
                  <?php echo $form->textField($model,'numero_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese el número de direccion')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model,'habitacion_propiedad'); ?>
                  <?php echo $form->dropDownList($model,'habitacion_propiedad',
                      array(
                          '1' => '1',
                          '2' => '2',
                          '3' => '3',
                          '4' => '4',
                          '5' => '5',
                          '6' => '6',
                          '7' => '7',
                          '8' => '8',
                          '9' => '9'
                      ),
                      array("class"=>"form-control select2", 'empty' => 'Cantidad de Habitaciones')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model,'bano_propiedad'); ?>
                  <?php echo $form->dropDownList($model,'bano_propiedad',
                      array(
                          '1' => '1',
                          '2' => '2',
                          '3' => '3',
                          '4' => '4',
                          '5' => '5',
                          '6' => '6',
                          '7' => '7',
                          '8' => '8',
                          '9' => '9'
                      ),
                      array("class"=>"form-control select2", 'empty' => 'Cantidad de baños')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model,'terreno_propiedad'); ?>
                  <?php echo $form->textField($model,'terreno_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese el tamaño del terreno')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model,'construido_propiedad'); ?>
                  <?php echo $form->textField($model,'construido_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese el tamaño del terreno construido')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-3 col-lg-3">
								<div class="form-group">
									<?php echo $form->labelEx($model, 'valor_propiedad');?>
                  <?php echo $form->textField($model, 'valor_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ejemplo: 123456','onchange'=>"applyFormatCurrency(document.getElementById('Propiedad_valor_propiedad'));"));?>
								</div>
							</div>
							<div class="col-xs-12 col-md-3 col-lg-3">
								<div class="form-group">
									<?php echo $form->labelEx($model, 'comision_propiedad');?>
									<?php echo $form->dropDownList($model,'comision_propiedad',
											array(
													'1' => '1%',
													'2' => '2%',
													'3' => '3%',
													'4' => '4%',
													'5' => '5%',
													'6' => '6%',
													'7' => '7%',
													'8' => '8%',
													'9' => '9%',
													'10' => '10%',
													'11' => '11%',
													'12' => '12%',
													'13' => '13%',
													'14' => '14%',
													'15' => '15%',
													'16' => '16%',
													'17' => '17%',
													'18' => '18%',
													'19' => '19%',
													'20' => '20%',
											),
											array("class"=>"form-control select2")); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-3 col-lg-3">
								<div class="form-group">
									<label for="end">Ganancia de comisión</label>
									<input class="form-control" name="Pago[end]" id="end" type="text" disabled="true">
								</div>
							</div>
							<div class="col-xs-12 col-md-3 col-lg-3">
								<div class="form-group">
									<label for="Propiedad_amoblado_propiedad">Propiedad amoblada</label><br>
                  <?php echo $form->checkBox($model, 'amoblado_propiedad', array('class'=>'minimal'));?>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
                    <?php echo $form->labelEx($model,'descripcion_propiedad'); ?>
                    <?php echo $form->textarea($model,'descripcion_propiedad', array('rows' => 4, 'class'=> 'form-control description-text ', 'cols'=> 50 )); ?>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<?php echo CHtml::submitButton('Registrar propiedad', array('class'=>'btn btn-primary')); ?>
						</div>
					</div>
				</div>
			</div>
			<!-- término se container -->
    </div>
  </section>
</div>
<?php $this->endWidget(); ?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.formatCurrency-1.4.0.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/i18n/jquery.formatCurrency.es-CL.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.Rut.min.js" type="text/javascript"></script>

<script>
	$("#Propiedad_valor_propiedad").blur(function(){
		$('#Propiedad_valor_propiedad').formatCurrency({region: 'es-CL'
			, roundToDecimalPlace: -1});
	});
	$("#Propiedad_valor_propiedad").click(function(){
		$('#Propiedad_valor_propiedad').val('');
	});
	$("#Propiedad_rut_cliente").click(function(){
		$('#Propiedad_rut_cliente').val('');
	});
	$('#Propiedad_rut_cliente').Rut({
		on_error: function(){
		},
		on_success: function(){
			var rut = $('#Propiedad_rut_cliente').val();
			rut=rut+"";
			var a = rut.replace('.','');
			a = a.replace('.','');
			var res = a.split("-");
			var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/propiedad/obtener/'+res[0];
			$.getJSON(action, function(data) {
				$.each(data, function(key, cliente) {
					$('#Cliente_correo_cliente').val(cliente.correo_cliente);
					$('#Cliente_nombres_cliente').val(cliente.nombres_cliente);
					$('#Cliente_apellidos_cliente').val(cliente.apellidos_cliente);
				});
			}).fail(function() {
			    console.log( "error" );
			  })
		},
	});
	$('#Propiedad_valor_propiedad').blur(function(){
		valor();
	});
	$('#Propiedad_valor_propiedad').click(function(){
		$('#Propiedad_valor_propiedad').val('');
	});
	$('#Propiedad_valor_propiedad').keyup(function () {
	if (isNaN($("#Propiedad_valor_propiedad").val())) {
	alert('Porfavor ingresar solamente números');
	}
});
	$('#Propiedad_comision_propiedad').change(function(){
		valor();
	});
	function valor(){
		var a = $('#Propiedad_comision_propiedad').val();
		a=a.replace(/[^\d]/, '');
		a=parseInt(a.replace(".",""));
		var b = $('#Propiedad_valor_propiedad').val();
		b=b.replace(/[^\d]/, '');
		b=parseInt(b.replace(".",""));
		var c = (a/100)*b;
		$('#end').val(c);
		$('#end').formatCurrency({region: 'es-CL'
			, roundToDecimalPlace: -0});
	}
</script>
