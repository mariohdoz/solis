<?php
/* @var $this PagoController */
/* @var $data Pago */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pago')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pago), array('view', 'id'=>$data->id_pago)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_arriendo')); ?>:</b>
	<?php echo CHtml::encode($data->id_arriendo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_pago')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mes_pago')); ?>:</b>
	<?php echo CHtml::encode($data->mes_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('totalpagar_pago')); ?>:</b>
	<?php echo CHtml::encode($data->totalpagar_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('totalpagado_pago')); ?>:</b>
	<?php echo CHtml::encode($data->totalpagado_pago); ?>
	<br />


</div>