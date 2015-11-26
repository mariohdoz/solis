<?php
/* @var $this AdministradorController */
/* @var $data Administrador */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_admin')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rut_admin), array('view', 'id'=>$data->rut_admin)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombres_admin')); ?>:</b>
	<?php echo CHtml::encode($data->nombres_admin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellidos_admin')); ?>:</b>
	<?php echo CHtml::encode($data->apellidos_admin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contrasena_admin')); ?>:</b>
	<?php echo CHtml::encode($data->contrasena_admin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo_admin')); ?>:</b>
	<?php echo CHtml::encode($data->correo_admin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_admin')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_admin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perfil_admin')); ?>:</b>
	<?php echo CHtml::encode($data->perfil_admin); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('super_admin')); ?>:</b>
	<?php echo CHtml::encode($data->super_admin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo_admin')); ?>:</b>
	<?php echo CHtml::encode($data->activo_admin); ?>
	<br />

	*/ ?>

</div>