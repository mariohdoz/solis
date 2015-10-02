<?php
/* @var $this ClienteController */
/* @var $data Cliente */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('RUTCLIENTE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->RUTCLIENTE), array('view', 'id'=>$data->RUTCLIENTE)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRESCLIENTE')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRESCLIENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('APELLIDOSCLIENTE')); ?>:</b>
	<?php echo CHtml::encode($data->APELLIDOSCLIENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TELEFONOCLIENTE')); ?>:</b>
	<?php echo CHtml::encode($data->TELEFONOCLIENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DIRECCIONCLIENTE')); ?>:</b>
	<?php echo CHtml::encode($data->DIRECCIONCLIENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CORREOCLIENTE')); ?>:</b>
	<?php echo CHtml::encode($data->CORREOCLIENTE); ?>
	<br />


</div>