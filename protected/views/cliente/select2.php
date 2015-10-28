<div class="content-wrapper">
  <section class="content-header">
      <h1>
          Configuración
          <small>Seleccionar cliente</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="?r=intra/index"><i class="fa fa-dashboard"></i>Inicio</a></li>
          <li class="active">Clientes</li>
          <li><a href="?r=intra/index">Eliminar clientes</a></li>
          <li class="active">Seleccionar cliente</li>
      </ol>
  </section>
  <section class="content">
    <?php $form=$this->beginWidget('CActiveForm', array(
      'id'=>'cliente-form',
      'action'=>Yii::app()->createUrl('//cliente/eliminar'),
      // Please note: When you enable ajax validation, make sure the corresponding
      // controller action is handling ajax validation correctly.
      // There is a call to performAjaxValidation() commented in generated controller code.
      // See class documentation of CActiveForm for details on this.
      'enableAjaxValidation'=>false,
      )); ?>
      <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Eliminar cliente</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <br>
                  <p>Información del cliente</p>
                <?php echo $form->dropDownList($model,'rut_cliente', CHtml::listData(Cliente::model()->findAll(array('order' => 'rut_cliente')),'rut_cliente','FullName' ), array("class"=>"form-control select2"),
                    array('empty' => '(Seleccione tipo de servicio)'));?>
                <?php echo $form->error($model,'rut_cliente'); ?>
                <div class="center-block"><br>
                  <?php echo CHtml::submitButton('Eliminar cliente', array('confirm'=>'¿Está seguro de realizar los cambios?',"class"=>"btn btn-primary")) ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
            <div class="pull-right">
            </div>
        </div>
      </div>
      <?php $this->endWidget(); ?>
  </section>
</div>
