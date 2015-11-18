<?php
/* @var $this FuncionarioController */
/* @var $model Funcionario */

$this->breadcrumbs=array(
	'Funcionarios'=>array('index'),
	$model->rut_funcionario=>array('view','id'=>$model->rut_funcionario),
	'Update',
);

$this->menu=array(
	array('label'=>'List Funcionario', 'url'=>array('index')),
	array('label'=>'Create Funcionario', 'url'=>array('create')),
	array('label'=>'View Funcionario', 'url'=>array('view', 'id'=>$model->rut_funcionario)),
	array('label'=>'Manage Funcionario', 'url'=>array('admin')),
);
?>

<h1>Update Funcionario <?php echo $model->rut_funcionario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>