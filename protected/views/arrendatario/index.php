<?php
/* @var $this ArrendatarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Arrendatarios',
);

$this->menu=array(
	array('label'=>'Create Arrendatario', 'url'=>array('create')),
	array('label'=>'Manage Arrendatario', 'url'=>array('admin')),
);
?>

<h1>Arrendatarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
