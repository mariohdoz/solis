
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Configuración
			<small>Perfil de usuario.</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="?r=intra/index">
					<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Configuración Usuario</li>
		</ol>
	</section>
	<section class="content">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'admin-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>false,
		)); ?>

		<div class="row">
			<div class="col-md-12">
				<?php if(($msgs=Yii::app()->user->getFlashes())!=null): ?>
					<?php foreach($msgs as $type => $message):?>
						<div class="alert alert-<?php echo $type;?>" style="margin-left: 10px; margin-right: 10px ">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong><?php
								if($type == 'error'){
									echo 'Error';
								}elseif ($type == 'success'){
									echo 'Éxito';
								};
								?> !</strong> <?php echo $message;?>.
						</div>
					<?php endforeach;?>
				<?php endif; ?>
				<div class="box  box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Perfil de usuario : </h3><b> <?php echo $model->nombres_admin,' ', $model->apellidos_admin ?></b>
						<div class="box-tools pull-right">


						</div><!-- /.box-tools -->
					</div><!-- /.box-header -->
					<div class="box-body" >
						<?php echo $form->errorSummary($model,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>
						<div class="col-md-2">
							<div class="center-block imagen">
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $model->perfil_admin ?>"  class="img-thumbnail" alt="Imagen de usuario" />
								</br>
								</br>

							</div>

						</div>
						<div class="col-md-10">
							<div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
								<span class="input-group-addon" id="basic-addon1">Nombres: </span>
								<?php echo $form->textField($model,'nombres_admin',array('class'=>'form-control','disabled'=>'true','tabindex'=>2,'id'=>'uno' )); ?>
							</div>
							<div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
								<span class="input-group-addon" id="basic-addon1">Apellidos: </span>
								<?php echo $form->textField($model,'apellidos_admin',array('class'=>'form-control','disabled'=>'true','tabindex'=>2,'id'=>'dos' )); ?>
							</div>
							<div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-at"></i></span>
								<?php echo $form->textField($model,'correo_admin', array('class'=>'form-control','disabled'=>'true', 'tabindex'=>5, 'placeholder'=>'Repita la nueva contraseña','id'=>'seis')); ?>
							</div>
							<div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone"></i></span>
								<?php echo $form->textField($model,'telefono_admin', array('class'=>'form-control','disabled'=>'true', 'tabindex'=>5, 'placeholder'=>'Repita la nueva contraseña','id'=>'siete')); ?>
							</div>
							<?php
							$data = explode('-',$model->rut_admin);

							echo CHtml::link("Actualzar", array("administrador/update",'id'=>$data[0]), array('class'=>'btn btn-primary')); ?>
						</div>



					</div><!-- /.box-body -->
					<div class="box-footer">

					</div><!-- box-footer -->
				</div><!-- /.box -->
			</div>
			<?php $this->endWidget(); ?>
		</div>
		<div class="row">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'funcionario-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			)); ?>
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Usuarios del sistema</h3>
					</div>
					<div class="form">
						<div class="box-body">
							<?php $this->widget('zii.widgets.grid.CGridView', array(
								'id'=>'admin-grid',
								'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
								'dataProvider'=>$model->search(),
								'filter'=>$model,
								'columns'=>array(
									'rut_admin',
									'nombres_admin',
									'apellidos_admin',
									'correo_admin',


									array(
										'header'=>'Actualizar',
										'class'=>'CButtonColumn',
										'template'=>'{buscar}  {actualizar}  {eliminar}',
										'buttons'=>array(
											'eliminar' => array(
												'label'=>'<i class="fa fa-trash-o"></i>',
												'url'=>'Yii::app()->createUrl("propiedad/eliminar", array("id"=>$data->rut_admin))',
											),
											'actualizar' => array(
												'label'=>'<i class="fa fa-pencil-square-o"></i>',
												'url'=>'Yii::app()->createUrl("propiedad/update", array("id"=>$data->rut_admin))',
											),
											'buscar' => array(
												'label'=>'<i class="fa fa-eye"></i>',
												'url'=>'Yii::app()->createUrl("propiedad/view", array("id"=>$data->rut_admin))',
											),
										),
									),
								),
							)); ?>

						</div>
						<div class="box-footer">
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->endWidget(); ?>
	</section>
</div>

<script>
	$('#Administrador_contrasena_Administrador').ready(function(){
		$('#Administrador_contrasena_Administrador').val('');
	});
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
</script>
