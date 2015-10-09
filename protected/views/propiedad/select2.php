<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Configuración
            <small>Seleccionar propiedad </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?r=intra/index">
                    <i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Propiedades</li>
            <li><a href="?r=intra/index">Eliminar propiedad</a></li>
            <li class="active">Seleccionar propiedad</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'Propiedad-form',
        'action'=>Yii::app()->createUrl('/Propiedad/Desa'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        )); ?>
        <!-- Seleccion de propietario -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Eliminar propietadad</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <br>
                            <p>Dirección de la propiedad</p>
                            <?php echo $form->dropDownList($model,'id_propiedad', CHtml::listData(Propiedad::model()->findAll(array('order' => 'direccion_propiedad')),'id_propiedad','Cliente' ), array("class"=>"form-control select2"),
                                array('empty' => '(Seleccione tipo de servicio)'));?>
                            <?php echo $form->error($model,'id_propiedad'); ?>
                            <br>
                            <div class="center-block">
                              <?php echo CHtml::submitButton('Eliminar propiedad', array('confirm'=> 'Are you Sure', "class"=>"btn btn-danger")); ?>
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
        </div><!-- /.box -->
        <!-- Termino de agregar prop -->
    </section><!-- termina la segunda seccion -->
</div>
