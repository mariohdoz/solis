
<div class="modal fade modal-Default" id="contrasena" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 style="text-align: center">Cambio de contraseña</h4>
				<div class="form-horizontal">
          <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'contrasena-form',
            'action'=>Yii::app()->request->baseUrl.'/funcionario/contra/'.$model->rut,
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
			Configuración
			<small>Perfil de usuario. </small>
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
						<div class="col-md-3">
							<div class="center-block imagen">
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $model->perfil_admin ?>"  class="img-thumbnail" alt="Imagen de usuario" />
								</br>
								</br>
							</div>
						</div>
						<div class="col-md-4">
							<div class="input-group col-xs-12 col-md-12 col-lg-12" style="margin-bottom: 20px">
								<span class="input-group-addon" id="basic-addon1">Nombres: </span>
								<?php echo $form->textField($model,'nombres_admin',array('class'=>'form-control','disabled'=>'true','tabindex'=>2,'id'=>'uno' )); ?>
							</div>
							<div class="input-group col-xs-12 col-md-12 col-lg-12" style="margin-bottom: 20px">
								<span class="input-group-addon" id="basic-addon1">RUT: </span>
								<?php echo $form->textField($model,'formato',array('class'=>'form-control','disabled'=>'true','tabindex'=>2,'id'=>'uno' )); ?>
							</div>
							<div class="input-group col-xs-12 col-md-12 col-lg-12" style="margin-bottom: 20px">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-at"></i></span>
								<?php echo $form->textField($model,'correo_admin', array('class'=>'form-control','disabled'=>'true', 'tabindex'=>5, 'placeholder'=>'Repita la nueva contraseña','id'=>'seis')); ?>
							</div>
						</div>
						<div class="col-md-5">
							<div class="input-group col-xs-12 col-md-12 col-lg-12" style="margin-bottom: 20px">
								<span class="input-group-addon" id="basic-addon1">Apellidos: </span>
								<?php echo $form->textField($model,'apellidos_admin',array('class'=>'form-control','disabled'=>'true','tabindex'=>2,'id'=>'dos' )); ?>
							</div>
							<div class="input-group col-xs-12 col-md-12 col-lg-12" style="margin-bottom: 20px">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone"></i></span>
								<?php echo $form->textField($model,'telefono_admin', array('class'=>'form-control','disabled'=>'true', 'tabindex'=>5, 'placeholder'=>'Repita la nueva contraseña','id'=>'siete')); ?>
							</div>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<?php
						$data = explode('-',$model->rut_admin);
						echo CHtml::link("Actualizar", array("administrador/update",'id'=>$data[0]), array('class'=>'btn btn-primary')); ?>
					</div><!-- box-footer -->
				</div><!-- /.box -->
			</div>
			<?php $this->endWidget(); ?>
		</div>
		<?php if(Yii::app()->session['admin_super']): ?>
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
						<div class="pull-right">
						<?php echo CHtml::link('<i class="fa fa-plus"></i> &nbsp;&nbsp;Agregar usuario ', array('administrador/create'), array('class'=>'btn btn-success')); ?>
						</div>
					</div>
					<div class="form">
						<div class="box-body">
							<?php $this->widget('zii.widgets.grid.CGridView', array(
								'id'=>'admin-grid',
								'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
								'dataProvider'=>$formulario->search(),
								'filter'=>$formulario,
								'columns'=>array(
									'rut_admin',
									'nombres_admin',
									'apellidos_admin',
									'correo_admin',
									array(
                    'header'=>'Estado',
                    'name'=>'fn_admin',
                    'value' => '$data->fn_admin?Yii::t(\'app\',\'Funcionario\'):Yii::t(\'app\', \'Administrador\')',
                    'filter' => array('0' => Yii::t('app', 'Administrador'), '1' => Yii::t('app', 'Funcionario')),
                    'htmlOptions' => array('style' => "text-align:center;"),
                   ),
									array(
                    'header'=>'Actualizar',
                    'class'=>'CButtonColumn',
                    'template'=>'{buscar}  {actualizar}  {eliminar}',
                    'buttons'=>array(
											'eliminar' => array(
													'label'=>'<i class="fa fa-trash-o"></i>',
													'url'=>'Yii::app()->createUrl("administrador/eliminar", array("id"=>$data->rut))',
											),
                      'actualizar' => array(
                          'label'=>'<i class="fa fa-pencil-square-o"></i>',
                          'url'=>'Yii::app()->createUrl("administrador/update", array("id"=>$data->rut))',
                      ),
											'buscar' => array(
													'label'=>'<i class="fa fa-eye"></i>',
													'url'=>'Yii::app()->createUrl("administrador/view", array("id"=>$data->rut))',
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
	<?php endif; ?>
	</section>
</div>

<script>
	$(document).ready(function() {

	});
</script>
