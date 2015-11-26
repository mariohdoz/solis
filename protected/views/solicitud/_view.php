<?php
/* @var $this SolicitudController */
/* @var $data Solicitud */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_solicitud')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_solicitud), array('view', 'id'=>$data->id_solicitud)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->rut_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_funcionario')); ?>:</b>
	<?php echo CHtml::encode($data->rut_funcionario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombres_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->nombres_solicitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellidos_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->apellidos_solicitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('servicio_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->servicio_solicitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_solicitud); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaejecucion_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->fechaejecucion_solicitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_solicitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->estado_solicitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_solicitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipopropiedad_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->tipopropiedad_solicitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->correo_solicitud); ?>
	<br />

	*/ ?>

</div>