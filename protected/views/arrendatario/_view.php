<?php
/* @var $this ArrendatarioController */
/* @var $data Arrendatario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_arrendatario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rut_arrendatario), array('view', 'id'=>$data->rut_arrendatario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombres_arrendatario')); ?>:</b>
	<?php echo CHtml::encode($data->nombres_arrendatario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellidos_arrendatario')); ?>:</b>
	<?php echo CHtml::encode($data->apellidos_arrendatario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadocivil_arrendatario')); ?>:</b>
	<?php echo CHtml::encode($data->estadocivil_arrendatario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profesion_arrendatario')); ?>:</b>
	<?php echo CHtml::encode($data->profesion_arrendatario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo_arrendatario')); ?>:</b>
	<?php echo CHtml::encode($data->correo_arrendatario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefonofijo_arrendatario')); ?>:</b>
	<?php echo CHtml::encode($data->telefonofijo_arrendatario); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('telefonocelular_arrendatario')); ?>:</b>
	<?php echo CHtml::encode($data->telefonocelular_arrendatario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nrocuenta_arrendatario')); ?>:</b>
	<?php echo CHtml::encode($data->nrocuenta_arrendatario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banco_arrendatario')); ?>:</b>
	<?php echo CHtml::encode($data->banco_arrendatario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nacionalidad_arrendatario')); ?>:</b>
	<?php echo CHtml::encode($data->nacionalidad_arrendatario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('empresa_arrendatario')); ?>:</b>
	<?php echo CHtml::encode($data->empresa_arrendatario); ?>
	<br />

	*/ ?>

</div>