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
      <?php $this->renderPartial('_form', array('solicitud'=>$model, 'cliente'=>$cliente, 'funcionario'=>$funcionario)); ?>
      <!-- término se container -->
    </div>
  </section>
</div>
