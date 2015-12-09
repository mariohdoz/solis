<?php
/* @var $this ArrendatarioController */
/* @var $model Arrendatario */

$this->breadcrumbs=array(
	'Arrendatarios'=>array('index'),
	$model->rut_arrendatario,
);

$this->menu=array(
	array('label'=>'List Arrendatario', 'url'=>array('index')),
	array('label'=>'Create Arrendatario', 'url'=>array('create')),
	array('label'=>'Update Arrendatario', 'url'=>array('update', 'id'=>$model->rut_arrendatario)),
	array('label'=>'Delete Arrendatario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rut_arrendatario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Arrendatario', 'url'=>array('admin')),
);
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Visualizar arrendatario
	    <small>vizualización del arrendatario <?php echo CHtml::encode($model->rut_arrendatario); ?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Arrendatario</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Vista</li>
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
      <!-- Inicio se container -->
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'arrendatario-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			)); ?>
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Subir documentos del arrendatario</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<div class="col-md-12">
								<div class="form-group">
									<p>Selecione los documentos del arrendatario.</p>
								</div>
							</div>
							<div class="col-md-3">
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<?php

										$this->widget('ext.EAjaxUpload.EAjaxUpload', array(
											'id' => 'documento',
											'config' => array(
												'action' => Yii::app()->createUrl('arrendatario/docu/',array('id'=>$model->rut)),
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
											)
										);
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
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Documento</h3>
					</div>
					<div class="form">
						<div class="box-body">
							<?php
								if($model->documento != null)
								{
									foreach ($model->documento as $key => $value) {
										$data = explode('.', $value->url_documento);
										echo '<div class="col-xs-12 col-md-6 col-lg-6"">';
											echo '<ul class="nav nav-pills nav-stacked">';
												echo '<li>'.CHtml::link('<i class="fa fa-home"></i>'.$value->url_documento,array('arrendatario/download', 'type'=>$value->url_documento)).'</li>';
											echo '</ul>';
										echo '</div>';
									}
								}else {
									echo '<div class="col-xs-12 col-md-12 col-lg-12"">';
										echo '<h3>No tiene ningún documento ingresado</h3>';
									echo '</div>';
									echo '<div class="col-xs-12 col-md-6 col-lg-4"">';
									echo '</div>';
								}
							?>
						</div>
						<div class="box-footer">
						</div>
					</div>
				</div>
			</div>
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos del arrendatario</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<div class="col-md-12">
								<?php echo $form->errorSummary($model,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>
							</div>
							<div class="box-body">
								<div class="col-xs-12 col-md-6 col-lg-4">
									 <div class="form-group">
										<?php echo $form->labelEx($model,'rut_arrendatario'); ?>
										<?php echo $form->textField($model,'rut_arrendatario', array("class"=>"form-control select2", $model->isNewRecord ? '' : 'disabled'=>true, 'placeholder'=>'Ejemplo: 12345678-9')); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'nombres_arrendatario'); ?>
										<?php echo $form->textField($model,'nombres_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Ingrese los nombres del arrendatario','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'apellidos_arrendatario'); ?>
										<?php echo $form->textField($model,'apellidos_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Ingrese los apellidos del arrendatario','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'estadocivil_arrendatario') ?>
										<?php echo $form->dropDownList($model,'estadocivil_arrendatario',array(
											'Soltero/a'=>'Soltero/a',
											'Casado/a'=>'Casado/a',
											'Viudo/a'=>'Viudo/a',
										),
										array("class"=>"form-control select2",'disabled'=>true)) ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'profesion_arrendatario'); ?>
										<?php echo $form->textField($model,'profesion_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Profesión del arrendatario','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'correo_arrendatario'); ?>
										<?php echo $form->emailField($model,'correo_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Correo del arrendatario','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'telefonofijo_arrendatario'); ?>
										<?php echo $form->textField($model,'telefonofijo_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Ejemplo +5655123456 ','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'telefonocelular_arrendatario'); ?>
										<?php echo $form->textField($model,'telefonocelular_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Ejemplo +56912345678','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'nrocuenta_arrendatario'); ?>
										<?php echo $form->textField($model,'nrocuenta_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Número de cuenta','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'banco_arrendatario'); ?>
										<?php echo $form->textField($model,'banco_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Banco del arrendatario','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'nacionalidad_arrendatario'); ?>
										<?php echo $form->textField($model,'nacionalidad_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Nacionalidad','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'empresa_arrendatario'); ?><br>
										<?php echo $form->checkBox($model,'empresa_arrendatario',array('disabled'=>true)); ?>
									</div>
								</div>
					  </div>
            <div class="box-footer">
							<?php echo CHtml::link('Generar ficha de arrendatario', array('/intra/index'), array('class'=>'btn btn-primary')); ?>
							<?php echo CHtml::link('Actualizar arrendatario', array('/arrendatario/update/', 'id'=>$model->rut), array('class'=>'btn btn-info', 'confirm' => '¿Está seguro de actualizar el arrendatario?')); ?>
							<?php echo CHtml::link("Eliminar arrendatario", '#', array(
									'submit'=>array('/arrendatario/eliminar', "id"=>$model->rut),
									'class'=>'btn btn-danger',
									'confirm' => '¿Está seguro de eliminar el arrendatario?'
									)
							);?>
            </div>
				  </div>
			  </div>
      </div>
      <!-- término se container -->
    </div>
		<?php
		if($model->arriendo != null)
		{
		  foreach ($model->arriendo as $key => $value) {
		    echo '<div class="col-md-6">
		      <div class="box box-primary">
		        <div class="box-header with-border">
		          <h3 class="box-title">Arriendo asociado</h3>
		        </div>
		        <div class="form">
		          <div class="box-body">
		            <div class="col-lg-12 col-md-12 col-xs-12">
		              <div class="form-group">';
									$this->widget('zii.widgets.CDetailView', array(
									  'data'=>$value,
									  'htmlOptions' => array('class' => 'table-striped table-condensed table-responsive table table-hover'),
									  'attributes'=>array(
											array(
	       							 'label'=>'Número de ficha',
	       								'value' =>  CHtml::link($value->id_arriendo,array('/arriendo/view/', 'id'=>$value->id_arriendo)) ,
	       								'type'=>'raw'
	       						 ),
									    'fechapago_arriendo',
									    'inicio_arriendo',
									    'termino_arriendo',
									    array('header'=>'Valor',
									      'label'=>'Valor',
									      'value'=>Yii::app()->numberFormatter->format("¤#,##0", $value->valor_arriendo, "$ "),
									    ),
									  ),
									));
		              echo '</div>
		            </div>
		          </div>
		          <div class="box-footer">
		          </div>
		        </div>
		      </div>
		    </div>';
		  }
		}
		?>
  </section>
</div>
<?php $this->endWidget(); ?>
