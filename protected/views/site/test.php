<div class="content-wrapper">
  <section class="content-header">
      <h1>
          Configuración
          <small>Seleccionar cliente</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="?r=intra/index"><i class="fa fa-dashboard"></i>Inicio</a></li>
          <li class="active">Clientes</li>
          <li><a href="?r=intra/index">Modificar clientes</a></li>
          <li class="active">Seleccionar cliente</li>
      </ol>
  </section>
  <section class="content">
    <?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'arriendo-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>false,
		)); ?>
    <div class="modal fade" id="arrendatario" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h3 style="text-align: center">Seleccionar arrendatario</h3>
    			</div>
    			<div class="modal-body">
    				<div class="form-horizontal">

    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#arrendatario">Cargar propiedad</button>
    <?php $this->endWidget(); ?>

  </section>
</div>
