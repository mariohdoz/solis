
<?php
if(!Yii::app()->session['activo'])
    $this->redirect('?r=site/index');;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Configuración
            <small>Registrar propiedad </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?r=intra/index">
                    <i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Propiedades</li>

            <li><a href="?r=intra/index">Gestión</a></li>
            <li class="active">Registrar propiedad</li>
        </ol>
    </section>
    <section class="content">
    <?php
/* @var $this PropiedadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Propiedads',
);

$this->menu=array(
	array('label'=>'Create Propiedad', 'url'=>array('create')),
	array('label'=>'Manage Propiedad', 'url'=>array('admin')),
);
?>

<h1>Propiedades</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        'id_propiedad:number:Id',
        'rut_cliente:text:Propiedario',
        'direccion_propiedad:text:Dirección',
        'tipo_propiedad:text:Tipo de propiedad',
        'servicio_propiedad:text:Servicio prestado',
        array('header'=>'Estado','name'=>'Estado','value' => '$data->estado_propiedad?Yii::t(\'app\',\'Disponible\'):Yii::t(\'app\', \'Ocupado\')',
            'filter' => array('0' => Yii::t('app', 'Ocupado'), '1' => Yii::t('app', 'Disponible')),
            'htmlOptions' => array('style' => "text-align:center;"), ),
        array(
          'class'=>'CButtonColumn',
          'header'=>'Operaciones',
          'template'=>'{ver}{modificar}{eliminar}',
          'buttons'=>array(
            'ver'=>array(
              'label'=>'ver',
            ),
          )
        ),
    ),
));?>
        </section>
    </div>
