<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Listado
	    <small>Listado de todos los funcionarios.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Funcionario</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Listado</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Listado de funcionarios</h3>
          </div>
					<div class="form">
						<div class="box-body">
              <?php $this->widget('zii.widgets.grid.CGridView', array(
              	'id'=>'funcionario-grid',
              	'dataProvider'=>$model->search(),
              	'filter'=>$model,
              	'columns'=>array(
              		'rut_funcionario',
              		'nombres_funcionario',
              		'apellidos_funcionario',
              		'telefonofijo_funcionario',
              		'telefonocelular_funcionario',
                  'correo_funcionario',
              		/*
              		'correo_funcionario',
              		*/
              		array(
              			'class'=>'CButtonColumn',
              		),
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
