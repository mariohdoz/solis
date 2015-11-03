<script>
	/*
		MUY IMPORTANTE:
		Tu CActiveDataProvider debe proveer esta configuracion:
			'keyAttribute'=>'idcategoria',
		para que  var idcategoria = $.fn.yiiGridView.getSelection('categorias');
		devuelva un valor de seleccion.
	*/
	function obtenerPropiedad(){
		// no olvides configurar tu CActiveDataProvider con: 'keyAttribute'=>'idcategoria',
		var id_propiedad = $.fn.yiiGridView.getSelection('propiedad');
		var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/site/obtenerpro/'+id_propiedad;
		// http://api.jquery.com/category/ajax/shorthand-methods/
		// http://api.jquery.com/jQuery.getJSON/
		$.getJSON(action, function(data) {
				// limpia la lista
				$('#respuesta').find("").each(function(){ $(this).remove(); });
				$.each(data, function(key, propiedad) {
					alert(propiedad.id_propiedad);

					$( "Propiedad_direccion_propiedad" ).prop({
						disabled: false
					});
					$( "Propiedad_valor_propiedad" ).prop({
						disabled: false
					});
					$('#Arriendo_id_propiedad').val(propiedad.id_propiedad);
					$('#Propiedad_direccion_propiedad').val(propiedad.direccion_propiedad);
					$('#Propiedad_valor_propiedad').val(propiedad.valor_propiedad);
					$( "#Propiedad_valor_propiedad" ).prop({
						disabled: true
					});
					$( "#Propiedad_direccion_propiedad" ).prop({
						disabled: true
					});
					}
				);
			}
		).error(function(jqXHR, textStatus, errorThrown) {
			$("#respuesta").html(jqXHR.responseText);
		});
	}
</script>
<div class="col-md-6">
	<?php
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'propiedad',
			'selectableRows'=>1,
			'selectionChanged'=>'obtenerPropiedad',	// via 1: para mostrar detalles al seleccionar
			'dataProvider'=>$dataProvider2,
			'filter' => $model3,
			'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css'),
			'summaryText' => 'Se encontraron {count} arrendatarios activos',
			'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
			'columns'=>array(
		// nota que con htmlOptions se puede personalizar el tamano de la columna
				array('name'=>'id_propiedad','htmlOptions'=>array('width'=>'80px')),
		// nota que aqui no se usa array, sino directamente el nombre de la columna
				'direccion_propiedad',
				'numero_propiedad',
		// via 2: para mostrar detalles al hacer click en un icono.
				array(
						'header' => '(fake) Actions',
						'class' => 'CButtonColumn',
						'viewButtonImageUrl' => Yii::app()->baseUrl . '/css/gridViewStyle/images/' . 'gr-view.png',
						'updateButtonImageUrl' => Yii::app()->baseUrl . '/css/gridViewStyle/images/' . 'gr-update.png',
						'deleteButtonImageUrl' => Yii::app()->baseUrl . '/css/gridViewStyle/images/' . 'gr-delete.png',
				),
			),
		));
		?>
</div>
<div class="col-md-6">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'arriendo-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>
	<div class="col-xs-12">
		<div class="form-group">
			<?php echo $form->labelEx($model,'id_propiedad'); ?>
			<?php echo $form->textField($model,'id_propiedad',array('class'=>'form-control', 'placeholder'=>'Ingrese el número de ficha de la propiedad o seleccione una.')); ?>
			<?php echo $form->error($model,'id_propiedad'); ?>
		</div>
	</div>
	<div class="col-xs-9">
		<div class="form-group">
			<?php echo $form->label($model3,'direccion_propiedad'); ?>
			<?php echo $form->textField($model3,'direccion_propiedad', array('class'=>'form-control', 'disabled'=>'true')); ?>
			<?php echo $form->error($model3,'direccion_propiedad'); ?>
		</div>
	</div>
	<div class="col-xs-3">
		<?php echo $form->label($model3,'valor_propiedad'); ?>
		<?php echo $form->textField($model3,'valor_propiedad', array('class'=>'form-control', 'disabled'=>'true')); ?>
		<?php echo $form->error($model3,'valor_propiedad'); ?>
	</div>
	<?php $this->endWidget(); ?>

</div>


<p>
	Aqui deberia aparecer la respuesta:
	<ul id='respuesta'></ul>
</p>
