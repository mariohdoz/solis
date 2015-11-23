<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Visualización
	    <small>Visualización del pago.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Pago</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Vizualización de pagos</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
      <div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Título</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<h1>Cuerpo</h1>
					  </div>
            <div class="box-footer">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#arrendatario">Boton</button>
            </div>
				  </div>
			  </div>
      </div>

      <?php
        
          $this->renderPartial('_view', array('model'=>$value,'arriendo'=>$arriendo,));

      ?>
      <!-- término se container -->
    </div>
  </section>
</div>
