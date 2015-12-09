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
      <?php if(($msgs=Yii::app()->user->getFlashes())!=null): ?>
       <?php foreach($msgs as $type => $message):?>
         <div class="alert alert-<?php echo $type;?>" style="margin-left: 10px; margin-right: 10px ">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong><?php
             if($type == 'error'){
               echo 'Error';
             }elseif ($type == 'success'){
               echo 'Éxito';
             };
            ?> !</strong> <?php echo $message;?>.
         </div>
       <?php endforeach;?>
     <?php endif; ?>
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
                'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',

              	'dataProvider'=>$model->search(),
              	'filter'=>$model,
              	'columns'=>array(
              		'rut_funcionario',
              		'nombres_funcionario',
              		'apellidos_funcionario',
              		'telefonofijo_funcionario',
              		'telefonocelular_funcionario',
                  'correo_funcionario',
                  'cargo_funcionario',
              		/*
              		'contrasena_funcionario',
              		'activo_funcionario',
              		*/
                  array(
                    'header'=>'Actualizar',
                    'class'=>'CButtonColumn',
                    'template'=>'{buscar}  {actualizar}  {eliminar}',
                    'buttons'=>array(
											'eliminar' => array(
													'label'=>'<i class="fa fa-trash-o"></i>',
													'url'=>'Yii::app()->createUrl("funcionario/eliminar", array("id"=>$data->rut))',
											),
                      'actualizar' => array(
                          'label'=>'<i class="fa fa-pencil-square-o"></i>',
                          'url'=>'Yii::app()->createUrl("funcionario/update", array("id"=>$data->rut))',
                      ),
											'buscar' => array(
													'label'=>'<i class="fa fa-eye"></i>',
													'url'=>'Yii::app()->createUrl("funcionario/view", array("id"=>$data->rut))',
											),
                    ),
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
