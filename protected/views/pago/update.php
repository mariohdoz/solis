<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Actualizar
	    <small>Actualizar pago.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Pago</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Actualizar pago</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <?php if(($msgs=Yii::app()->user->getFlashes())!=null): ?>
  				<?php foreach($msgs as $type => $message):?>
  					<div class="alert alert-<?php echo $type;?>" style="margin-left: 10px; margin-right: 10px ">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  						<strong>Error</strong> <?php echo $message;?>
  					</div>
  				<?php endforeach;?>
  			<?php endif; ?>
      </div>
      <?php $this->renderPartial('_form', array('model'=>$model,'arriendo'=>$arriendo, 'a'=>$anos)); ?>
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
if ($('#Pago_totalpagado_pago').val()=='') {
$('#Pago_totalpagado_pago').val('0');
}
if ($('#Pago_totalpagar_pago').val()=='') {
$('#Pago_totalpagar_pago').val('0');
}
$('#fin').val($('#Pago_totalpagado_pago').val());
var a = $('#Pago_totalpagado_pago').val();
a=a.replace(/[^\d]/, '');
a=parseInt(a.replace(".",""));

var b = $('#Arriendo_valor_arriendo').val();
b=b.replace(/[^\d]/, '');
b=parseInt(b.replace(".",""));
$('#end').val(b-a);
$('#end').formatCurrency({region: 'es-CL'
, roundToDecimalPlace: -1});
$('#fin').formatCurrency({region: 'es-CL'
, roundToDecimalPlace: -1});
$('#Arriendo_valor_arriendo').formatCurrency({region: 'es-CL'
, roundToDecimalPlace: -1});
$('#Pago_totalpagado_pago').formatCurrency({region: 'es-CL'
, roundToDecimalPlace: -1});
$('#Pago_totalpagar_pago').formatCurrency({region: 'es-CL'
, roundToDecimalPlace: -1});
$("#Pago_totalpagado_pago").blur(function(){
$("#Pago_totalpagar_pago").val('');
})
var a = $('#Arriendo_inicio_arriendo').val();
var b = a.split("-").reverse().join("/");
$('#Arriendo_inicio_arriendo').val(b);
a = $('#Arriendo_termino_arriendo').val();
b = a.split("-").reverse().join("/");
$('#Arriendo_termino_arriendo').val(b);
});
$('#Pago_totalpagado_pago').blur(function(){
valor();
});
$('#Pago_totalpagar_pago').blur(function(){
valor();
});
$("#Pago_totalpagar_pago").click(function () {
$("#Pago_totalpagar_pago").val('');
});
$("#Pago_totalpagar_pago").keyup(function () {
if (isNaN($("#Pago_totalpagar_pago").val())) {
alert('Porfavor ingresar solamente números');
$("#Pago_totalpagar_pago").val('');
}else{
  valo();
}
});
$("#Pago_totalpagar_pago").blur(function(){
  $("#Pago_totalpagar_pago").formatCurrency({region: 'es-CL'
  , roundToDecimalPlace: -1});
});
function valor(){
if ($('#Pago_totalpagado_pago').val()!='' && $('#Pago_totalpagar_pago').val()!='') {
var a = $('#Pago_totalpagado_pago').val();
var b = $('#Pago_totalpagar_pago').val();
var c = $('#Arriendo_valor_arriendo').val();
a=a.replace(/[^\d]/, '');
b=b.replace(/[^\d]/, '');
c=c.replace(/[^\d]/, '');
a=parseInt(a.replace(".",""));
b=parseInt(b.replace(".",""));
c=parseInt(c.replace(".",""));
if (a+b<=c) {
$('#fin').val(a+b);
$('#fin').formatCurrency({region: 'es-CL'
, roundToDecimalPlace: -1});
var d = c-(a+b);
$('#end').val(d);
$('#end').formatCurrency({region: 'es-CL'
, roundToDecimalPlace: -1});
}else if ($('#Pago_totalpagado_pago').val()=='') {
$('#fin').val($('#Pago_totalpagar_pago').val());
$('#fin').formatCurrency({region: 'es-CL'
, roundToDecimalPlace: -1});
}else if($('#Pago_totalpagar_pago').val()==''){
$('#fin').val($('#Pago_totalpagado_pago').val());
$('#fin').formatCurrency({region: 'es-CL'
, roundToDecimalPlace: -1});
}
$('#Pago_totalpagado_pago').formatCurrency({region: 'es-CL'
, roundToDecimalPlace: -1});
$('#Pago_totalpagar_pago').formatCurrency({region: 'es-CL'
, roundToDecimalPlace: -1});
}
if (a+b>c) {
b=c-a;
$('#fin').val(b);
$('#fin').formatCurrency({region: 'es-CL'
, roundToDecimalPlace: -1});
alert('El monto a pagar de '+$('#Pago_totalpagar_pago').val()+' es mayor que la deuda actual de '+$('#fin').val());
$('#fin').val(0);
$('#fin').formatCurrency({region: 'es-CL'
, roundToDecimalPlace: -1});
$('#Pago_totalpagar_pago').val(0);
$('#Pago_totalpagar_pago').formatCurrency({region: 'es-CL'
, roundToDecimalPlace: -1});
}
}
function valo(){
  if ($('#Pago_totalpagado_pago').val()!='' && $('#Pago_totalpagar_pago').val()!='') {
  var a = $('#Pago_totalpagado_pago').val();
  var b = $('#Pago_totalpagar_pago').val();
  var c = $('#Arriendo_valor_arriendo').val();
  a=a.replace(/[^\d]/, '');
  b=b.replace(/[^\d]/, '');
  c=c.replace(/[^\d]/, '');
  a=parseInt(a.replace(".",""));
  b=parseInt(b.replace(".",""));
  c=parseInt(c.replace(".",""));
  if (a+b<=c) {
  $('#fin').val(a+b);
  $('#fin').formatCurrency({region: 'es-CL'
  , roundToDecimalPlace: -1});
  var d = c-(a+b);
  $('#end').val(d);
  $('#end').formatCurrency({region: 'es-CL'
  , roundToDecimalPlace: -1});
  }else if ($('#Pago_totalpagado_pago').val()=='') {
  $('#fin').val($('#Pago_totalpagar_pago').val());
  $('#fin').formatCurrency({region: 'es-CL'
  , roundToDecimalPlace: -1});
  }else if($('#Pago_totalpagar_pago').val()==''){
  $('#fin').val($('#Pago_totalpagado_pago').val());
  $('#fin').formatCurrency({region: 'es-CL'
  , roundToDecimalPlace: -1});
  }
  $('#Pago_totalpagado_pago').formatCurrency({region: 'es-CL'
  , roundToDecimalPlace: -1});

  if (a+b>c) {
  b=c-a;
  $('#fin').val(b);
  $('#fin').formatCurrency({region: 'es-CL'
  , roundToDecimalPlace: -1});
  alert('El monto a pagar de '+$('#Pago_totalpagar_pago').val()+' es mayor que la deuda actual de '+$('#fin').val());
  $('#fin').val(0);
  $('#fin').formatCurrency({region: 'es-CL'
  , roundToDecimalPlace: -1});
  $('#Pago_totalpagar_pago').val(0);
  $('#Pago_totalpagar_pago').formatCurrency({region: 'es-CL'
  , roundToDecimalPlace: -1});
  }
}

}
</script>
