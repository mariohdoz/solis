<?php
/* @var $this ArriendoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Arriendos',
);

$this->menu=array(
	array('label'=>'Create Arriendo', 'url'=>array('create')),
	array('label'=>'Manage Arriendo', 'url'=>array('admin')),
);
?>

<h1>Arriendos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
