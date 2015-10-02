<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
if(!Yii::app()->session['activo'])
    $this->redirect('?r=site/index');;
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Configuración<small>Registrar Propietario</small></h1>
        <ol class="breadcrumb">
            <li><a href="?r=intra/index">
            <i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Clientes</li>
            <li><a href="?r=intra/index">Gestión</a></li>
            <li class="active">Registrar Propietario</li>
        </ol>
    </section>
    <section class="content">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'propiedad-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
        )); ?>
        <div class="box box-default">

            <div class="box-header with-border">
                <h3 class="box-title">Registro de propietario</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="info" style="text-align:left;">
                <?php
                $flashMessages = Yii::app()->user->getFlashes();
                if ($flashMessages) {
                    echo '<ul class="flashes">';
                    foreach($flashMessages as $key => $message) {
                        echo '<li><div class="flash-' . $key . '">' . $message . "</div></li>\n";
                    }
                    echo '</ul>';
                }
                ?>
                </div>

                <?php echo $form->errorSummary($model); ?>
                <?php $ruta = Yii::app()->request->pathInfo; ?>
                <div class="row">
                    <div class="col-md-6"> <!-- se trabaja de dos -->
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'RUTCLIENTE'); ?>
                            <?php echo $form->textField($model,'RUTCLIENTE', array("class"=>"form-control select2")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'APELLIDOSCLIENTE'); ?>
                            <?php echo $form->textField($model,'APELLIDOSCLIENTE', array("class"=>"form-control select2")); ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'NOMBRESCLIENTE'); ?>
                            <?php echo $form->textField($model,'NOMBRESCLIENTE', array("class"=>"form-control select2")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'TELEFONOCLIENTE'); ?>
                            <?php echo $form->textField($model,'TELEFONOCLIENTE', array("class"=>"form-control select2")); ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'DIRECCIONCLIENTE'); ?>
                            <?php echo $form->textField($model,'DIRECCIONCLIENTE', array("class"=>"form-control select2")); ?>
                        </div>
                        <div class="form-group">
                          <?php echo $form->labelEx($model,'correo_cliente'); ?>
                          <?php echo $form->textField($model,'correo_cliente',array("class"=>"form-control select2")); ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <?php echo $form->labelEx($model,'estadoCivil_cliente'); ?>
                      			<?php echo $form->textField($model,'estadoCivil_cliente',array("class"=>"form-control select2")); ?>
                        </div>
                        <div class="form-group">
                          <?php echo $form->labelEx($model,'profesion_cliente'); ?>
                      		<?php echo $form->textField($model,'profesion_cliente',array("class"=>"form-control select2")); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <?php echo $form->labelEx($model,'telefonoCelular_cliente'); ?>
                      		<?php echo $form->textField($model,'telefonoCelular_cliente',array("class"=>"form-control select2")); ?>
                        </div>
                        <div class="form-group">
                          <?php echo $form->labelEx($model,'nroCuenta_cliente'); ?>
                      		<?php echo $form->textField($model,'nroCuenta_cliente',array("class"=>"form-control select2")); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <?php echo $form->labelEx($model,'banco_cliente'); ?>
                      		<?php echo $form->textField($model,'banco_cliente',array("class"=>"form-control select2")); ?>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                        <div class="row buttons">
                            <?php echo CHtml::submitButton('Guardar', array("class"=>"boton2") ); ?>
                            <?php $this->widget('application.ext.data.EBackButtonWidget'); ?>
                        </div>
                        <?php $this->endWidget(); ?>

                    </div>
                </div>
                </div>

        </div><!-- /.box -->
    </section>
</div>
