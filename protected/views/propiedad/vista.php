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

        <div class="view">

            <?php
            /* @var $this PropiedadController */
            /* @var $model Propiedad */

            $this->breadcrumbs=array(
                'Propiedads'=>array('index'),
                $model->IDPROP,
            );

            $this->menu=array(
                array('label'=>'List Propiedad', 'url'=>array('index')),
                array('label'=>'Create Propiedad', 'url'=>array('create')),
                array('label'=>'Update Propiedad', 'url'=>array('update', 'id'=>$model->IDPROP)),
                array('label'=>'Delete Propiedad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDPROP),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage Propiedad', 'url'=>array('admin')),
            );
            ?>

            <h1>Propiedad de
                <?php

                Cliente::model()->findByAttributes(
                    array('NOMBRESCLIENTE'=>$firstName,'APELLIDOSCLIENTE'=>$lastName),
                    array('condition'=>'RUTCLIENTE=:status',
                        'params'=>array(':status'=>$model->RUTCLIENTE)
                    )
                );
                echo $firstName." ".$lastName;


                ?>
            </h1>

            <?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'attributes'=>array(
                    'IDPROP',
                    'RUTCLIENTE',
                    'DIRECCION',
                    'CANTPIEZA',
                    'CANTBANO',
                    'TERRENO',
                    'TERRENOCONSTRUIDO',
                    'TIPO',
                    'SERVICIO',
                    'ESTADO',
                    'DESCRIPCION',
                    'COMUNAPROPIEDAD',
                ),
            )); ?>
            <div class="box-footer">
                <div class="pull-right">
                    <div class="row buttons">
                        <?php $this->widget('application.ext.data.EBackButtonWidget'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>