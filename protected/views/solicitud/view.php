<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Vista de solicitud
	    <small>Visualización de la solicitud.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Solicitud</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Vista</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Número de ficha de solicitud <?php echo CHtml::encode($solicitud->id_solicitud); ?></h3>
          </div>
					<div class="form">
						<div class="box-body">
              <?php $form=$this->beginWidget('CActiveForm', array(
              	'id'=>'solicitud-form',
              	// Please note: When you enable ajax validation, make sure the corresponding
              	// controller action is handling ajax validation correctly.
              	// There is a call to performAjaxValidation() commented in generated controller code.
              	// See class documentation of CActiveForm for details on this.
              	'enableAjaxValidation'=>true,
                  'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                   ),
              )); ?>
              <?php if($solicitud->rut_cliente!=null): ?>
                <div class="col-lg-3 col-md-6 col-xs-12">
                  <div class="form-group">
                    <?php echo $form->label(  $solicitud, 'rut_cliente'); ?>
                    <?php echo $form->textField( $solicitud, 'rut_cliente' , array('class'=>'form-control','disabled' => true  )); ?>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                  <div class="form-group">
                    <?php echo $form->label(  $cliente, 'nombres_cliente'); ?>
                    <?php echo $form->textField( $cliente, 'nombres_cliente' , array('class'=>'form-control','disabled' => true  )); ?>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                  <div class="form-group">
                    <?php echo $form->label(  $cliente, 'apellidos_cliente'); ?>
                    <?php echo $form->textField( $cliente, 'apellidos_cliente' , array('class'=>'form-control','disabled' => true  )); ?>
                  </div>
                </div>
              <?php endif; ?>
              <?php if($solicitud->rut_funcionario!=null): ?>
                <div class="col-lg-3 col-md-6 col-xs-12">
                  <div class="form-group">
                    <?php echo $form->label(  $solicitud, 'rut_funcionario'); ?>
                    <?php echo $form->textField( $solicitud, 'rut_funcionario' , array('class'=>'form-control','disabled' => true  )); ?>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                  <div class="form-group">
                    <?php echo $form->label(  $funcionario, 'nombres_funcionario'); ?>
                    <?php echo $form->textField( $funcionario, 'nombres_funcionario' , array('class'=>'form-control','disabled' => true  )); ?>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                  <div class="form-group">
                    <?php echo $form->label(  $funcionario, 'apellidos_funcionario'); ?>
                    <?php echo $form->textField( $funcionario, 'apellidos_funcionario' , array('class'=>'form-control','disabled' => true  )); ?>
                  </div>
                </div>
              <?php endif; ?>
              <?php if($solicitud->nombres_solicitud!=null): ?>
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                  <?php echo $form->label(  $solicitud, 'nombres_solicitud'); ?>
                  <?php echo $form->textField( $solicitud, 'nombres_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                  <?php echo $form->label(  $solicitud, 'apellidos_solicitud'); ?>
                  <?php echo $form->textField( $solicitud, 'apellidos_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                  <?php echo $form->label(  $solicitud, 'telefono_solicitud'); ?>
                  <?php echo $form->textField( $solicitud, 'telefono_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                  <?php echo $form->label(  $solicitud, 'correo_solicitud'); ?>
                  <?php echo $form->textField( $solicitud, 'correo_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
                </div>
              </div>
            <?php endif; ?>
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                  <?php echo $form->label(  $solicitud, 'servicio_solicitud'); ?>
                  <?php echo $form->textField( $solicitud, 'servicio_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                  <?php echo $form->label(  $solicitud, 'fecha_solicitud'); ?>
                  <?php echo $form->textField( $solicitud, 'fecha_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                  <?php echo $form->label(  $solicitud, 'fechaejecucion_solicitud'); ?>
                  <?php echo $form->textField( $solicitud, 'fechaejecucion_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                  <?php echo $form->label(  $solicitud, 'estado_solicitud'); ?>
                  <?php echo $form->textField( $solicitud, 'estado_solicitud' , array('class'=>'form-control','disabled' => true, 'value'=>$solicitud->estado_solicitud? 'Pendiente':'Terminada', )); ?>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                  <?php echo $form->label(  $solicitud, 'tipopropiedad_solicitud'); ?>
                  <?php echo $form->textField( $solicitud, 'tipopropiedad_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group">
                  <?php echo $form->label(  $solicitud, 'descripcion_solicitud'); ?>
                  <?php echo $form->textArea( $solicitud, 'descripcion_solicitud' , array('rows' => 4,'class'=>'form-control','disabled' => true  )); ?>
                </div>
              </div>
					  </div>
            <div class="box-footer">
              <?php echo CHtml::link('Completar solicitud', array('/solicitud/realizada','id'=>$solicitud->id_solicitud), array('class'=>'btn btn-primary')); ?>
							<?php echo CHtml::link('Actualizar solicitud', array('/solicitud/update/', 'id'=>$solicitud->id_solicitud), array('class'=>'btn btn-info', 'confirm' => '¿Está seguro de actualizar la solicitud?')); ?>
							<?php echo CHtml::link("Eliminar solicitud", '#', array(
									'submit'=>array('/solicitud/delete', "id"=>$solicitud->id_solicitud),
									'class'=>'btn btn-danger',
									'confirm' => '¿Está seguro de eliminar la solicitud?'
									)
							);?>
            </div>
				  </div>
			  </div>
      </div>
      <?php $this->endWidget(); ?>

      <!-- término se container -->
      <?php if($solicitud->rut_cliente!=null): ?>
      <div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos del cliente</h3>
          </div>
					<div class="form">
						<div class="box-body">
              <?php $this->widget('zii.widgets.CDetailView', array(
                 'data' => $cliente,
                 'htmlOptions' => array('class' => 'table-striped table-condensed table-responsive table table-hover'),
                 'attributes' => array(
                   array(
                     'label'=>'RUT',
                      'value' =>  CHtml::link($cliente->rut_cliente,array('/cliente/view/', 'id'=>$cliente->rut)) ,
                      'type'=>'raw'
                   ),
                   array(
                     'header'=>'Nombre completo',
                     'name'=>'nombres_cliente',
                     'value'=>$cliente->nombres_cliente.' '.$cliente->apellidos_cliente,
                   ),
                   'telefonocelular_cliente',
                   'domicilio_cliente',
                   'correo_cliente'
                 )
             )); ?>
					  </div>
            <div class="box-footer">
            </div>
				  </div>
			  </div>
      </div>
    <?php endif; ?>
    <?php if($solicitud->rut_funcionario!=null): ?>
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Datos del funcionario</h3>
        </div>
        <div class="form">
          <div class="box-body">
            <?php $this->widget('zii.widgets.CDetailView', array(
               'data'=>$funcionario,
               'htmlOptions' => array('class' => 'table-striped table-condensed table-responsive table table-hover'),
               'attributes'=>array(
                 array(
                   'label'=>'RUT',
                    'value' =>  CHtml::link($funcionario->rut_funcionario,array('/funcionario/view/', 'id'=>$funcionario->rut)) ,
                    'type'=>'raw'
                 ),
                 array(
                   'header'=>'Nombre completo',
                   'name'=>'nombres_funcionario',
                   'value'=>$funcionario->nombres_funcionario.' '.$funcionario->apellidos_funcionario,
                 ),
                'telefonocelular_funcionario',
                'correo_funcionario',
                'cargo_funcionario',

               ),
               )); ?>
          </div>
          <div class="box-footer">
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
    </div>
  </section>
</div>
