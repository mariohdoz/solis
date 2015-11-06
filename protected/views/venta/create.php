<?php
/* @var $this VentaController */
/* @var $model Venta */

$this->breadcrumbs=array(
	'Ventas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Venta', 'url'=>array('index')),
	array('label'=>'Manage Venta', 'url'=>array('admin')),
);
?>
<script>
function obtenerPropiedad(){
	// no olvides configurar tu CActiveDataProvider con: 'keyAttribute'=>'idcategoria',
	var id_propiedad = $.fn.yiiGridView.getSelection('propiedad');
	var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/arriendo/obtenerpro/'+id_propiedad;
	// http://api.jquery.com/category/ajax/shorthand-methods/
	// http://api.jquery.com/jQuery.getJSON/
	$.getJSON(action, function(data) {
		// limpia la lista
		$('#respuesta').find("").each(function(){ $(this).remove(); });
		$.each(data, function(key, propiedad) {
			$( "Propiedad_direccion_propiedad" ).prop({
				disabled: false
			});
			$( "Propiedad_valor_propiedad" ).prop({
				disabled: false
			});
			$( "Propiedad_rut_cliente" ).prop({
				disabled: false
			});
			$('#Arriendo_id_propiedad').val(propiedad.id_propiedad);
			$('#Propiedad_direccion_propiedad').val(propiedad.direccion_propiedad);
			$('#Propiedad_valor_propiedad').val(propiedad.valor_propiedad);
			$('#Propiedad_rut_cliente').val(propiedad.rut_cliente);
			$( "#Propiedad_valor_propiedad" ).prop({
				disabled: true
			});
			$( "#Propiedad_direccion_propiedad" ).prop({
				disabled: true
			});
		});
	}).error(function(jqXHR, textStatus, errorThrown) {
		$("#respuesta").html(jqXHR.responseText);
	});
}
</script>
<div class="modal fade modal-default" id="propiedad" tabindex="-2" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 style="text-align: center">Seleccionar propiedad</h3>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
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
							),
						));
						?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Agregar
	    <small>ingresar una venta.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Venta</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Ingresar</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Título</h3>
          </div><!-- /.box-header -->
					<div class="form">
						<div class="box-body">
							<h1>Cuerpo</h1>
						<div class="box-footer">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#arrendatario">Boton</button>
            </div>
					</div>
				</div>
			</div>
    </div>
  </section>
</div>



<h1>Create Venta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
