<?php
/* @var $this ArriendoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Arriendos',
);

$this->menu=array(
	array('label'=>'Create Arriendo', 'url'=>array('create')),
	array('label'=>'Manage Arriendo', 'url'=>array('admin')),
);
?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
	    Listado de arriendos
	    <small>Vista de los listados de los arriendo.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Arriendo</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Listado de arriendo</li>
	  </ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<?php if(($msgs=Yii::app()->user->getFlashes())!=null): ?>
					<?php foreach($msgs as $type => $message):?>
						<div class="callout callout-<?php echo $type;?>">
							<h4><?php
								if($type == 'danger'){
									echo 'Error';
								}elseif ($type == 'success'){
									echo 'Éxito';
								};
							 ?> !</h4>
							<p><?php echo $message;?></p>
						</div>
					<?php endforeach;?>
				<?php endif; ?>
			</div>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Listado de arriendos</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<?php $this->widget('zii.widgets.grid.CGridView', array(
								'id'=>'arriendo-grid',
								'itemsCssClass' => 'table table-hover',
								'htmlOptions' => array('class' => 'table-responsive'),
								'dataProvider'=>$model->search(),
								'filter'=>$model,
								'columns'=>array(
									'id_arriendo',
									'id_propiedad',
									'rut_arrendatario',
									'fechapago_arriendo',
									/*
									'inscripcion_arriendo',
									'rut_admin',
									'inicio_arriendo',
									'termino_arriendo',
									'valor_arriendo',
									*/
									array(
                    'header'=>'Actualizar',
                    'class'=>'CButtonColumn',
                    'template'=>'{buscar}  {actualizar}  {eliminar}',
                    'buttons'=>array(
											'eliminar' => array(
													'label'=>'<i class="fa fa-trash-o"></i>',
													'url'=>'Yii::app()->createUrl("arriendo/eliminar", array("id"=>$data->id_arriendo))',
											),
                      'actualizar' => array(
                          'label'=>'<i class="fa fa-pencil-square-o"></i>',
                          'url'=>'Yii::app()->createUrl("arriendo/update", array("id"=>$data->id_arriendo))',
                      ),
											'buscar' => array(
													'label'=>'<i class="fa fa-eye"></i>',
													'url'=>'Yii::app()->createUrl("arriendo/view", array("id"=>$data->id_arriendo))',
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
		</div>
	</section>
</div>
