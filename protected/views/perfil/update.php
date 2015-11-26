<h1>Update</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'venta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<b>Nombre</b>
<div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone"></i></span>
    <?php echo $form->textField($model,'telefono_admin', array('class'=>'form-control','disabled'=>'true', 'tabindex'=>5, 'placeholder'=>'Repita la nueva contraseña','id'=>'siete')); ?>
</div>
<div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone"></i></span>
    <?php echo $form->textField($model,'nombres_admin', array('class'=>'form-control','disabled'=>'true', 'tabindex'=>5, 'placeholder'=>'Repita la nueva contraseña','id'=>'siete')); ?>
</div>
<?php $this->endWidget(); ?>
 
