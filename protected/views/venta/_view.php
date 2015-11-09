<?php
/* @var $this VentaController */
/* @var $data Venta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_venta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_venta), array('view', 'id'=>$data->id_venta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->id_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_admin')); ?>:</b>
	<?php echo CHtml::encode($data->rut_admin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombrescomprador_venta')); ?>:</b>
	<?php echo CHtml::encode($data->nombrescomprador_venta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellidoscomprador_venta')); ?>:</b>
	<?php echo CHtml::encode($data->apellidoscomprador_venta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rutcomprador_venta')); ?>:</b>
	<?php echo CHtml::encode($data->rutcomprador_venta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comisioncomprador_venta')); ?>:</b>
	<?php echo CHtml::encode($data->comisioncomprador_venta); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('comisioncliente_venta_')); ?>:</b>
	<?php echo CHtml::encode($data->comisioncliente_venta_); ?>
	<br />

	*/ ?>

</div>