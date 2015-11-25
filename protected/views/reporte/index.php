<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Reportes
            <small>Cotización.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?r=intra/index">
                    <i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Cotización</li>
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
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                        <div class="box-tools pull-right">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->

                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php $this->widget('zii.widgets.grid.CGridView', array(
                            'id'=>'propiedad-grid',
                            'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css'),
                            'dataProvider'=>$model->search(),
                            'filter'=>$model,
                            'columns'=>array(
                                'id_propiedad',
                                'direccion_propiedad',
                                'numero_propiedad',
                                'tipo_propiedad',
                                'servicio_propiedad',

                                /*
                                'TERRENOCONSTRUIDO',
                                'TIPO',
                                'SERVICIO',
                                'ESTADO',
                                'DESCRIPCION',
                                'COMUNAPROPIEDAD',
                                */
                                array(
                                    'class'=>'CButtonColumn',
                                    'template'=>'{email}',
                                    'buttons'=>array(
                                        'email' => array(
                                            'label'=>'<i class="btn btn-google-plus">Cotizar</i>',
                                            'url'=>'Yii::app()->createUrl("reporte/generarpdf", array("id"=>$data->id_propiedad))'
                                        ),
                                    ),
                                ),
                        ))); ?>

                                         </div><!-- /.box-body -->
                    <div class="box-footer">

                    </div><!-- box-footer -->
                </div><!-- /.box -->
            </div>
        </div>
        <div class="row">

        </div>
        <?php $this->endWidget(); ?>
    </section>
</div>
