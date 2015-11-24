<?php
/* @var $this PropiedadController */
/* @var $data Propiedad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_propiedad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_propiedad), array('view', 'id'=>$data->id_propiedad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->rut_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->numero_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('habitacion_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->habitacion_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bano_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->bano_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('terreno_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->terreno_propiedad); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('construido_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->construido_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('servicio_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->servicio_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comuna_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->comuna_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amoblado_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->amoblado_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->valor_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->activo_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eliminado_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->eliminado_propiedad); ?>
	<br />

	*/ ?>

</div>
