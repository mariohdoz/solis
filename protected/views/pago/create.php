<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Registrar
	    <small>Registrar pago del arriendo .</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Pago</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Registrar pago</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
      <?php $this->renderPartial('_form', array('model'=>$model,'arriendo'=>$arriendo)); ?>
      <!-- término se container -->
      <div class="col-md-6 col-xs-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos del arrendatario involucrado</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<?php $this->widget('zii.widgets.CDetailView', array(
								 'data'=>$arrendatario,
                 'htmlOptions' => array('class' => 'table-striped table-condensed table-responsive table table-hover'),
								 'attributes'=>array(
                   array(
                     'label'=>'RUT',
                      'value' =>  CHtml::link($arrendatario->rut_arrendatario,array('/arrendatario/view/', 'id'=>$arrendatario->rut)) ,
                      'type'=>'raw'
                   ),
          				 array(
										 'header'=>'Nombre completo',
										 'label'=>'Nombre completo',
										 'value'=>$arrendatario->nombres_arrendatario.' '.$arrendatario->apellidos_arrendatario,
									 ),
									 'telefonocelular_arrendatario',
									 'correo_arrendatario',
								 ),
								 )); ?>
						</div>
						<div class="box-footer">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos de la propiedad involucrada</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<?php $this->widget('zii.widgets.CDetailView', array(
								 'data'=>$propiedad,
                 'htmlOptions' => array('class' => 'table-striped table-condensed table-responsive table table-hover'),
								 'attributes'=>array(
                   array(
                     'label'=>'Número de ficha',
                      'value' =>  CHtml::link($propiedad->id_propiedad,array('/propiedad/view/', 'id'=>$propiedad->id_propiedad)) ,
                      'type'=>'raw'
                   ),
									 array('header' => 'Propiedatio',
												 'label' => 'Propietario' ,
												 'value' => $propiedad->rut_cliente, ),
                   array('header' => 'direccion',
												 'label' => 'Dirección' ,
												 'value' => $propiedad->direccion_propiedad.' '.$propiedad->numero_propiedad, ),
									 'valor_propiedad',
								 ),
								 )); ?>
						</div>
						<div class="box-footer">
						</div>
					</div>
				</div>
			</div>
      <!-- término se container -->
    </div>
  </section>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.formatCurrency-1.4.0.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/i18n/jquery.formatCurrency.es-CL.js" type="text/javascript"></script>
<script>
 $(document).ready(function() {
    $('#Arriendo_valor_arriendo').formatCurrency({region: 'es-CL'
      , roundToDecimalPlace: -1});
    var a = $('#Arriendo_inicio_arriendo').val();
    var b = a.split("-").reverse().join("/");
    $('#Arriendo_inicio_arriendo').val(b);
    a = $('#Arriendo_termino_arriendo').val();
    b = a.split("-").reverse().join("/");
    $('#Arriendo_termino_arriendo').val(b);
  });
</script>
