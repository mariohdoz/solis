<?php
/* @var $this OrdentrabajoController */
/* @var $data Ordentrabajo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ot')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ot), array('view', 'id'=>$data->id_ot)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_admin')); ?>:</b>
	<?php echo CHtml::encode($data->rut_admin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_ot')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_ot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaemision_ot')); ?>:</b>
	<?php echo CHtml::encode($data->fechaemision_ot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaejecucion_ot')); ?>:</b>
	<?php echo CHtml::encode($data->fechaejecucion_ot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_ot')); ?>:</b>
	<?php echo CHtml::encode($data->estado_ot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inicio_ot')); ?>:</b>
	<?php echo CHtml::encode($data->inicio_ot); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('servicio_ot')); ?>:</b>
	<?php echo CHtml::encode($data->servicio_ot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion_ot')); ?>:</b>
	<?php echo CHtml::encode($data->observacion_ot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('totalpagar_ot')); ?>:</b>
	<?php echo CHtml::encode($data->totalpagar_ot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('formapago_ot')); ?>:</b>
	<?php echo CHtml::encode($data->formapago_ot); ?>
	<br />

	*/ ?>

</div>