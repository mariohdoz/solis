<?php
/* @var $this ClienteController */
/* @var $data Cliente */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_cliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rut_cliente), array('view', 'id'=>$data->rut_cliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombres_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->nombres_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellidos_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->apellidos_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadocivil_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->estadocivil_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profesion_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->profesion_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('domicilio_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->domicilio_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->correo_cliente); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('telefonofijo_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->telefonofijo_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefonocelular_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->telefonocelular_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nrocuenta_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->nrocuenta_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banco_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->banco_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipocuenta_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->tipocuenta_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->activo_cliente); ?>
	<br />

	*/ ?>

</div>