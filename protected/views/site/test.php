<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Configuración
	    <small>Vista de arriendo de la propiedad de la ficha número .</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Clientes</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Registrar Propietario</li>
	  </ol>
  </section>
  <section class='content'>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Selección de arriendo</h3>
          </div>
					<div class="form">
						<div class="box-body">

						</div>
						<div class="box-footer">
              <?php
    						$this->widget('zii.widgets.grid.CGridView', array(
    							'id'=>'propiedad',
    							'itemsCssClass' => 'table table-hover',
    							'htmlOptions' => array('class' => 'table-responsive'),
    							'selectableRows'=>1,
    							'dataProvider'=>$model->disponible(),
    							'filter' => $model,
    							'summaryText' => 'Se encontraron {count} propiedades',
    							'selectionChanged'=>'obtenerSeleccion',	// via 1: para mostrar detalles al seleccionar
    							'columns'=>array(
    						// nota que con htmlOptions se puede personalizar el tamano de la columna
    								array('name'=>'id_propiedad','htmlOptions'=>array('width'=>'80px')),
    						// nota que aqui no se usa array, sino directamente el nombre de la columna
    								'direccion_propiedad',
    								'tipo_propiedad',
    								'comuna_propiedad',
    								'servicio_propiedad',
    						// via 2: para mostrar detalles al hacer click en un icono.
    							),
    						));
    						?>
						</div>
					</div>
				</div>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
function obtenerSeleccion(){
  alert('hojoho');
};
</script>
