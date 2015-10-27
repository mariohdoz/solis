<?php echo CHtml::link('Delete',"#", array( 'confirm' => 'Are you sure?')); ?> <br><br>
<?php echo CHtml::submitButton( 'Modificar cliente', array('confirm'=>'Are you sure you want to save?', 'class'=>'btn btn-primary ')); ?><br><br>
<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'cliente-form',
  'action'=>Yii::app()->createUrl('//cliente/modificar'),
  // Please note: When you enable ajax validation, make sure the corresponding
  // controller action is handling ajax validation correctly.
  // There is a call to performAjaxValidation() commented in generated controller code.
  // See class documentation of CActiveForm for details on this.
  'enableAjaxValidation'=>false,
  )); ?>
<?php echo CHtml::submitButton('Modificar cliente', array('confirm'=>'Are you sure you want to save?',"class"=>"btn btn-primary")) ?>
<?php echo CHtml::submitButton('Guardar', array('confirm'=>'¿Está seguro de guardar las modificaciones?','class'=>'btn btn-success')); ?>

<?php $this->endWidget(); ?>
<br><br>
<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'cliente-form',
  'action'=>Yii::app()->createUrl('//cliente/modificar'),
  // Please note: When you enable ajax validation, make sure the corresponding
  // controller action is handling ajax validation correctly.
  // There is a call to performAjaxValidation() commented in generated controller code.
  // See class documentation of CActiveForm for details on this.
  'enableAjaxValidation'=>false,
  )); ?>
  <div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Modificar propietadad</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <br>
                    <p>Dirección de la propiedad</p>
                    <?php echo $form->dropDownList($model,'rut_cliente', CHtml::listData(Cliente::model()->findAll(array('order' => 'rut_cliente')),'rut_cliente','FullName' ), array("class"=>"form-control select2"),
                        array('empty' => '(Seleccione tipo de servicio)'));?>
                    <?php echo $form->error($model,'rut_cliente'); ?>
                    <br>
                    <div class="center-block">
                      <?php echo CHtml::submitButton('Modificar cliente',array("class"=>"btn btn-primary")) ?>
                    </div>
                    <?php $this->endWidget(); ?>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="pull-right">
        </div>
    </div>
  </div>
