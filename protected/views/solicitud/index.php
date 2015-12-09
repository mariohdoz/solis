<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Configuración
	    <small>Listado de solicitudes.</small>
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
      <div class="col-md-12">
				<?php if(($msgs=Yii::app()->user->getFlashes())!=null): ?>
         <?php foreach($msgs as $type => $message):?>
           <div class="alert alert-<?php echo $type;?>" style="margin-left: 10px; margin-right: 10px ">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong><?php
							 if($type == 'danger'){
								 echo 'Error';
							 }elseif ($type == 'success'){
								 echo 'Éxito';
							 };
							?> !</strong> <?php echo $message;?>.
           </div>
         <?php endforeach;?>
       <?php endif; ?>
			</div>
      <!-- Inicio se container -->
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Listado de solicitudes de externos</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<?php
               $this->widget('zii.widgets.grid.CGridView', array(
                 'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',

								'htmlOptions' => array('class' => 'table-responsive'),
								'dataProvider'=>$solicitud->sol(),
								'filter'=>$solicitud,
								'columns'=>array(
                  array(
	                  'header'=>'Fecha de solicitud',
	                  'name'=>'fecha_solicitud',
	                  'value'=>'date("d/m/Y", strtotime($data->fecha_solicitud))' ,
                  ),
                  array(
	                  'header'=>'Nombre ',
	                  'name'=>'nombres_solicitud',
	                  'value'=>'$data->nombres_solicitud." ".$data->apellidos_solicitud',
                  ),
                  array(
	                  'header'=>'Servicio solicitado',
	                  'name'=>'servicio_solicitud',
	                  'value'=>'$data->servicio_solicitud',
                    'filter' => array(
                      'Venta' => Yii::t('app', 'Venta'),
                      'Arriendo' => Yii::t('app', 'Arriendo'),
                      'Tasación' => Yii::t('app', 'Tasación'),
                      'Estudio de título' => Yii::t('app', 'Estudio de título'),
                      'Ampliaciones menores' => Yii::t('app', "Ampliaciones menores"),
                      "Aseo de propiedad" => Yii::t('app', "Aseo de propiedad")),
                  ),
                  array(
										'header'=>'Estado',
										'name'=>'estado_solicitud',
										'value' => '$data->estado_solicitud?Yii::t(\'app\',\'Pendiente\'):Yii::t(\'app\', \'Terminado\')',
										'filter' => array('0' => Yii::t('app', 'Terminado'), '1' => Yii::t('app', 'Pendiente')),
										'htmlOptions' => array('style' => "text-align:center;"),
									 ),
                   'correo_solicitud',
									/*
									'id_solicitud',
									'rut_cliente',
									'rut_funcionario',
									'telefono_solicitud',
									'fechaejecucion_solicitud',
									'estado_solicitud',
									'descripcion_solicitud',
									'tipopropiedad_solicitud',
									'correo_solicitud',
									*/
                  array(
                    'header'=>'Actualizar',
                    'class'=>'CButtonColumn',
                    'template'=>'{buscar}  {actualizar}  {eliminar}',
                    'buttons'=>array(
											'eliminar' => array(
													'label'=>'<i class="fa fa-trash-o"></i>',
													'url'=>'Yii::app()->createUrl("solicitud/eliminar", array("id"=>$data->id_solicitud))',
											),
                      'actualizar' => array(
                          'label'=>'<i class="fa fa-pencil-square-o"></i>',
                          'url'=>'Yii::app()->createUrl("solicitud/update", array("id"=>$data->id_solicitud))',
                      ),
											'buscar' => array(
													'label'=>'<i class="fa fa-eye"></i>',
													'url'=>'Yii::app()->createUrl("solicitud/view", array("id"=>$data->id_solicitud))',
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
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Listado de solicitudes de funcionarios</h3>
          </div>
          <div class="form">
            <div class="box-body">
              <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group">
                  <?php
                   $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'cliente-grid',
                    'itemsCssClass' => 'table table-hover',
                    'htmlOptions' => array('class' => 'table-responsive'),
                    'dataProvider'=>$cliente->clie(),
                    'filter'=>$cliente,
                    'columns'=>array(
                      array(
                        'header'=>'Fecha de solicitud',
                        'name'=>'fecha_solicitud',
                        'value'=>'date("d/m/Y", strtotime($data->fecha_solicitud))' ,
                      ),
                      array(
                        'header'=>'Nombre ',
                        'name'=>'nombres_solicitud',
                        'value'=>'$data->nombres_cliente." ".$data->apellidos_cliente',
                      ),
                      array(
                        'header'=>'Servicio solicitado',
                        'name'=>'servicio_solicitud',
                        'value'=>'$data->servicio_solicitud',
                        'filter' => array(
                          'Venta' => Yii::t('app', 'Venta'),
                          'Arriendo' => Yii::t('app', 'Arriendo'),
                          'Tasación' => Yii::t('app', 'Tasación'),
                          'Estudio de título' => Yii::t('app', 'Estudio de título'),
                          'Ampliaciones menores' => Yii::t('app', "Ampliaciones menores"),
                          "Aseo de propiedad" => Yii::t('app', "Aseo de propiedad")),
                      ),
                      array(
                        'header'=>'Estado',
                        'name'=>'estado_solicitud',
                        'value' => '$data->estado_solicitud?Yii::t(\'app\',\'Pendiente\'):Yii::t(\'app\', \'Terminado\')',
                        'filter' => array('0' => Yii::t('app', 'Terminado'), '1' => Yii::t('app', 'Pendiente')),
                        'htmlOptions' => array('style' => "text-align:center;"),
                       ),
                       'correo_solicitud',
                       'nombres_cliente',
                      /*
                      'id_solicitud',
                      'rut_cliente',
                      'rut_funcionario',
                      'telefono_solicitud',
                      'fechaejecucion_solicitud',
                      'estado_solicitud',
                      'descripcion_solicitud',
                      'tipopropiedad_solicitud',
                      'correo_solicitud',
                      */
                      array(
                        'header'=>'Actualizar',
                        'class'=>'CButtonColumn',
                        'template'=>'{buscar}  {actualizar}  {eliminar}',
                        'buttons'=>array(
                          'eliminar' => array(
                              'label'=>'<i class="fa fa-trash-o"></i>',
                              'url'=>'Yii::app()->createUrl("solicitud/eliminar", array("id"=>$data->id_solicitud))',
                          ),
                          'actualizar' => array(
                              'label'=>'<i class="fa fa-pencil-square-o"></i>',
                              'url'=>'Yii::app()->createUrl("solicitud/update", array("id"=>$data->id_solicitud))',
                          ),
                          'buscar' => array(
                              'label'=>'<i class="fa fa-eye"></i>',
                              'url'=>'Yii::app()->createUrl("solicitud/view", array("id"=>$data->id_solicitud))',
                          ),
                        ),
                      ),
                    ),
                  )); ?>
                </div>
              </div>
            </div>
            <div class="box-footer">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">listado de solicitudes de clientes</h3>
          </div>
          <div class="form">
            <div class="box-body">
              <div class="col-xs-12">
                <div class="form-group">
                  <?php
                   $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'funcionario-grid',
                    'itemsCssClass' => 'table table-hover',
                    'htmlOptions' => array('class' => 'table-responsive'),
                    'dataProvider'=>$funcionario->fun(),
                    'filter'=>$funcionario,
                    'columns'=>array(
                      array(
                        'header'=>'Fecha de solicitud',
                        'name'=>'fecha_solicitud',
                        'value'=>'date("d/m/Y", strtotime($data->fecha_solicitud))' ,
                      ),
                      array(
                        'header'=>'Nombre ',
                        'name'=>'nombres_solicitud',
                        'value'=>'$data->nombres_solicitud." ".$data->apellidos_solicitud',
                      ),
                      array(
                        'header'=>'Servicio solicitado',
                        'name'=>'servicio_solicitud',
                        'value'=>'$data->servicio_solicitud',
                        'filter' => array(
                          'Venta' => Yii::t('app', 'Venta'),
                          'Arriendo' => Yii::t('app', 'Arriendo'),
                          'Tasación' => Yii::t('app', 'Tasación'),
                          'Estudio de título' => Yii::t('app', 'Estudio de título'),
                          'Ampliaciones menores' => Yii::t('app', "Ampliaciones menores"),
                          "Aseo de propiedad" => Yii::t('app', "Aseo de propiedad")
                        ),
                      ),
                      array(
                        'header'=>'Estado',
                        'name'=>'estado_solicitud',
                        'value' => '$data->estado_solicitud?Yii::t(\'app\',\'Pendiente\'):Yii::t(\'app\', \'Terminado\')',
                        'filter' => array('0' => Yii::t('app', 'Terminado'), '1' => Yii::t('app', 'Pendiente')),
                        'htmlOptions' => array('style' => "text-align:center;"),
                       ),
                       'correo_solicitud',
                      /*
                      'id_solicitud',
                      'rut_cliente',
                      'rut_funcionario',
                      'telefono_solicitud',
                      'fechaejecucion_solicitud',
                      'estado_solicitud',
                      'descripcion_solicitud',
                      'tipopropiedad_solicitud',
                      'correo_solicitud',
                      */
                      array(
                        'header'=>'Actualizar',
                        'class'=>'CButtonColumn',
                        'template'=>'{buscar}  {actualizar}  {eliminar}',
                        'buttons'=>array(
                          'eliminar' => array(
                              'label'=>'<i class="fa fa-trash-o"></i>',
                              'url'=>'Yii::app()->createUrl("solicitud/eliminar", array("id"=>$data->id_solicitud))',
                          ),
                          'actualizar' => array(
                              'label'=>'<i class="fa fa-pencil-square-o"></i>',
                              'url'=>'Yii::app()->createUrl("solicitud/update", array("id"=>$data->id_solicitud))',
                          ),
                          'buscar' => array(
                              'label'=>'<i class="fa fa-eye"></i>',
                              'url'=>'Yii::app()->createUrl("solicitud/view", array("id"=>$data->id_solicitud))',
                          ),
                        ),
                      ),
                    ),
                  )); ?>
                </div>
              </div>
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
