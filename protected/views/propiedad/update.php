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
							'selectableRows'=>1,
							'selectionChanged'=>'obtenerCliente',	// via 1: para mostrar detalles al seleccionar
							'dataProvider'=>$model2->search(),
							'filter' => $model2,
							'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css'),
							'summaryText' => 'Se encontraron {count} arrendatarios activos',
							'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
							'columns'=>array(
						// nota que con htmlOptions se puede personalizar el tamano de la columna
								array('name'=>'rut_cliente','htmlOptions'=>array('width'=>'80px')),
						// nota que aqui no se usa array, sino directamente el nombre de la columna
								'nombres_cliente',
								'apellidos_cliente',
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
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'propiedad-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			)); ?>
      <!-- Inicio se container -->
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Selección del propietario.</h3>
					</div><!-- /.box-header -->
					<div class="form">
						<div class="box-body">
							<div class="col-lg-3 col-md-6 col-xs-12">
								<div class="form-group">
									<?php echo $form->labelEx($model,'rut_cliente'); ?>
									<?php echo $form->textField($model,'rut_cliente',array('class'=>'form-control', 'placeholder'=>'RUT del propietario.')); ?>
									<?php echo $form->error($model,'rut_cliente'); ?>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-xs-12">
								<div class="form-group">
									<?php echo $form->labelEx($model2,'correo_cliente'); ?>
									<?php echo $form->textField($model2,'correo_cliente',array('class'=>'form-control','disabled'=>'true', 'placeholder'=>'Correo del propietario.')); ?>
									<?php echo $form->error($model2,'correo_cliente'); ?>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-xs-12">
								<div class="form-group">
									<?php echo $form->label($model2,'nombres_cliente'); ?>
									<?php echo $form->textField($model2,'nombres_cliente', array('class'=>'form-control', 'disabled'=>'true', 'placeholder'=>'Nombres del propietario.')); ?>
									<?php echo $form->error($model2,'nombres_cliente'); ?>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-xs-12">
								<?php echo $form->label($model2,'apellidos_cliente'); ?>
								<?php echo $form->textField($model2,'apellidos_cliente', array('class'=>'form-control', 'disabled'=>'true','placeholder'=>'Apellidos del propietario.'));?>
								<?php echo $form->error($model2,'apellidos_cliente'); ?>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#cliente">Cargar cliente</button>
							<?php echo CHtml::link('Registrar cliente', array('cliente/create'), array('class'=>'btn btn-warning')); ?>
						</div>
					</div>
				</div>
			</div>
      <!-- término se container -->
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Eliminar imágenes de la propiedad</h3>
          </div>
					<div class="form">
						<div class="box-body">

									<?php foreach ($model->imagen as $key => $value) {
					          echo '<div class="col-lg-2 col-sm-4 col-xs-6" id='.$value->id_imagen.'>';
										echo '<div class="form-group">';
					          echo '<a class="showcase" href="'.Yii::app()->request->baseUrl.'/images/propiedades/'.$value->url_imagen.'" data-rel="lightcase:myCollection:slideshow">Ver</a>';
					          echo  CHtml::image(Yii::app()->baseUrl."/images/propiedades/".$value->url_imagen, '',  array('class'=>'thumbnail img-responsive', 'id'=>$value->id_imagen));
					          echo '</div></div>';
					        } ?>

					  </div>
            <div class="box-footer">
            </div>
				  </div>
			  </div>
      </div>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Eliminar documentos de la propiedad</h3>
          </div>
					<div class="form">
						<div class="box-body">

							<?php foreach ($model->documento as $key => $value) {
								$url=str_replace(' ', '_', $value->url_documento);
								$url=str_replace('.', '_', $url);

							  echo '<div class="col-lg-4 col-md-6 col-xs-12" id="'.$url.'">';
							  echo '<div class="form-group">';
							  echo '<a class="showcase" href="'.Yii::app()->request->baseUrl.'/documento/propiedad/'.$value->url_documento.'" data-rel="lightcase:myCollection:slideshow">Ver</a>';
							  echo '<ul class="nav nav-pills nav-stacked">';
								echo '<li><i class="fa fa-home"></i> '.$value->url_documento.'</li>';
								echo CHtml::button('Eliminar',array('class'=>'btn btn-danger', 'id'=>'elemento-'.$value->id_documento, 'checkID'=>$value->id_documento, 'title'=>$url));
							  echo '</ul>';
							  echo '</div></div>';
							} ?>

					  </div>
            <div class="box-footer">
            </div>
				  </div>
			  </div>
      </div>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Datos de la propiedad.</h3>
					</div><!-- /.box-header -->
					<div class="form">
						<div class="box-body">
							<?php echo $form->errorSummary($model,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>
							<div class="col-xs-6">
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
							<div class="col-xs-6">
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
							<div class="col-xs-6">
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
							<div class="col-xs-4">
								<div class="form-group">
									<?php echo $form->labelEx($model,'direccion_propiedad'); ?>
                  <?php echo $form->textField($model,'direccion_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese la dirección de la propiedad')); ?>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="form-group">
									<?php echo $form->labelEx($model,'numero_propiedad'); ?>
                  <?php echo $form->textField($model,'numero_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese el número de direccion')); ?>
								</div>
							</div>
							<div class="col-xs-6">
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
							<div class="col-xs-6">
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
							<div class="col-xs-6">
								<div class="form-group">
									<?php echo $form->labelEx($model,'terreno_propiedad'); ?>
                  <?php echo $form->textField($model,'terreno_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese el tamaño del terreno')); ?>
								</div>
							</div>
							<div class="col-xs-6">
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
							<?php echo CHtml::submitButton('Actualizar propiedad', array('class'=>'btn btn-primary')); ?>
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
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/noty/packaged/jquery.noty.packaged.min.js"></script>

