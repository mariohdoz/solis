<script>
	function obtenerCliente(){
		var rut = $.fn.yiiGridView.getSelection('cliente');
		var str = rut+"";
		var res = str.split("-");
		var action = "<?php echo Yii::app()->request->baseUrl; ?>"+'/propiedad/obtener/'+res[0];
		$.getJSON(action, function(data) {
			$.each(data, function(key, cliente) {
				$('#Propiedad_rut_cliente').val(cliente.rut_cliente);
				$('#Cliente_correo_cliente').val(cliente.correo_cliente);
				$('#Cliente_nombres_cliente').val(cliente.nombres_cliente);
				$('#Cliente_apellidos_cliente').val(cliente.apellidos_cliente);
			});
		}).error(function(jqXHR, textStatus, errorThrown) {
			$("#respuesta").html(jqXHR.responseText);
		});
	}
</script>
<div class="modal-default" id="cliente" tabindex="-2" role="dialog" aria-labelledby="myModallabel" aria-hidden="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 style="text-align: center">Seleccionar Cliente</h3>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<?php
						$this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'clientddde',
							'itemsCssClass' => 'table table-hover',
							'htmlOptions' => array('class' => 'table-responsive'),
							'selectableRows'=>1,
							'dataProvider'=>$cliente->search(),
							'filter' => $cliente,
							'summaryText' => 'Se encontraron {count} Clientes activos',
							'columns'=>array(
						// nota que con htmlOptions se puede personalizar el tamano de la columna
								array('name'=>'rut_cliente','htmlOptions'=>array('width'=>'90px')),
						// nota que aqui no se usa array, sino directamente el nombre de la columna
								'nombres_cliente',
								'apellidos_cliente',
						// via 2: para mostrar detalles al hacer click en un icono.
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
<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Configuración
	    <small>Texto aquí.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Solicitud</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Listado de solicitudes</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Listado de solicitudes de externos</h3>
          </div>
					<div class="form">
						<div class="box-body">

					  </div>
            <div class="box-footer">
            </div>
				  </div>
			  </div>
      </div>
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Listado de solicitudes de externos</h3>
          </div>
					<div class="form">
						<div class="box-body">
              <?php
    						$this->widget('zii.widgets.grid.CGridView', array(
    							'id'=>'cliente',
    							'itemsCssClass' => 'table table-hover',
    							'htmlOptions' => array('class' => 'table-responsive'),
    							'selectableRows'=>1,
    							'selectionChanged'=>'obtenerCliente',	// via 1: para mostrar detalles al seleccionar
    							'dataProvider'=>$cliente1->search(),
    							'filter' => $cliente1,
    							'summaryText' => 'Se encontraron {count} Clientes activos',
    							'columns'=>array(
    						// nota que con htmlOptions se puede personalizar el tamano de la columna
    								array('name'=>'rut_cliente','htmlOptions'=>array('width'=>'90px')),
    						// nota que aqui no se usa array, sino directamente el nombre de la columna
    								'nombres_cliente',
    								'apellidos_cliente',
    						// via 2: para mostrar detalles al hacer click en un icono.
    							),
    						));
    						?>
					  </div>
            <div class="box-footer">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#cliente"><i class="fa fa-spinner"> &nbsp;&nbsp;Cargar cliente</i></button>

            </div>
				  </div>
			  </div>
      </div>

      <!-- término se container -->
    </div>
  </section>
</div>
