<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Actualizar
	    <small>Actualizar el funcionario <?php echo CHtml::encode($model->rut_funcionario); ?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Funcionario</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Registrar</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
      <!-- término se container -->
    </div>
  </section>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.Rut.min.js" type="text/javascript"></script>
<script>
$("#Funcionario_rut_funcionario").Rut({
	on_error: function(){
		alert('El RUT ingresado es incorrecto.');
		$("#Funcionario_rut_funcionario").val('');
	},
})
$("#Funcionario_rut_funcionario").click(function(){
	$("#Funcionario_rut_funcionario").val('');
})

$("#Funcionario_repeat_pass").keyup(function(){
	if ($("#Funcionario_repeat_pass").val()!== $('#Funcionario_contrasena_funcionario').val() ) {
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
</script>