<script>

	$(document).ready(function(){
		valor();
		$('#Propiedad_valor_propiedad').formatCurrency({region: 'es-CL'
			, roundToDecimalPlace: -1});

		$('[id^=elemento]').click(function(){
			var a = $(this).attr('checkID');
			var title = '#'+$(this).attr("title");
		  var n = noty({
		      text        : '¿Está seguro de eliminar el documento?',
		      type        : 'warning',
		      dismissQueue: true,
		      layout      : 'topCenter',
		      theme       : 'defaultTheme',
		      buttons     : [
		          {addClass: 'btn btn-primary', text: 'Aceptar', onClick: function ($noty) {
								var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/propiedad/doc/'+a;
								$.getJSON(action, function(data) {
								  $.each(data, function(key, cliente) {
								  });
								}).error(function(jqXHR, textStatus, errorThrown) {
								  $("#respuesta").html(jqXHR.responseText);
								});
								$(title).hide('slow');
		              $noty.close();
		          }
		          },
		          {addClass: 'btn btn-danger', text: 'Cancelar', onClick: function ($noty) {
		              $noty.close();

		          }
		          }
		      ]
		  });
		});
	});
	$("#Propiedad_valor_propiedad").blur(function(){
		var suffix = $(this).val();
		var a=suffix.replace( /^\D+/g, '').replace( '.', '');
		var b = parseInt(a);
		if (!isNaN(b)) {
			$('#Propiedad_valor_propiedad').formatCurrency({region: 'es-CL'
				, roundToDecimalPlace: -1});
			valor();
		}else {
			alert('Por favor ingresar un valor numérico.');
			$(this).val('');
			$(this).focus();
		}
	});
	$("#Propiedad_valor_propiedad").keyup(function(){
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
	$('#Propiedad_valor_propiedad').click(function(){
		$('#Propiedad_valor_propiedad').val('');
	});
	$('#Propiedad_comision_propiedad').change(function(){
		valor();
	});
	function valor(){
		var a = $('#Propiedad_comision_propiedad').val();
		a=a.replace(/^\D+/g, '');
		a=parseInt(a.replace(".",""));
		var b = $('#Propiedad_valor_propiedad').val();
		b=b.replace(/[^\d]/, '');
		b=b.replace('.', '');
		b=b.replace('.', '');
		b=b.replace('.', '');
		b=b.replace('.', '');
		b=parseInt(b);
		var c = (a/100)*b;
		$('#end').val(c);
		$('#end').formatCurrency({region: 'es-CL'
			, roundToDecimalPlace: -1});
	}
	$('img').click(function(event) {
		var b = $(this).attr('id');
		var a = '#'+b;
		var n = noty({
		    text        : '¿Está seguro de eliminar la imagen?',
		    type        : 'warning',
		    dismissQueue: true,
		    layout      : 'topCenter',
		    theme       : 'defaultTheme',
		    buttons     : [
		        {addClass: 'btn btn-primary', text: 'Aceptar', onClick: function ($noty) {

		          var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/propiedad/img/'+b;
		          $.getJSON(action, function(data) {
		            $.each(data, function(key, cliente) {
		            });
		          }).error(function(jqXHR, textStatus, errorThrown) {
		            $("#respuesta").html(jqXHR.responseText);
		          });
		          $(a).hide('slow');
		            $noty.close();
		        }
		        },
		        {addClass: 'btn btn-danger', text: 'Cancelar', onClick: function ($noty) {
		            $noty.close();

		        }
		        }
		    ]
		});
	});
</script>
