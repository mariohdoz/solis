<?php
/* @var $this FuncionarioController */
/* @var $data Funcionario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_funcionario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rut_funcionario), array('view', 'id'=>$data->rut_funcionario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombres_funcionario')); ?>:</b>
	<?php echo CHtml::encode($data->nombres_funcionario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellidos_funcionario')); ?>:</b>
	<?php echo CHtml::encode($data->apellidos_funcionario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefonofijo_funcionario')); ?>:</b>
	<?php echo CHtml::encode($data->telefonofijo_funcionario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefonocelular_funcionario')); ?>:</b>
	<?php echo CHtml::encode($data->telefonocelular_funcionario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('domicilio_funcionario')); ?>:</b>
	<?php echo CHtml::encode($data->domicilio_funcionario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo_funcionario')); ?>:</b>
	<?php echo CHtml::encode($data->correo_funcionario); ?>
	<br />


</div>