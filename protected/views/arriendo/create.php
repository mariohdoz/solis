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
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.formatCurrency-1.4.0.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/i18n/jquery.formatCurrency.es-CL.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.Rut.min.js" type="text/javascript"></script>

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
					$('#Propiedad_comision_propiedad').val('% '+propiedad.comision_propiedad);
					$('#Arriendo_valor_arriendo').val(propiedad.valor_propiedad);
					$('#ganancia_propiedad').val((propiedad.comision_propiedad/100)*propiedad.valor_propiedad);
					$('#ganancia_propiedad').formatCurrency({region: 'es-CL'
		        , roundToDecimalPlace: -1});
					$('#Propiedad_rut_cliente').val(propiedad.rut_cliente);
					$('#Propiedad_valor_propiedad').formatCurrency({region: 'es-CL'
		        , roundToDecimalPlace: -1});
					$('#Arriendo_valor_arriendo').formatCurrency({region: 'es-CL'
		        , roundToDecimalPlace: -1});
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
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 style="text-align: center">Arrendatario</h4>
				<div class="form-horizontal">
					<?php
						$this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'arrendatario',
							'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
							'selectableRows'=>1,
							'selectionChanged'=>'obtenerSeleccion',	// via 1: para mostrar detalles al seleccionar
							'dataProvider'=>$model2->search(),
							'filter' => $model2,
							'summaryText' => 'Se encontraron {count} arrendatarios activos',
							'columns'=>array(
						// nota que con htmlOptions se puede personalizar el tamano de la columna
								array('name'=>'rut_arrendatario','htmlOptions'=>array('width'=>'100px')),
						// nota que aqui no se usa array, sino directamente el nombre de la columna
								'nombres_arrendatario',
								'apellidos_arrendatario',
						// via 2: para mostrar detalles al hacer click en un icono.

							),
						));
						?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success center-block" data-dismiss="modal"><i class="fa fa-check "></i> Aceptar </button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade modal-default" id="propiedad" tabindex="-2" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 style="text-align: center">Propiedades</h4>
				<?php    ?>
				<div class="form-horizontal">
					<?php
						$this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'propiedad',
							'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
							'selectableRows'=>1,
							'dataProvider'=>$model3->disponible(),
							'filter' => $model3,
							'summaryText' => 'Se encontraron {count} propiedades',
							'selectionChanged'=>'obtenerPropiedad',	// via 1: para mostrar detalles al seleccionar
							'columns'=>array(
						// nota que con htmlOptions se puede personalizar el tamano de la columna
								array('name'=>'id_propiedad','htmlOptions'=>array('width'=>'80px')),
						// nota que aqui no se usa array, sino directamente el nombre de la columna
								'direccion_propiedad',
								'tipo_propiedad',
								'comuna_propiedad',

						// via 2: para mostrar detalles al hacer click en un icono.

							),
						));
						?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success center-block" data-dismiss="modal"><i class="fa fa-check "></i> Aceptar</button>
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
			<i class="fa fa-home"></i>Inicio</a></li>
			<li class="active">Arriendos</li>
			<li class="active">Nuevo Arriendo</li>
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
							<div class="col-lg-12 col-md-12 col-xs-12">
								<div class="form-group">
									<?php echo $form->labelEx($model,'rut_arrendatario'); ?>
									<?php echo $form->textField($model,'rut_arrendatario',array('size'=>10,'maxlength'=>10, 'class'=>'form-control', 'placeholder'=>'Ingrese el RUT del arrendatario o seleccione uno.', 'required'=>'required')); ?>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-xs-12">
								<div class="form-group">
									<?php echo $form->label($model2,'nombres_arrendatario'); ?>
									<?php echo $form->textField($model2,'nombres_arrendatario', array('class'=>'form-control', 'disabled'=>'true', 'placeholder'=>'Nombres del arrendatario.')); ?>
									<?php echo $form->error($model2,'nombres_arrendatario'); ?>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-xs-12">
								<?php echo $form->label($model2,'apellidos_arrendatario'); ?>
								<?php echo $form->textField($model2,'apellidos_arrendatario', array('class'=>'form-control', 'disabled'=>'true', 'placeholder'=>'Apellidos del arrendatario.')); ?>
								<?php echo $form->error($model2,'apellidos_arrendatario'); ?>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#arrendatario"><i class="fa fa-spinner "></i> Cargar arrendatario</button>
							<?php echo CHtml::link('<i class="fa fa-plus"></i> &nbsp;&nbsp;Nuevo arrendatario ', array('arrendatario/create'), array('class'=>'btn btn-success')); ?>
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
							<div class="col-lg-4 col-md-12 col-xs-12">
								<div class="form-group">
									<?php echo $form->labelEx($model,'id_propiedad'); ?>
									<?php echo $form->textField($model,'id_propiedad',array('class'=>'form-control', 'placeholder'=>'Ingrese el número de ficha de la propiedad o seleccione una.','required'=>'required')); ?>
									<?php echo $form->error($model,'id_propiedad'); ?>
								</div>
							</div>
							<div class="col-lg-4 col-md-12 col-xs-12">
								<div class="form-group">
									<label for="Propiedad_rut_cliente">RUT del propietario</label>
									<?php echo $form->textField($model3,'rut_cliente',array('class'=>'form-control','disabled'=>'true',  'placeholder'=>'RUT del propietario.')); ?>
									<?php echo $form->error($model3,'rut_cliente'); ?>
								</div>
							</div>
							<div class="col-lg-4 col-md-12 col-xs-12">
								<div class="form-group">
									<?php echo $form->label($model3,'comision_propiedad'); ?>
									<?php echo $form->textField($model3,'comision_propiedad', array('class'=>'form-control', 'disabled'=>'true', 'placeholder'=>'Comisión.')); ?>
									<?php echo $form->error($model3,'comision_propiedad'); ?>
								</div>
							</div>
							<div class="col-lg-8 col-md-12 col-xs-12">
								<div class="form-group">
									<?php echo $form->label($model3,'direccion_propiedad'); ?>
									<?php echo $form->textField($model3,'direccion_propiedad', array('class'=>'form-control', 'disabled'=>'true', 'placeholder'=>'Dirección de la propiedad.')); ?>
									<?php echo $form->error($model3,'direccion_propiedad'); ?>
								</div>
							</div>
							<div class="col-lg-4 col-md-12 col-xs-12">
								<div class="form-group">
									<?php echo $form->label($model3,'valor_propiedad'); ?>
									<?php echo $form->textField($model3,'valor_propiedad', array('class'=>'form-control', 'disabled'=>'true', 'placeholder'=>'Valor de la propiedad.')); ?>
									<?php echo $form->error($model3,'valor_propiedad'); ?>
								</div>
							</div>

						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#propiedad"><i class="fa fa-spinner "></i> Cargar propiedad</button>
							<?php echo CHtml::link('<i class="fa fa-plus"></i> &nbsp;&nbsp;Nuevo propiedad ', array('propiedad/create'), array('class'=>'btn btn-success')); ?>
            </div>
					</div>
				</div>
			</div>
			<!--Salto de linea-->
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos del arriendo </h3>
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
									<div class="col-lg-6 col-md-6 col-xs-12">
										<div class="form-group">
											<?php echo $form->labelEx($model,'inicio_arriendo'); ?>
											<?php echo $form->dateField($model,'inicio_arriendo', array('class'=>'form-control', 'required'=>'required')); ?>
										</div>
										</div>
									<div class="col-lg-6 col-md-6 col-xs-12">
										<div class="form-group">
											<?php echo $form->labelEx($model,'termino_arriendo'); ?>
											<?php echo $form->dateField($model,'termino_arriendo', array('class'=>'form-control', 'required'=>'required')); ?>
										</div>
									</div>
										<div class="col-lg-6 col-md-6 col-xs-12">
										<div class="form-group">
											<?php echo $form->labelEx($model,'fechapago_arriendo'); ?>
											<?php echo $form->dropDownList($model,'fechapago_arriendo',
													array(
															'1' => '1',
															'2' => '2',
															'3' => '3',
															'4' => '4',
															'5' => '5',
															'6' => '6',
															'7' => '7',
															'8' => '8',
															'9' => '9',
															'10' => '10',
															'11' => '11',
															'12' => '12',
															'13' => '13',
															'14' => '14',
															'15' => '15',
															'16' => '16',
															'17' => '17',
															'18' => '18',
															'19' => '19',
															'20' => '20',
															'21' => '21',
															'22' => '22',
															'23' => '23',
															'24' => '24',
															'25' => '25',
															'26' => '26',
															'27' => '27',
															'28' => '28',
															'29' => '29',
															'30' => '30',
															'31' => '31',
													),
													array("class"=>"form-control select2", 'empty' => 'Seleccione el día de pago', 'required'=>'required')); ?>
										</div>
									</div>
									<div class="col-lg-3 col-md-12 col-xs-12">
										<div class="form-group">
											<?php echo $form->labelEx($model,'valor_arriendo'); ?>
											<?php echo $form->textField($model,'valor_arriendo', array('class'=>'form-control', 'placeholder'=>'Ingresar valor pactado con el arrendatario Ej: "500000".', 'required'=>'required')); ?>
										</div>
									</div>
									<div class="col-lg-3 col-md-12 col-xs-12">
										<div class="form-group">
											<label for="Propiedad_comision_propiedad">Comisión </label>
											<input class="form-control" disabled="disabled" placeholder="Comisión generada." name="Propiedad[comision_propiedad]" id="ganancia_propiedad" type="text">
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
<script>
	$("#Arriendo_valor_arriendo").click(function(){
		$('#Arriendo_valor_arriendo').val('');
	});
	$("#Arriendo_valor_arriendo").blur(function(){
		var suffix = $(this).val();
		var a=suffix.replace( /^\D+/g, '').replace( '.', '');
		var b = parseInt(a);
		if (!isNaN(b)) {
			$('#Arriendo_valor_arriendo').formatCurrency({region: 'es-CL'
				, roundToDecimalPlace: -1});
			valor();
		}else {
			alert('Por favor ingresar un valor numérico.');
			$(this).val('');
			$(this).focus();
		}
	});
	$("#Arriendo_rut_arrendatario").click(function(){
		$("#Arriendo_rut_arrendatario").val('');
	});

	$('#Arriendo_rut_arrendatario').Rut({
		on_error: function(){
			alert('El RUT ingresado es incorrecto.');
			$('#Arrendatario_nombres_arrendatario').val('');
			$('#Arrendatario_apellidos_arrendatario').val('');
		},
		on_success: function(){
			var rut = $('#Arriendo_rut_arrendatario').val();
			rut=rut+"";
			var a = rut.replace('.','');
			a = a.replace('.','');
			var res = a.split("-");
			var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/arriendo/obtener/'+res[0];
			$.getJSON(action, function(data) {
				$.each(data, function(key, cliente) {
					if (cliente) {
						$('#Arrendatario_nombres_arrendatario').val(cliente.nombres_arrendatario);
						$('#Arrendatario_apellidos_arrendatario').val(cliente.apellidos_arrendatario);
					}else {
						alert('Arrendatario no encontrado');
						$('#Arriendo_rut_arrendatario').val('');
						return false;
					}

				});
			}).fail(function() {
			    console.log( "error" );
			  })
		},
	});

	$("#Arriendo_valor_arriendo").keyup(function(){
		$('#Arriendo_valor_arriendo').formatCurrency({region: 'es-CL'
			, roundToDecimalPlace: -1});
	});
	$("#Arriendo_valor_arriendo").click(function(){
		if ($('#Propiedad_valor_propiedad').val()=='') {
			alert('Favor de seleccionar la propiedad primero');
			$('#ganancia_propiedad').val('0');
			$('#Arriendo_valor_arriendo').blur();
		}else {
				$('#ganancia_propiedad').val('');
		}
	});
	$("#Arriendo_valor_arriendo").blur(function(){
		if ($('#Propiedad_valor_propiedad').val()!='') {
			var a = $('#Propiedad_comision_propiedad').val();
			a=a.replace(/^\D+/g, '');
			a=parseInt(a.replace(".",""));
			var b = $('#Arriendo_valor_arriendo').val();
			b=b.replace(/[^\d]/, '');
			b=b.replace('.', '');
			b=b.replace('.', '');
			b=b.replace('.', '');
			b=b.replace('.', '');
			b=parseInt(b);
			var c = (a/100)*b;
			$('#ganancia_propiedad').val(c);
			$('#ganancia_propiedad').formatCurrency({region: 'es-CL'
				, roundToDecimalPlace: -1});
		}
	});

</script>
