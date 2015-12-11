<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'administrador-form',
  'action'=>$administrador->isNewRecord?  Yii::app()->request->baseUrl.'/administrador/create/' :  Yii::app()->request->baseUrl.'/administrador/update/'.$administrador->rut,
  // Please note: When you enable ajax validation, make sure the corresponding
  // controller action is handling ajax validation correctly.
  // There is a call to performAjaxValidation() commented in generated controller code.
  // See class documentation of CActiveForm for details on this.
  'enableAjaxValidation'=>false,
)); ?>
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <?php if($administrador->isNewRecord): ?>
      <h3 class="box-title">Datos del administrador</h3>
    <?php else: ?>
      <h3 class="box-title">Datos del <?php echo $administrador->fn_admin? 'funcionario':'administrador' ?></h3>
    <?php endif; ?>

    </div>
    <div class="form">
      <div class="box-body">
        <div class="col-md-12">
          <?php echo $form->errorSummary($administrador,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>
        </div>
        <?php if($administrador->isNewRecord): ?>
        <div class="col-lg-3 col-md-12">
          <div class="center-block imagen">
             <img src="<?php echo Yii::app()->request->baseUrl; ?>/dist/img/null"  class="img-thumbnail" alt="Imagen de usuario" />
             </br>
             </br>
             <div class="col-lg-6 col-md-12 col-xs-12">
               <div class="form-group">
                 <div class="radio">
                   <?php echo $form->radioButton($administrador, 'perfil_admin', array('value'=>1,'uncheckValue'=>null, 'checked'=>'checked'));?>
                   Hombre
                 </div>
                  <div class="radio">
                    <?php echo $form->radioButton($administrador, 'perfil_admin', array('value'=>0,'uncheckValue'=>null));?>
                    Mujer
                  </div>
              </div>
            </div>
          </div>
        </div>
      <?php else: ?>
        <div class="col-lg-3 col-md-12">
          <div class="center-block imagen">
             <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $administrador->perfil_admin ?>"  class="img-thumbnail" alt="Imagen de usuario" />
             </br>
             </br>
             <div class="col-lg-12 col-md-12 col-xs-12" id='<?php echo $administrador->rut ?>'>
               <?php $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
               	'id' => 'uploadFile',
               	'config' => array(
               		'action' => Yii::app()->createUrl('administrador/upload/',array('id'=>$administrador->rut)),
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
        </div>
      <?php endIf; ?>

        <div class="col-lg-9 col-md-12">
          <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="form-group">
              <?php echo $form->labelEx($administrador , 'rut_admin'); ?>
              <?php echo $form->textField($administrador , 'rut_admin' , array('class'=>'form-control', 'required'=>'required')); ?>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="form-group">
              <?php echo $form->labelEx($administrador , 'nombres_admin'); ?>
              <?php echo $form->textField($administrador , 'nombres_admin' , array('class'=>'form-control', 'required'=>'required')); ?>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="form-group">
              <?php echo $form->labelEx($administrador , 'apellidos_admin'); ?>
              <?php echo $form->textField($administrador , 'apellidos_admin' , array('class'=>'form-control', 'required'=>'required')); ?>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="form-group">
              <?php echo $form->labelEx($administrador , 'correo_admin'); ?>
              <?php echo $form->textField($administrador , 'correo_admin' , array('class'=>'form-control', 'required'=>'required')); ?>
            </div>
          </div>
          <?php if ($administrador->isNewRecord): ?>
            <div class="col-lg-6 col-md-12 col-xs-12">
              <div class="form-group">
                <?php echo $form->labelEx($administrador , 'contrasena_admin'); ?>
                <?php echo $form->passwordField($administrador , 'contrasena_admin' , array('class'=>'form-control', 'required'=>'required')); ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-xs-12">
              <div class="form-group" id="tool">
                <?php echo $form->labelEx($administrador , 'repeat_pass'); ?>
                <?php echo $form->passwordField($administrador , 'repeat_pass' , array('class'=>'form-control select2', 'required'=>'required')); ?>
              </div>
            </div>
          <?php endIf; ?>
          <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="form-group">
              <?php echo $form->labelEx($administrador , 'telefono_admin'); ?>
              <?php echo $form->textField($administrador , 'telefono_admin' , array('class'=>'form-control', 'required'=>'required')); ?>
            </div>
          </div>
          <?php if(Yii::app()->session['admin_super']): ?>
            <?php if(!$administrador->fn_admin): ?>
            <div class="col-lg-6 col-md-12 col-xs-12">
              <div class="form-group">
                <label for="admin_super_admin">Administrador de mayor privilegio</label><br>
                <?php echo $form->checkBox($administrador , 'super_admin' , array()); ?>
              </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>
        </div>
      </div>
      <div class="box-footer">
        <?php if(!Yii::app()->session['funcionario']): ?>
          <?php echo CHtml::submitButton($administrador->isNewRecord ? 'Registrar administrador' : 'Actualizar administrador', array('class'=>'btn btn-primary', 'placeholder'=>'')); ?>
        <?php else: ?>
          <?php echo CHtml::submitButton($administrador->isNewRecord ? 'Registrar funcionario' : 'Actualizar funcionario', array('class'=>'btn btn-primary', 'placeholder'=>'')); ?>
        <?php endif; ?>
        <?php if(!$administrador->isNewRecord): ?>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#contrasena">Cambiar contraseña</button>
				<?php endIf; ?>
      </div>
    </div>
  </div>
</div>
<?php $this->endWidget(); ?>
