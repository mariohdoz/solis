<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Configuración
	    <small>Vista de arriendo de la propiedad de la ficha número <?php echo $model->id_propiedad;?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Clientes</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Registrar Propietario</li>
	  </ol>
  </section>
  <section class='content'>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Selección de arriendo</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<?php
              $this->widget('zii.widgets.grid.CGridView', array(
                    'dataProvider' => $model->search(),
                    'filter' => $model,
                    'columns' => array(
                        array(
                            'name' => 'username',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->username)'
                        ),
                        array(
                            'name' => 'email',
                            'type' => 'raw',
                            'value' => 'CHtml::link(CHtml::encode($data->email), "mailto:".CHtml::encode($data->email))',
                        ),
                    ),
                ));

               ?>
						</div>
						<div class="box-footer">
						</div>
					</div>
				</div>
      </div>
    </div>
  </section>

</div>
