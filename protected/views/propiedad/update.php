<?php
if(!yii::app()->session['activo'])
    $this->redirect('?r=site/index');;
?>
<?php
/* @var $this PropiedadController */
/* @var $model Propiedad */

$this->breadcrumbs=array(
	'Propiedads'=>array('index'),
	$model->IDPROP=>array('view','id'=>$model->IDPROP),
	'Update',
);

$this->menu=array(
	array('label'=>'List Propiedad', 'url'=>array('index')),
	array('label'=>'Create Propiedad', 'url'=>array('create')),
	array('label'=>'View Propiedad', 'url'=>array('view', 'id'=>$model->IDPROP)),
	array('label'=>'Manage Propiedad', 'url'=>array('admin')),
);
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Configuración
                <small>Modificar propiedad </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="?r=intra/index">
                        <i class="fa fa-dashboard"></i>Inicio</a></li>
                <li class="active">Propiedades</li>

                <li><a href="?r=intra/index">Gestión</a></li>
                <li class="active">Modificar propiedad</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Seleccion de propietario -->
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </section><!-- termina la segunda seccion -->
    </div>
