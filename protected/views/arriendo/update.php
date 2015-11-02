<?php
/* @var $this ArriendoController */
/* @var $model Arriendo */

$this->breadcrumbs=array(
	'Arriendos'=>array('index'),
	$model->id_arriendo=>array('view','id'=>$model->id_arriendo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Arriendo', 'url'=>array('index')),
	array('label'=>'Create Arriendo', 'url'=>array('create')),
	array('label'=>'View Arriendo', 'url'=>array('view', 'id'=>$model->id_arriendo)),
	array('label'=>'Manage Arriendo', 'url'=>array('admin')),
);
?>

<h1>Update Arriendo <?php echo $model->id_arriendo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>