<?php
/* @var $this PagoController */
/* @var $model Pago */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pago'); ?>
		<?php echo $form->textField($model,'id_pago'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_arriendo'); ?>
		<?php echo $form->textField($model,'id_arriendo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_pago'); ?>
		<?php echo $form->textField($model,'fecha_pago'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mes_pago'); ?>
		<?php echo $form->textField($model,'mes_pago'); ?>
	</div>

	<div class="col-xs-12 col-md-3 col-lg-3">
		<div class="form-group">
			<label for="Pago_totalpagar_pago" class="required">Total a pagar</label>
			<input class="form-control" name="Pago[Pago_totalpagar_pago]" id="Pago_totalpagar_pago" type="text"  value="<?php echo CHtml::encode($arriendo->valor_arriendo);?>"disabled="">
		</div>
	</div>

	<div class="row">
		<?php echo $form->label($model,'totalpagado_pago'); ?>
		<?php echo $form->textField($model,'totalpagado_pago'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
