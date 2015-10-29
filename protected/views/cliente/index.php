
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
            <small>Listado de clientes</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?r=intra/index">
                    <i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Cliente</li>
            <li><a href="?r=intra/index">Gestión</a></li>
            <li class="active">Listado de clientes</li>
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
        'rut_cliente:text:Rut de cliente',
        'nombres_cliente:text:Nombres',
        'apellidos_cliente:text:Apellidos',
        'telefonocelular_cliente:text:Fono celular',
				'domicilio_cliente:text:Domicilio',
				'correo_cliente:text:Correo',
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
