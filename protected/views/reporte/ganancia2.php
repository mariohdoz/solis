<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Ganancias
            <small>Reporte de ganancias.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?r=intra/index">
                    <i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Propiedades</li>
            <li class="active">Reportes</li>
            <li class="active">Ganancias</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Flujo de caja por rango de fecha</h3>
                    </div>
                    <div class="form">
                        <div class="box-body">

                            <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'arriendo-form',
                                // Please note: When you enable ajax validation, make sure the corresponding
                                // controller action is handling ajax validation correctly.
                                // There is a call to performAjaxValidation() commented in generated controller code.
                                // See class documentation of CActiveForm for details on this.
                                'enableAjaxValidation'=>false,
                            )); ?>
                            <div class="col-md-12">
                      				<?php echo $form->errorSummary($model,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>
                      			</div>
                            <div class="col-md-1">
                                <h4>Desde</h4>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group" style="margin-bottom: 20px">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                    <?php echo $form->dateField($model,'inicio', array('class'=>'form-control', 'tabindex'=>2)); ?>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <h4>Hasta</h4>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group " style="margin-bottom: 20px">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                    <?php echo $form->dateField($model,'final', array('class'=>'form-control', 'tabindex'=>2)); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                              <?php echo CHtml::submitButton( 'Reporte', array('class'=>'btn btn-google-plus' )); ?>
                            </div>

                        </div>
                        <div class="box-footer">

                        </div>

                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Flujo de caja por mes</h3>
                    </div>
                    <div class="form">
                        <div class="box-body">
                            <div class="col-md-12">
                              <?php echo $form->errorSummary($model,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>
                            </div>
                            <div class="col-md-1">
                                <h4>Desde</h4>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group" style="margin-bottom: 20px">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                    <?php echo $form->dateField($model,'inicio', array('class'=>'form-control', 'tabindex'=>2)); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                              <?php echo CHtml::submitButton( 'Reporte', array('class'=>'btn btn-google-plus' )); ?>
                            </div>

                        </div>
                        <div class="box-footer">

                        </div>

                    </div>
                </div>
            </div>
        </div>
            <!-- Inicio se container -->
        <?php $this->endWidget(); ?>
    </section>
</div>
