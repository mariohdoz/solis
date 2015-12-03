<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Configuración
	    <small>Texto aquí.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">algo</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">acción</li>
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
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                  <?php echo $form->labelEx($model , ''); ?>
                  <?php echo $form->textField($model , '' , array('class'=>'form-control','disabled' => true  )); ?>
                </div>
              </div>
					  </div>
            <div class="box-footer">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#arrendatario">Boton</button>
            </div>
				  </div>
			  </div>
      </div>
      <!-- término se container -->
    </div>
  </section>
</div>
