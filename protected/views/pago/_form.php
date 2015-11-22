<?php
/* @var $this PagoController */
/* @var $model Pago */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pago-form',
	'action'=>$model->isNewRecord ? Yii::app()->request->baseUrl.'/pago/create/'.$arriendo->id_arriendo : Yii::app()->request->baseUrl.'/pago/update/'.$model->id_pago,
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
			<h3 class="box-title">Seleccione el mes</h3>
		</div>
		<div class="form">
			<div class="box-body">
				<div class="col-xs-12 col-md-6 col-lg-6">
					<div class="form-group">
						<?php echo $form->labelEx($model,'mes'); ?>
						<?php echo $form->dropDownList($model,'mes',
								array(
										'1' => 'Enero',
										'2' => 'Febrero',
										'3' => 'Marzo',
										'4' => 'Abril',
										'5' => 'Mayo',
										'6' => 'Junio',
										'7' => 'Julio',
										'8' => 'Agosto',
										'9' => 'Septiembre',
										'10' => 'Octubre',
										'11' => 'Noviembre',
										'12' => 'Diciembre',
								),
								array("class"=>"form-control select2")); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-6">
					<div class="form-group">
						<?php echo $form->labelEx($model,'ano'); ?>
						<?php
						for ($i=$a; $i < $a+10; $i++) {
							$array['20'.$i]= '20'.$i ;
						}
					 echo $form->dropDownList($model,'ano',
							$array,
							array("class"=>"form-control select2",)); ?>
					</div>
				</div>
		  </div>
			<div class="box-footer">
				<?php echo CHtml::link('Cambiar fecha', array('/pago/fecha/', 'id'=>$model->id_arriendo, 'b'=>$model->mes, 'c'=>$model->ano), array('class'=>'btn btn-info', 'id'=>'cambiar_fecha')); ?>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Datos del pago correspondiente a la fecha <?php echo CHtml::encode($model->mes_pago); ?></h3>
		</div>
		<div class="form">
			<div class="box-body">
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="Arriendo_id_arriendo">Número de ficha del arriendo</label>
						<?php echo $form->textField($arriendo,'id_arriendo', array('class'=>'form-control','disabled' => true  )); ?>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="form-group">
						<?php echo $form->labelEx($arriendo,'valor_arriendo'); ?>
						<?php echo $form->textField($arriendo,'valor_arriendo', array('class'=>'form-control','disabled' => true  )); ?>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="form-group">
						<?php echo $form->labelEx($arriendo,'inicio_arriendo'); ?>
						<?php echo $form->textField($arriendo,'inicio_arriendo', array('class'=>'form-control','disabled' => true  )); ?>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="form-group">
						<?php echo $form->labelEx($arriendo,'termino_arriendo'); ?>
						<?php echo $form->textField($arriendo,'termino_arriendo', array('class'=>'form-control','disabled' => true  )); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-3 col-lg-3">
					<div class="form-group">
						<?php echo $form->labelEx($model,'totalpagar_pago'); ?>
						<?php echo $form->textField($model,'totalpagar_pago', array('class'=>'form-control')); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-3 col-lg-3">
					<div class="form-group">
						<?php echo $form->labelEx($model,'totalpagado_pago'); ?>
						<?php echo $form->textField($model,'totalpagado_pago', array('class'=>'form-control', 'disabled'=>true)); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-3 col-lg-3">
					<div class="form-group">
						<label for="fin" class="required">Total pagado actualizado</label>
						<input class="form-control" name="Pago[fin]" id="fin" type="text" disabled="">
					</div>
				</div>
				<div class="col-xs-12 col-md-3 col-lg-3">
					<div class="form-group">
						<label for="end" class="required">Deuda total actualizada</label>
						<input class="form-control" name="Pago[end]" id="end" type="text" disabled="">
					</div>
				</div>


			</div>
			<div class="box-footer">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar pago' : 'Actualizar pago', array('class'=>'btn btn-primary' , 'tabindex'=>5)); ?>
			</div>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
