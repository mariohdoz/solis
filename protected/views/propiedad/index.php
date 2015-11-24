<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Listado de propiedades
	    <small>Vista de todas las propiedades ingresadas.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Propiedades</li>
			<li class="active">Gestión</li>
			<li class="active">Listado</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Generar reporte</h3>
					</div>
				<div class="form">
					<div class="box-body">
						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'arriendo-form',
							// Please note: When you enable ajax validation, make sure the corresponding
							// controller action is handling ajax validation correctly.
							// There is a call to performAjaxValidation() commented in generated controller code.
							// See class documentation of CActiveForm for details on this.
							'enableAjaxValidation'=>false,
						)); ?>
						<div class="col-md-1">
							<h4>Desde</h4>
						</div>
						<div class="col-md-3">
							<div class="input-group" style="margin-bottom: 20px">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
								<?php echo $form->dateField($model,'ingreso_propiedad', array('class'=>'form-control', 'tabindex'=>2)); ?>
							</div>
						</div>
						<div class="col-md-1">
							<h4>Hasta</h4>
						</div>
						<div class="col-md-3">
							<div class="input-group " style="margin-bottom: 20px">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
								<?php echo $form->dateField($model,'ingreso_propiedad', array('class'=>'form-control', 'tabindex'=>2)); ?>
							</div>
						</div>
						<div class="col-md-3">
							<?php echo CHtml::link("Reporte &nbsp;&nbsp;<i class='fa fa-file-pdf-o'></i>", '#', array(
									'submit'=>array('/propiedad/generarpdf'),
									'class'=>'btn btn-google-plus',
								)
							);?>
						</div>

					</div>
					<div class="box-footer">

					</div>

				</div>
			</div>
		</div>
      <!-- Inicio se container -->
      <div class="col-lg-12 col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Lista de propiedades</h3> <div style="float: right" ><?php echo CHtml::link("Imprimir todas &nbsp;&nbsp;<i class='fa fa-file-pdf-o'></i>", '#', array(
								'submit'=>array('/propiedad/generarpdf'),
								'class'=>'btn btn-primary',
							)
						);?>
						</div>
          </div>
					<div class="form">
						<div class="box-body">
							<?php $this->widget('zii.widgets.grid.CGridView', array(
								'id'=>'propiedad-grid',
								'itemsCssClass' => 'table table-hover',
								'htmlOptions' => array('class' => 'table-responsive'),
								'dataProvider'=>$model->search(),
								'filter'=>$model,
								'columns'=>array(
									'id_propiedad',
              		'rut_cliente',
              		'direccion_propiedad',
              		'tipo_propiedad',
              		'comuna_propiedad',
                  'servicio_propiedad',
									array(
                    'header'=>'Estado',
                    'name'=>'activo_propiedad',
                    'value' => '$data->activo_propiedad?Yii::t(\'app\',\'Disponible\'):Yii::t(\'app\', \'Ocupado\')',
                    'filter' => array('0' => Yii::t('app', 'Ocupado'), '1' => Yii::t('app', 'Disponible')),
                    'htmlOptions' => array('style' => "text-align:center;"),
                   ),
									/*
									'terreno_propiedad',
									'construido_propiedad',
									'tipo_propiedad',
									'servicio_propiedad',
									'activo_propiedad',
									'descripcion_propiedad',
									'comuna_propiedad',
									'amoblado_propiedad',
									'valor_propiedad',
									'activo_propiedad',
									'eliminado_propiedad',
									*/
                  array(
                    'header'=>'Actualizar',
                    'class'=>'CButtonColumn',
                    'template'=>'{buscar}  {actualizar}  {eliminar}',
                    'buttons'=>array(
											'eliminar' => array(
													'label'=>'<i class="fa fa-trash-o"></i>',
													'url'=>'Yii::app()->createUrl("propiedad/eliminar", array("id"=>$data->id_propiedad))',
											),
                      'actualizar' => array(
                          'label'=>'<i class="fa fa-pencil-square-o"></i>',
                          'url'=>'Yii::app()->createUrl("propiedad/update", array("id"=>$data->id_propiedad))',
                      ),
											'buscar' => array(
													'label'=>'<i class="fa fa-eye"></i>',
													'url'=>'Yii::app()->createUrl("propiedad/view", array("id"=>$data->id_propiedad))',
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
	  <?php $this->endWidget(); ?>
  </section>
</div>
