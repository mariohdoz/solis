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
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Listado de arriendos</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<?php $this->widget('zii.widgets.grid.CGridView', array(
								'id'=>'arriendo-grid',
								'dataProvider'=>$model->search(),
								'filter'=>$model,
								'columns'=>array(
									'id_arriendo',
									'id_propiedad',
									'rut_admin',
									'rut_arrendatario',
									'inscripcion_arriendo',
									'fechapago_arriendo',
									/*
									'inicio_arriendo',
									'termino_arriendo',
									'valor_arriendo',
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
		</div>
	</section>
</div>
