<div class="modal fade modal-Default" id="contrasena" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 style="text-align: center">Cambio de contraseña</h4>
				<div class="form-horizontal">
          <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'contrasena-form',
            'action'=>Yii::app()->request->baseUrl.'/administrador/cambio/'.$model->rut,
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
   			 		<?php echo $form->passwordField($model,'contrasena_admin',array('class'=>'form-control', 'placeholder'=>'Constraseña del funcionario',)); ?>
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

<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Actualizar
			<small>Actualizar el <?php echo Yii::app()->session['funcionario']? 'funcionario':'administrador' ?> <?php echo CHtml::encode($model->formato); ?>.</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
					<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Administrador</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Actualizar</li>
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
			<?php $this->renderPartial('_form', array('administrador'=>$model)); ?>
			<!-- término se container -->
		</div>
	</section>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.Rut.min.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
	$('#Administrador_contrasena_admin').val('');
	$("#Administrador_repeat_pass").keyup(function(){
		if ($("#Administrador_repeat_pass").val()!== $('#Administrador_contrasena_admin').val() ) {
			if (!$("#box").hasClass('has-error')) {
				$("#box").toggleClass(' has-error');
			}
			if ($("#box").hasClass('has-success')) {
				$("#box").toggleClass('has-success');
			}
		}else {
			if ($("#box").hasClass('has-error')) {
				$("#box").toggleClass(' has-error');
			}
			if (!$("#box").hasClass('has-success')) {
				$("#box").toggleClass('has-success');
			}
		}
	});
	$('#Administrador_rut_admin').click(function(){
		$('#Administrador_rut_admin').val('');
	});
	$("#Administrador_rut_admin").Rut({
  	on_error: function(){
  		alert('El RUT ingresado es incorrecto.');
  		$("#Administrador_rut_admin").val('');
  	},
  });
});
</script>
