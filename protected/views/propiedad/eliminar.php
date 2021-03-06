<?php
/* @var $this propiedadController */
/* @var $model propiedad */

$this->breadcrumbs=array(
	'propiedads'=>array('index'),
	$model->id_propiedad,
);

$this->menu=array(
	array('label'=>'List propiedad', 'url'=>array('index')),
	array('label'=>'Create propiedad', 'url'=>array('create')),
	array('label'=>'Update propiedad', 'url'=>array('update', 'id'=>$model->id_propiedad)),
	array('label'=>'Delete propiedad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_propiedad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage propiedad', 'url'=>array('admin')),
);
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Eliminar
	    <small>Eliminar propiedad de la ficha n° <?php echo $model->id_propiedad;?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">propiedad</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Eliminar propiedad</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
			<div class="col-md-12">
        <div class="callout callout-danger">
          <h4>Está a punto de eliminar al usuario  <?php echo CHtml::encode($model->nombres_admin); ?> perteneciente a <?php echo CHtml::encode($model->rut_cliente); ?>!</h4>

        </div>
      </div>
      <!-- Inicio se container -->
			<div class="col-md-12">
				<?php if(($msgs=Yii::app()->user->getFlashes())!=null): ?>
					<?php foreach($msgs as $type => $message):?>
						<div class="callout callout-<?php echo $type;?>">
							<h4><?php
								if($type == 'danger'){
									echo 'Error';
								}elseif ($type == 'success'){
									echo 'Éxito';
								};
							 ?> !</h4>
							<p><?php echo $message;?></p>
						</div>
					<?php endforeach;?>
				<?php endif; ?>
			</div>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'admin-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			)); ?>
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de la propiedad</h3>
            </div>
            <div class="form">
              <div class="box-body">
                <div class="col-xs-6">
  								<div class="form-group">
  									<?php echo $form->labelEx($model,'servicio_propiedad'); ?>
                    <?php echo $form->dropDownList($model,'servicio_propiedad',
                        array(
                            'Venta' => 'Venta',
                            'Arriendo' => 'Arriendo',
                        ),
                        array("class"=>"form-control select2", 'empty' => 'Seleccione tipo de servicio', 'disabled'=> 'true')); ?>
  								</div>
  							</div>
  							<div class="col-xs-6">
  								<div class="form-group">
  									<?php echo $form->labelEx($model,'tipo_propiedad'); ?>
                    <?php echo $form->dropDownList($model,'tipo_propiedad',
                        array(
                            'Casa' => 'Casa',
                            'Departamento Habitación' => 'Departamento Habitación',
                            'Local' => 'Local',
                            'Oficina Casa' => 'Oficina Casa',
                            'Galpón' => 'Galpón',
                            'Oficina Departamento' => 'Oficina Departamento',
                            'Sitio Comercial' => 'Sitio Comercial',
                            'Sitio Recidencial' => 'Sitio Recidencial',
                            'Propiedad de inversión' => 'Propiedad de inversión',
                            'Terreno' => 'Terreno'
                        ),
                        array("class"=>"form-control select2", 'empty' => 'Seleccione el tipo de propiedad', 'disabled'=> 'true')); ?>
  								</div>
  							</div>
  							<div class="col-xs-6">
  								<div class="form-group">
  									<?php echo $form->labelEx($model,'comuna_propiedad'); ?>
                    <?php echo $form->dropDownList($model,'comuna_propiedad',
                        array(
                            'Antofagasta' => 'Antofagasta',
                            'Calama' => 'Calama',
                            'Iquique' => 'Iquique'
                            ),
                        array("class"=>"form-control select2",  'empty' => 'Seleccione la comuna de la propiedad', 'disabled'=> 'true')); ?>
  								</div>
  							</div>
  							<div class="col-xs-4">
  								<div class="form-group">
  									<?php echo $form->labelEx($model,'direccion_propiedad'); ?>
                    <?php echo $form->textField($model,'direccion_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese la dirección de la propiedad', 'disabled'=> 'true')); ?>
  								</div>
  							</div>
  							<div class="col-xs-2">
  								<div class="form-group">
  									<?php echo $form->labelEx($model,'numero_propiedad'); ?>
                    <?php echo $form->textField($model,'numero_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese el número de direccion', 'disabled'=> 'true')); ?>
  								</div>
  							</div>
  							<div class="col-xs-6">
  								<div class="form-group">
  									<?php echo $form->labelEx($model,'habitacion_propiedad'); ?>
                    <?php echo $form->dropDownList($model,'habitacion_propiedad',
                        array(
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9'
                        ),
                        array("class"=>"form-control select2", 'empty' => 'Cantidad de Habitaciones', 'disabled'=> 'true')); ?>
  								</div>
  							</div>
  							<div class="col-xs-6">
  								<div class="form-group">
  									<?php echo $form->labelEx($model,'bano_propiedad'); ?>
                    <?php echo $form->dropDownList($model,'bano_propiedad',
                        array(
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9'
                        ),
                        array("class"=>"form-control select2", 'empty' => 'Cantidad de baños', 'disabled'=> 'true')); ?>
  								</div>
  							</div>
  							<div class="col-xs-6">
  								<div class="form-group">
  									<?php echo $form->labelEx($model,'terreno_propiedad'); ?>
                    <?php echo $form->textField($model,'terreno_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese el tamaño del terreno', 'disabled'=> 'true')); ?>
  								</div>
  							</div>
  							<div class="col-xs-6">
  								<div class="form-group">
  									<?php echo $form->labelEx($model,'construido_propiedad'); ?>
                    <?php echo $form->textField($model,'construido_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ingrese el tamaño del terreno construido', 'disabled'=> 'true')); ?>
  								</div>
  							</div>
  							<div class="col-xs-6">
  								<div class="form-group">
  									<?php echo $form->labelEx($model, 'valor_propiedad');?>
                    <?php echo $form->textField($model, 'valor_propiedad', array("class"=>"form-control select2", 'placeholder'=>'Ejemplo: 123456', 'disabled'=> 'true'));?>
  								</div>
  							</div>
  							<div class="col-xs-6">
  								<div class="form-group">
  									<label for="Propiedad_amoblado_propiedad">Propiedad amoblada</label><br>
                    <?php echo $form->checkBox($model, 'amoblado_propiedad', array('class'=>'minimal', 'disabled'=> 'true'));?>
  								</div>
  							</div>
  							<div class="col-xs-12">
  								<div class="form-group">
                      <?php echo $form->labelEx($model,'descripcion_propiedad'); ?>
                      <?php echo $form->textarea($model,'descripcion_propiedad', array('rows' => 4, 'class'=> 'form-control description-text ', 'cols'=> 50, 'disabled'=> 'true' )); ?>
  								</div>
  							</div>
              </div>
            </div>
            <div class="box-footer">
              <?php echo CHtml::link("Eliminar propiedad", '#', array(
              'submit'=>array('/propiedad/delete', "id"=>$model->id_propiedad),
              'class'=>'btn btn-danger',
              'confirm' => '¿Está seguro de eliminar la propiedad?'
              )
              );?>
            </div>
          </div>
			  </div>
				<div class="col-md-6">
					<div class="box box-primary">
						<div class="box-header with-border">
	            <h3 class="box-title">Datos del propietario</h3>
	          </div>
						<div class="form">
							<div class="box-body">
								<?php $this->widget('zii.widgets.CDetailView', array(
	      					 'data'=>$model2,
	      					 'htmlOptions' => array('class' => 'table-striped table-condensed table-responsive table table-hover'),
	      					 'attributes'=>array(
	      						 array(
	      							 'label'=>'RUT',
	      								'value' =>  CHtml::link($model2->formato,array('/cliente/view/', 'id'=>$model2->rut)) ,
	      								'type'=>'raw'
	      						 ),
	      						 array(
	      							 'header'=>'Nombre completo',
	      							 'label'=>'Nombre completo',
	      							 'value'=>$model2->nombres_cliente.' '.$model2->apellidos_cliente,
	      						 ),
	      						 'telefonocelular_cliente',
	      						 'correo_cliente',
	      					 ),
	      					 )); ?>
							</div>
	            <div class="box-footer">
	            </div>
					  </div>
				  </div>
	      </div>
				<?php
				if($model->arriendo != null)
				{
				  foreach ($model->arriendo as $key => $value) {
				    echo '<div class="col-md-6">
				      <div class="box box-primary">
				        <div class="box-header with-border">
				          <h3 class="box-title">Arriendo asociado</h3>
				        </div>
				        <div class="form">
				          <div class="box-body">
				            <div class="col-lg-12 col-md-12 col-xs-12">
				              <div class="form-group">';
											$this->widget('zii.widgets.CDetailView', array(
											  'data'=>$value,
											  'htmlOptions' => array('class' => 'table-striped table-condensed table-responsive table table-hover'),
											  'attributes'=>array(
													array(
			       							 'label'=>'Número de ficha',
			       								'value' =>  CHtml::link($value->id_arriendo,array('/arriendo/view/', 'id'=>$value->id_arriendo)) ,
			       								'type'=>'raw'
			       						 ),
											    'fechapago_arriendo',
											    'inicio_arriendo',
											    'termino_arriendo',
											    array('header'=>'Valor',
											      'label'=>'Valor',
											      'value'=>Yii::app()->numberFormatter->format("¤#,##0", $value->valor_arriendo, "$ "),
											    ),
											  ),
											));
				              echo '</div>
				            </div>
				          </div>
				          <div class="box-footer">
				          </div>
				        </div>
				      </div>
				    </div>';
				  }
				}
				?>
				<?php
				if($model->venta != null)
				{
				  foreach ($model->venta as $key => $value) {
				    echo '<div class="col-md-6">
				      <div class="box box-primary">
				        <div class="box-header with-border">
				          <h3 class="box-title">Venta asociado</h3>
				        </div>
				        <div class="form">
				          <div class="box-body">
				            <div class="col-lg-12 col-md-12 col-xs-12">
				              <div class="form-group">';
											$this->widget('zii.widgets.CDetailView', array(
											  'data'=>$value,
											  'htmlOptions' => array('class' => 'table-striped table-condensed table-responsive table table-hover'),
											  'attributes'=>array(
													array(
			       							 'label'=>'Número de ficha',
			       								'value' =>  CHtml::link($value->id_venta,array('/venta/view/', 'id'=>$value->id_venta)) ,
			       								'type'=>'raw'
			       						 ),
												 array(
													 'header'=>'Rute del comprador',
													 'label'=>'RUT del Comprador',
														'value' =>  $value->formato ,
														'type'=>'raw'
												 ),
												 array(
													 'label'=>'RUT de comprador',
														'value' =>  CHtml::link($value->Admin,array('/funcionario/view/', 'id'=>$value->ru)) ,
														'type'=>'raw'
												 ),

											    array('header'=>'Valor',
											      'label'=>'Valor',
											      'value'=>Yii::app()->numberFormatter->format("¤#,##0", $value->ganancia_venta, "$ "),
											    ),
											  ),
											));
				              echo '</div>
				            </div>
				          </div>
				          <div class="box-footer">
				          </div>
				        </div>
				      </div>
				    </div>';
				  }
				}
				?>
			<?php $this->endWidget(); ?>
      <!-- término se container -->
  </section>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.formatCurrency-1.4.0.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/i18n/jquery.formatCurrency.es-CL.js" type="text/javascript"></script>
<script >

</script>
