<?php
/* @var $this OrdentrabajoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ordentrabajos',
);

$this->menu=array(
	array('label'=>'Create Ordentrabajo', 'url'=>array('create')),
	array('label'=>'Manage Ordentrabajo', 'url'=>array('admin')),
);
?>

<h1>Ordentrabajos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
