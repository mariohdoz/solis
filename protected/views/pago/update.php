<?php
/* @var $this PagoController */
/* @var $model Pago */

$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	$model->id_pago=>array('view','id'=>$model->id_pago),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pago', 'url'=>array('index')),
	array('label'=>'Create Pago', 'url'=>array('create')),
	array('label'=>'View Pago', 'url'=>array('view', 'id'=>$model->id_pago)),
	array('label'=>'Manage Pago', 'url'=>array('admin')),
);
?>

<h1>Update Pago <?php echo $model->id_pago; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>