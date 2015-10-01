<?php
/* @var $this PropiedadController */
/* @var $data Propiedad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDPROP')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDPROP), array('view', 'id'=>$data->IDPROP)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RUTCLIENTE')); ?>:</b>
	<?php echo CHtml::encode($data->RUTCLIENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DIRECCION')); ?>:</b>
	<?php echo CHtml::encode($data->DIRECCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CANTPIEZA')); ?>:</b>
	<?php echo CHtml::encode($data->CANTPIEZA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CANTBANO')); ?>:</b>
	<?php echo CHtml::encode($data->CANTBANO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TERRENO')); ?>:</b>
	<?php echo CHtml::encode($data->TERRENO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TERRENOCONSTRUIDO')); ?>:</b>
	<?php echo CHtml::encode($data->TERRENOCONSTRUIDO); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPO')); ?>:</b>
	<?php echo CHtml::encode($data->TIPO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SERVICIO')); ?>:</b>
	<?php echo CHtml::encode($data->SERVICIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMUNAPROPIEDAD')); ?>:</b>
	<?php echo CHtml::encode($data->COMUNAPROPIEDAD); ?>
	<br />

	*/ ?>

</div>