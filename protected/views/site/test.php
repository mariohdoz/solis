
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
              <!-- Envio de modelo se encuentra en SiteController/test/ -->
              <?php foreach ($model as $pago) { // Se trabaja con un foreach por que se debe recorrer el array en el cual se encuentran los pagos
                echo 'ID del pago: '.$pago->id_pago; // Se trabaja de la misma manera $modelo->atributo
                echo '<br>Total pagado: '.$pago->totalpagado_pago; // Se obtiene el total pagado
                echo '<br>ID del pago: '.$pago->id_pago; // Se obtiene el id del pago (Se hace de manera de ejemplo)
                echo '<br>ID del arriendo: '.$pago->arriendo->id_arriendo; // Ahora se manejan las relaciones que posee el modelo, la relación del del pago con el arriedo es 'BELONGS_TO' por lo cual el pago pertenece al arriendo, y por lo cual la manera de acceder a éste es de la siguiente manera $modelo->relacion->atributo-de-la-relación
                echo '<br>Valor total del arriendo: '.$pago->arriendo->valor_arriendo; // 'BELONGS_TO' se diferencia de 'HAS_MANY' ya que en 'HAS_MANY' se recorre las tablas enlazadas con un foreach, en cambio el 'BELONGS_TO' se accede de manera directa
                echo '<br>ID de la propiedad: '.$pago->arriendo->propiedad->id_propiedad.'<br>'; // Pago es una tabla hija de de arriendo, al igual que arriendo con la propiedad, por lo cual se puede acceder de esta manera $modelo->relacion->relacion2->atributo-de-la-relacion2
                foreach ($pago->arriendo->pago as $key => $value) { // arriendo tiene una relacion de 'HAS_MANY', ya que un arriendo puede tener muchos pagos y no así la relacion viceversa.
                  echo $value->id_pago;
                }
              }
              ?>
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
              <div class="col-xs-12 col-md-6 col-lg-4" ><a href="/nuevo/documento/propiedad/R02_VulnerabilityStatus.pdf">Eliminar</a><ul class="nav nav-pills nav-stacked"><li><a id="removeItem" checkid="24" title="R02_VulnerabilityStatus.pdf" onclick="return false" href=""><i class="fa fa-home"></i>R02_VulnerabilityStatus.pdf</a></li></ul></div>
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
