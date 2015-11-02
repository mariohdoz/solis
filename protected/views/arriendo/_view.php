<?php
/* @var $this ArriendoController */
/* @var $data Arriendo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_arriendo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_arriendo), array('view', 'id'=>$data->id_arriendo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->id_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_admin')); ?>:</b>
	<?php echo CHtml::encode($data->rut_admin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_arrendatario')); ?>:</b>
	<?php echo CHtml::encode($data->rut_arrendatario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inscripcion_arriendo')); ?>:</b>
	<?php echo CHtml::encode($data->inscripcion_arriendo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechapago_arriendo')); ?>:</b>
	<?php echo CHtml::encode($data->fechapago_arriendo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inicio_arriendo')); ?>:</b>
	<?php echo CHtml::encode($data->inicio_arriendo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('termino_arriendo')); ?>:</b>
	<?php echo CHtml::encode($data->termino_arriendo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor_arriendo')); ?>:</b>
	<?php echo CHtml::encode($data->valor_arriendo); ?>
	<br />

	*/ ?>

</div>