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
                        <h3 class="box-title">Ganancia Arriendos</h3>
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
                            <?php $this->widget('zii.widgets.grid.CGridView', array(
                                'id'=>'arriendo-grid',
                                'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
                                'dataProvider'=>$model->historico(),
                                'filter'=>$model,
                                'columns'=>array(
                                    'id_propiedad',
                                    'rut_arrendatario',
                                    'fechapago_arriendo',
                                    'inicio_arriendo',
                                    'termino_arriendo',
                                    array(
                                        'header'=>'Valor de arriendo',
                                        'htmlOptions'=>array('width'=>'10'),
                                        'name'=>'valor_arriendo',
                                        'value'=>'Yii::app()->numberFormatter->format("¤#,##0", $data->valor_arriendo, "$ ")',
                                    ),
                                    array(
                                        'header'=>'Estado',
                                        'name'=>'activo_arriendo',
                                        'value' => '$data->activo_arriendo?Yii::t(\'app\',\'Activo\'):Yii::t(\'app\', \'Terminado\')',
                                        'filter' => array('0' => Yii::t('app', 'Terminado'), '1' => Yii::t('app', 'Activo')),
                                        'htmlOptions' => array('style' => "text-align:center;"),
                                    ),									/*
									'inscripcion_arriendo',
									'rut_admin',
									'valor_arriendo',
									*/
                                    array(
                                        'class'=>'CButtonColumn',
                                        'template'=>'{email}',
                                        'buttons'=>array(
                                            'email' => array(
                                                'label'=>'<i class="btn btn-primary">Ver Ganancias</i>',
                                                'url'=>'Yii::app()->createUrl("reporte/select", array("id"=>$data->id_arriendo))'
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
            <!-- Inicio se container -->

        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ganancias en Ventas</h3>
                    </div>
                    <div class="form">
                        <div class="box-body">

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
