<div class="modal fade modal-Default" id="contrasena" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 style="text-align: center">Cambio de contraseña</h4>
                <div class="form-horizontal">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'contrasena-form',
                        'action'=>Yii::app()->request->baseUrl.'/administrador/contra/'.$model->rut,
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation'=>false,
                    )); ?>
                    <div class="col-md-12">
                        <?php echo $form->errorSummary($model,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>
                    </div>
                    <div class="col-md-12">
                        <div class="col-xs-12 col-md-6 col-lg-12">
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'contrasena_admin'); ?>
                                <?php echo $form->passwordField($model,'contrasena_admin',array('class'=>'form-control', 'placeholder'=>'Constraseña del Admin',)); ?>
                            </div>
                        </div><br>
                        <div class="col-xs-12 col-md-6 col-lg-12">
                            <div class="form-group" id="box">
                                <?php echo $form->labelEx($model,'repeat_pass'); ?>
                                <?php echo $form->passwordField($model,'repeat_pass',array('class'=>'form-control', 'placeholder'=>'Repetir contraseña', )); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php echo CHtml::submitButton('Actualizar contraseña', array('class'=>'btn btn-success center-block')); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'administrador-form',
	'action'=>$model->isNewRecord ? 'administrador/create' : '',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

		<div class="row">
			<div class="col-md-12">
				<div class="box  box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Perfil de usuario : </h3><b> <?php echo $model->nombres_admin, $model->apellidos_admin ?></b>

					</div><!-- /.box-header -->
					<div class="box-body" >
						<div class="col-md-2">
							<div class="center-block imagen">
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $model->perfil_admin ?>"  class="img-thumbnail" alt="Imagen de usuario" />
								</br>
								</br>
								<?php $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
									'id' => 'uploadFile',
									'config' => array(
										'action' => Yii::app()->createUrl('perfil/upload/',array('id'=>$model->rut)),
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
						</div>
						<div class="col-md-10">
							<div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
								<span class="input-group-addon" id="basic-addon1">Nombres: </span>
								<?php echo $form->textField($model,'nombres_admin',array('class'=>'form-control','tabindex'=>2 )); ?>
							</div>
							<div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
								<span class="input-group-addon" id="basic-addon1">Apellidos: </span>
								<?php echo $form->textField($model,'apellidos_admin',array('class'=>'form-control','tabindex'=>2 )); ?>
							</div>
                            <div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-at"></i></span>
                                <?php echo $form->textField($model,'correo_admin', array('class'=>'form-control', 'tabindex'=>5, 'placeholder'=>'@correo','id'=>'seis')); ?>
                            </div>

							<div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone"></i></span>
								<?php echo $form->textField($model,'telefono_admin', array('class'=>'form-control', 'tabindex'=>5, 'placeholder'=>'Repita la nueva contraseña')); ?>
							</div>
						</div>



					</div><!-- /.box-body -->
					<div class="box-footer">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contrasena"><i class="fa fa-unlock-alt"></i> Cambiar contraseña</button>
                        <div class="pull-right">
						<?php
						echo CHtml::submitButton($model->isNewRecord ? 'Registrar Usuario' : 'Guardar Cambios', array('class'=>'btn btn-success', 'placeholder'=>'')); ?>
                        </div>

					</div><!-- box-footer -->
				</div><!-- /.box -->
			</div>
		</div>
		<div class="row">

		</div>
		<?php $this->endWidget(); ?>
