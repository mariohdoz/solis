<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->rut_cliente,
);

$this->menu=array(
	array('label'=>'List Cliente', 'url'=>array('index')),
	array('label'=>'Create Cliente', 'url'=>array('create')),
	array('label'=>'Update Cliente', 'url'=>array('update', 'id'=>$model->rut_cliente)),
	array('label'=>'Delete Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rut_cliente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cliente', 'url'=>array('admin')),
);
?>

<div class="content-wrapper">
	<section class="content-header">
		<h1>Configuración<small>Registrar Propietario</small></h1>
		<ol class="breadcrumb">
			<li><a href="?r=intra/index"><i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Clientes</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Registrar Propietario</li>
		</ol>
	</section>
  <section class="content">
  <div class="callout callout-danger">
    <h4>Está seguro de eliminar el cliente!</h4>
    <p>Una vez eliminado el cliente, sus respectivas propiedades también se eliminarán.</p>
  </div>
	<?php if(($msgs=Yii::app()->user->getFlashes())!=null): ?>
		<?php foreach($msgs as $type => $message):?>
			<div class="alert alert-<?php echo $type;?>">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo ucfirst($type)?></strong> <?php echo $message;?>.
			</div>
		<?php endforeach;?>
	<?php endif; ?>
	<?php $this->renderPartial('_vista', array('model'=>$model)); ?>
  <?php
  $data = explode('-',$model->rut_cliente);
  $form=$this->beginWidget('CActiveForm', array(
      'id'=>'update-form',
      'action'=>Yii::app()->createUrl('/cliente/desa/'.$data[0]),
      // Please note: When you enable ajax validation, make sure the corresponding
      // controller action is handling ajax validation correctly.
      // There is a call to performAjaxValidation() commented in generated controller code.
      // See class documentation of CActiveForm for details on this.
      'enableAjaxValidation'=>false,
  )); ?>
  <div class="box-footer">
    <div class="pull-left">
      <div class="row buttons" style="margin-left: 10px ">
        <?php echo CHtml::submitButton('Eliminar', array('class'=>'btn btn-danger')); ?>
        &nbsp;&nbsp;
        <?php $this->widget('application.extensions.data.EBackButtonWidget'); ?>
      </div>
    </div>
  </div>
  <?php $this->endWidget(); ?>
</div>
</div><!-- /.box -->
</section>

</div>
