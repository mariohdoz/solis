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
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Datos del pago correspondiente a la fecha <?php echo CHtml::encode($arriendo->fechapago_arriendo	).'-'.CHtml::encode($model->mes_pago); ?></h3>
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
						<label for="Pago_totalpagar_pago" class="required">Total a pagar</label>
						<input class="form-control" name="Pago[Pago_totalpagar_pago]" id="Pago_totalpagar_pago" type="text"  value="<?php echo CHtml::encode($arriendo->valor_arriendo);?>">
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
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Pagos realizados.</h3>
		</div>
		<div class="form">
			<div class="box-body">
				<?php
				if($arriendo->pago != null)
				{
					foreach ($arriendo->pago as $key => $value) {
						echo '<div class="col-xs-12 col-md-6 col-lg-4"">';
							echo '<ul class="nav nav-pills nav-stacked">';
							$var = $value->activo_pago? 'con deudas' : 'completado';
								echo '<li>'.CHtml::link('<i class="fa fa-money"></i>Fecha de pago '.$value->mes_pago.' se encuentra '.$var , array('arriendo/view/', 'id'=>$value->id_pago)).'</li>';
							echo '</ul>';
						echo '</div>';
					}
				}else {
					echo '<div class="col-xs-12 col-md-12 col-lg-12"">';
						echo '<h3>No tiene ningún pago registrado</h3>';
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

<?php $this->endWidget(); ?>
</div><!-- form -->
