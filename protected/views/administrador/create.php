

<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Configuración
	    <small>Registro de administrador.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Administración</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Registro</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
      <?php $this->renderPartial('_form', array('administrador'=>$administrador)); ?>
      <!-- término se container -->
    </div>
  </section>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.Rut.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
  $("#Administrador_rut_admin").Rut({
  	on_error: function(){
  		alert('El RUT ingresado es incorrecto.');
  		$("#Administrador_rut_admin").val('');
  	},
  });
  $("#Administrador_rut_admin").click(function(){
  	$("#Administrador_rut_admin").val('');
  });

  $("#Administrador_repeat_pass").keyup(function(){
  	if ($("#Administrador_repeat_pass").val()!== $('#Administrador_contrasena_admin').val() ) {
  		if (!$("#tool").hasClass('has-error')) {
  			$("#tool").toggleClass(' has-error');
  		}
  		if ($("#tool").hasClass('has-success')) {
  			$("#tool").toggleClass('has-success');
  		}
  	}else {
  		if ($("#tool").hasClass('has-error')) {
  			$("#tool").toggleClass(' has-error');
  		}
  		if (!$("#tool").hasClass('has-success')) {
  			$("#tool").toggleClass('has-success');
  		}
  	}
  });
});


</script>
