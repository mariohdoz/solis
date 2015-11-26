<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Configuración
	    <small>Vista de arriendo de la propiedad de la ficha número .</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Clientes</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Registrar Propietario</li>
	  </ol>
  </section>
  <section id="cd-placeholder-5" class="cd-section cd-container">
		<h1>Contáctenos</h1>

			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'solicitud-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>true,
        'clientOptions'=>array('validateOnSubmit'=>true),
			)); ?>

		<div class="col-md-12">
			<div class="form-horizontal col-md-4">
				<form role="form">
					<div class="form-group">
						<label style="float: left">Nombres</label>
						<?php echo $form->textField($model,'nombres_solicitud', array("class"=>"form-control2", "placeholder"=>"Nombres")); ?>
					</div>
					<div  class="form-group">
						<label style="float: left">Apellidos</label>
						<?php echo $form->textField($model,'apellidos_solicitud', array("class"=>"form-control2", "placeholder"=>"Apellidos")); ?>
					</div>
					<div class="form-group">
						<label style="float: left">Servicio a solicitar</label>
						<?php echo $form->dropDownList($model,'servicio_solicitud',
							array(
								'Venta' => 'Venta',
								'Arriendo' => 'Arriendo',
								'Tasación' => 'Tasación',
								'Estudio de título' => 'Estudio de título',
								'Ampliaciones menores' => 'Ampliaciones menores',
								'Aseo de propiedad' => 'Aseo de propiedad',
							),
							array("class"=>"form-control2 "),
							array('empty' => '(Seleccione tipo de servicio)')); ?>
              <?php echo $form->error($model,'servicio_solicitud'); ?>
					</div>
					<div  class="form-group">
						<label style="float: left">Teléfono de contacto</label>
						<?php echo $form->textField($model,'telefono_solicitud', array("class"=>"form-control2", "placeholder"=>"Teléfono de contacto")); ?>
					</div>
					<div  class="form-group">
						<label style="float: left">Correo electrónico</label>
						<?php echo $form->emailField($model,'correo_solicitud', array("class"=>"form-control2", "placeholder"=>"Correo de contacto")); ?>
					</div>
					<div  class="form-group">
						<label style="float: left">Comentario</label>
						<?php echo $form->textArea($model,'descripcion_solicitud',array("rows"=>"3"), array("class"=>"form-control2", "placeholder"=>"Comentario")); ?>
            <?php echo $form->error($model,'descripcion_solicitud'); ?>

					</div>
					<div  class="form-group">
            <?php echo CHtml::submitButton('Enviar', array('class' =>'btn btn-buscar' , )); ?>
					</div>
			</div>
			</form>

			</div>
		</div>
		<?php $this->endWidget(); ?>
	</section> <!-- #cd-placeholder-5 -->
</div>
