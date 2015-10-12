<?php
if(!yii::app()->session['activo'])
    $this->redirect('?r=site/index');;
?>
<?php
/* @var $this PropiedadController */
/* @var $model Propiedad */

$this->breadcrumbs=array(
	'Propiedads'=>array('index'),
	$model->id_propiedad=>array('view','id'=>$model->id_propiedad),
	'Update',
);

$this->menu=array(
	array('label'=>'List Propiedad', 'url'=>array('index')),
	array('label'=>'Create Propiedad', 'url'=>array('create')),
	array('label'=>'View Propiedad', 'url'=>array('view', 'id'=>$model->id_propiedad)),
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
        <section class='content'>
          <div class="box box-default">
            <div class="box-header with-border">
          			<h3 class="box-title">Modificar imágenes de la propiedad</h3>
          	</div>
            <div class="box-body">
              <div class="row">
                <?php
                $ruta = Imagen::model()->findByAttributes(array('id_propiedad'=>$model->id_propiedad,),array('order' => 'id_imagen ASC','limit' => '1',));
                 echo CHtml::image(Yii::app()->baseUrl."/images/propiedades/".$ruta->url_imagen); ?>
                 <?php $this->widget('ext.SAImageDisplayer', array(
                      'image' => 'p274.jpg',
                      'size' => 'thumb',
                  )); ?>
              </div>
            </div>
          </div>
        </section>
    </div>
