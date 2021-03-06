<script>
  function obtenerfuncionario(){
		var rut = $.fn.yiiGridView.getSelection('funcionario');
		var str = rut+"";
		var res = str.split("-");
		var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/funcionario/obtener/'+res[0];
		$.getJSON(action, function(data) {
			$.each(data, function(key, funcionario) {
				$('#Ordentrabajo_rut_funcionario').val(funcionario.rut_funcionario);
				$('#Funcionario_cargo_funcionario').val(funcionario.cargo_funcionario);
				$('#Funcionario_nombres_funcionario').val(funcionario.nombres_funcionario);
				$('#Funcionario_apellidos_funcionario').val(funcionario.apellidos_funcionario);
			});
		}).error(function(jqXHR, textStatus, errorThrown) {
			$("#respuesta").html(jqXHR.responseText);
		});
	}
</script>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'funcionario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class="modal fade modal-Default" id="funcionario" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 style="text-align: center">funcionario</h4>
				<div class="form-horizontal">
					<?php
						$this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'funcionario',
              'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
							'selectableRows'=>1,
							'selectionChanged'=>'obtenerfuncionario',	// via 1: para mostrar detalles al seleccionar
							'dataProvider'=>$formulario->libre(),
							'filter' => $formulario,
							'summaryText' => 'Se encontraron {count} funcionario disponibles',
							'columns'=>array(
						// nota que con htmlOptions se puede personalizar el tamano de la columna
								array('name'=>'rut_funcionario','htmlOptions'=>array('width'=>'100px')),
						// nota que aqui no se usa array, sino directamente el nombre de la columna
								'nombres_funcionario',
								'apellidos_funcionario',
						// via 2: para mostrar detalles al hacer click en un icono.
								array(
										'header' => '',
										'class' => 'CButtonColumn','htmlOptions'=>array('width'=>'100px'),
										'viewButtonImageUrl' => Yii::app()->baseUrl . '/css/gridViewStyle/images/' . 'gr-view.png',
										'updateButtonImageUrl' => Yii::app()->baseUrl . '/css/gridViewStyle/images/' . 'gr-update.png',
										'deleteButtonImageUrl' => Yii::app()->baseUrl . '/css/gridViewStyle/images/' . 'gr-delete.png',
								),
							),
						));
						?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success center-block" data-dismiss="modal">Aceptar</button>
			</div>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Configuración
	    <small>Registrar orden de trabajo.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Orden de trabajo</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Registrar</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
				<?php if(($msgs=Yii::app()->user->getFlashes())!=null): ?>
         <?php foreach($msgs as $type => $message):?>
           <div class="alert alert-<?php echo $type;?>" style="margin-left: 10px; margin-right: 10px ">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong><?php
							 if($type == 'danger'){
								 echo 'Error';
							 }elseif ($type == 'success'){
								 echo 'Éxito';
							 };
							?> !</strong> <?php echo $message;?>.
           </div>
         <?php endforeach;?>
       <?php endif; ?>
			</div>
      <!-- Inicio se container -->
			<?php $this->renderPartial('_form', array('model'=>$model,  'funcionario'=>$funcionario)); ?>
      <!-- término se container -->
    </div>
  </section>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.formatCurrency-1.4.0.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/i18n/jquery.formatCurrency.es-CL.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.Rut.min.js" type="text/javascript"></script>
<script>
$( document ).ready(function(){
  $('#Ordentrabajo_fechaemision_ot').val($.datepicker.formatDate('yy-mm-dd', new Date()));
  $('#Ordentrabajo_totalpagar_ot').click(function(){
    $('#Ordentrabajo_totalpagar_ot').val('');
  });
  $("#Ordentrabajo_totalpagar_ot").keyup(function(){
		$('#Ordentrabajo_totalpagar_ot').formatCurrency({region: 'es-CL'
			, roundToDecimalPlace: -1});
	});
  $("#Ordentrabajo_totalpagar_ot").blur(function(){
    var suffix = $(this).val();
    var a=suffix.replace( /^\D+/g, '').replace( '.', '');
    var b = parseInt(a);
    if (!isNaN(b)) {
      $('#Ordentrabajo_totalpagar_ot').formatCurrency({region: 'es-CL'
        , roundToDecimalPlace: -1});
    }else {
      alert('Por favor ingresar un valor numérico.');
      $(this).val('');
      $(this).focus();
    }
  });
});


</script>
