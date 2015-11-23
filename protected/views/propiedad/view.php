<?php
/* @var $this PropiedadController */
/* @var $model Propiedad */

$this->breadcrumbs=array(
	'Propiedads'=>array('index'),
	$model->id_propiedad,
);

$this->menu=array(
	array('label'=>'List Propiedad', 'url'=>array('index')),
	array('label'=>'Create Propiedad', 'url'=>array('create')),
	array('label'=>'Update Propiedad', 'url'=>array('update', 'id'=>$model->id_propiedad)),
	array('label'=>'Delete Propiedad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_propiedad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Propiedad', 'url'=>array('admin')),
);
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Configuración
	    <small>Texto aquí.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Propiedad</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Vista</li>
	  </ol>
  </section>
  <section class="content">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'propiedad-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>false,
		)); ?>
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
			<!-- Inicio se container -->
      <div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Subir de fotos de la propiedad</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<div class="col-md-12">
								<div class="form-group">
									<p>Seleccione las imagenes de la propiedad.</p>
								</div>
							</div>
							<div class="col-md-3">
							</div>
							<div class="col-md-6">
								<div class="form-group">
		              <?php $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
		                   'id' => 'uploadFile',
		                   'config' => array(
		                       'action' => Yii::app()->createUrl('propiedad/upload/',array('id'=>$model->id_propiedad)),
		                       'allowedExtensions' => array("jpg","jpeg","gif","png"), //array("jpg","jpeg","gif","exe","mov" and etc...
		                       'sizeLimit' => 10 * 1024 * 1024, // maximum file size in bytes
		                       'buttonText' => 'Selección',
		                       //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
		                       //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
		                       'messages' => array(
		                           'typeError' => "{file} posee una extención invalida. se acepta solamente {extensions}.",
		                           'sizeError' => "{file} is too large, maximum file size is {sizeLimit}.",
		                           'minSizeError' => "{file} is too small, minimum file size is {minSizeLimit}.",
		                           'emptyError' => "{file} is empty, please select files again without it.",
		                           'onLeave' => "Los archivos seleccionados se están subiendo al servidor. si usted deja la página la carga será cancelada."
		                       ),
		                       'showMessage' => "js:function(message){ alert(message); }"
		                   )
		               ));
		               ?>
								</div>
								<div class="col-md-3">
								</div>
							</div>
					  </div>
            <div class="box-footer">
            </div>
				  </div>
			  </div>
      </div>
      <!-- término se container -->
			<!-- Inicio se container -->
      <div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Subir documentos de la propiedad</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<div class="col-md-12">
								<div class="form-group">
									<p>Selecione los documentos de la propiedad.</p>
								</div>
							</div>
							<div class="col-md-3">
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<?php $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
                    'id' => 'documento',
                    'config' => array(
                        'action' => Yii::app()->createUrl('propiedad/docu/',array('id'=>$model->id_propiedad)),
                        'allowedExtensions' => array("jpg","jpeg","gif","png", 'pdf', 'doc', 'docx'), //array("jpg","jpeg","gif","exe","mov" and etc...
                        'sizeLimit' =>25  * 1024 * 1024, // maximum file size in bytes
                        'buttonText' => 'Selección',
                        //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
                        //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
                        'messages' => array(
                            'typeError' => "{file} posee una extención invalida. se acepta solamente {extensions}.",
                            'sizeError' => "{file} is too large, maximum file size is {sizeLimit}.",
                            'minSizeError' => "{file} is too small, minimum file size is {minSizeLimit}.",
                            'emptyError' => "{file} is empty, please select files again without it.",
                            'onLeave' => "Los archivos seleccionados se están subiendo al servidor. si usted deja la página la carga será cancelada."
                        ),
                        'showMessage' => "js:function(message){ alert(message); }"
                    )
                ));
                ?>
								</div>
								<div class="col-md-3">
								</div>
							</div>
					  </div>
            <div class="box-footer">
            </div>
				  </div>
			  </div>
      </div>
      <!-- Inicio se container -->
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos de la propiedad</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<?php echo $form->errorSummary($model,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>
							<div class="col-xs-3 col-md-3 col-lg-4  ">
								<div class="form-group">
									<?php echo $form->labelEx($model,'id_propiedad'); ?>
                  <?php echo $form->textField($model,'id_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese la dirección de la propiedad', 'disabled' => 'true')); ?>
								</div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-4  ">
								<div class="form-group">
									<?php echo $form->labelEx($model,'servicio_propiedad'); ?>
                  <?php echo $form->dropDownList($model,'servicio_propiedad',
                      array(
                          'Venta' => 'Venta',
                          'Arriendo' => 'Arriendo',
                      ),
                      array("class"=>"form-control select2", 'empty' => 'Seleccione tipo de servicio', 'disabled' => 'true')); ?>
								</div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-4  ">
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
                      array("class"=>"form-control select2", 'empty' => 'Seleccione el tipo de propiedad', 'disabled' => 'true')); ?>
								</div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-4  ">
								<div class="form-group">
									<?php echo $form->labelEx($model,'comuna_propiedad'); ?>
                  <?php echo $form->dropDownList($model,'comuna_propiedad',
                      array(
                          'Antofagasta' => 'Antofagasta',
                          'Calama' => 'Calama',
                          'Iquique' => 'Iquique'
                          ),
                      array("class"=>"form-control select2",  'empty' => 'Seleccione la comuna de la propiedad', 'disabled' => 'true')); ?>
								</div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-4  ">
								<div class="form-group">
									<?php echo $form->labelEx($model,'direccion_propiedad'); ?>
                  <?php echo $form->textField($model,'direccion_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese la dirección de la propiedad', 'disabled' => 'true')); ?>
								</div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-4  ">
								<div class="form-group">
									<?php echo $form->labelEx($model,'numero_propiedad'); ?>
                  <?php echo $form->textField($model,'numero_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese el número de direccion', 'disabled' => 'true')); ?>
								</div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-4  ">
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
                      array("class"=>"form-control select2", 'empty' => 'Cantidad de Habitaciones', 'disabled' => 'true')); ?>
								</div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-4  ">
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
                      array("class"=>"form-control select2", 'empty' => 'Cantidad de baños', 'disabled' => 'true')); ?>
								</div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-4  ">
								<div class="form-group">
									<?php echo $form->labelEx($model,'terreno_propiedad'); ?>
                  <?php echo $form->textField($model,'terreno_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese el tamaño del terreno', 'disabled' => 'true')); ?>
								</div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-4  ">
								<div class="form-group">
									<?php echo $form->labelEx($model,'construido_propiedad'); ?>
                  <?php echo $form->textField($model,'construido_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese el tamaño del terreno construido', 'disabled' => 'true')); ?>
								</div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-4  ">
								<div class="form-group">
									<?php echo $form->labelEx($model, 'valor_propiedad');?>
                  <?php echo $form->textField($model, 'valor_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ejemplo: 123456', 'disabled' => 'true'));?>
								</div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-2  ">
								<div class="form-group">
									<?php echo $form->labelEx($model, 'comision_propiedad');?>
									<?php echo $form->textField($model, 'comision_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ejemplo: 123456', 'disabled' => 'true'));?>
								</div>
							</div>
							<div class="col-xs-12 col-md-3 col-lg-2">
								<div class="form-group">
									<label for="end">Ganancia de comisión</label>
									<input class="form-control" name="Pago[end]" id="end" type="text" disabled="true">
								</div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-4  ">
								<div class="form-group">
									<label for="Propiedad_amoblado_propiedad">Propiedad amoblada</label><br>
                  <?php echo $form->checkBox($model, 'amoblado_propiedad', array('class'=>'minimal', 'disabled' => 'true'));?>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
                    <?php echo $form->labelEx($model,'descripcion_propiedad'); ?>
                    <?php echo $form->textarea($model,'descripcion_propiedad', array('rows' => 4, 'class'=> 'form-control description-text ', 'cols'=> 50 , 'disabled' => 'true')); ?>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<?php echo CHtml::link('Vista previa', array('/site/informacion', 'id'=>$model->id_propiedad), array('class'=>'btn btn-primary')); ?>
							<?php echo CHtml::link('Actualizar propiedad', array('/propiedad/update/', 'id'=>$model->id_propiedad), array('class'=>'btn btn-info', 'confirm' => '¿Está seguro de actualizar la propiedad?')); ?>
							<?php echo CHtml::link("Eliminar propiedad", '#', array(
									'submit'=>array('/propiedad/delete', "id"=>$model->id_propiedad),
									'class'=>'btn btn-danger',
									'confirm' => '¿Está seguro de eliminar la venta?'
									)
							);?>
						</div>
					</div>
			  </div>
      </div>
      <!-- término se container -->
			<!-- Inicio se container -->
      <div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos del propietario</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<?php
								 $this->widget('zii.widgets.CDetailView', array(
										 'data' => $model2,
										 'htmlOptions' => array('class' => 'table-striped table-condensed table-responsive table table-hover'),
										 'attributes' => array(
												 'rut_cliente',
												 array(
													 'header'=>'Nombre completo',
													 'name'=>'nombres_cliente',
													 'value'=>$model2->nombres_cliente.' '.$model2->apellidos_cliente,
												 ),
												 'telefonocelular_cliente',
												 'domicilio_cliente',
												 'correo_cliente'
										 )
								 ));
								?>
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
<?php $this->endWidget(); ?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.formatCurrency-1.4.0.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/i18n/jquery.formatCurrency.es-CL.js" type="text/javascript"></script>
<script>
$(document).ready(function () {
	var a = $('#Propiedad_comision_propiedad').val();
	$('#Propiedad_comision_propiedad').val(a+'%');
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
	$('#Propiedad_valor_propiedad').formatCurrency({region: 'es-CL'
		, roundToDecimalPlace: -0});
});
</script>
