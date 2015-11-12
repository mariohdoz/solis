<header class="cd-header2 " >
    <div id="cd-logo2"><a href="#0"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logoV2.png" width="150px" height="50px" alt="Logo"></a></div>
  <button type="button" class="btn btn-warning navbar-btn" data-toggle="modal" data-target="#filtrar">Filtrar Resultados</button>
  <div class="modal fade" id="filtrar" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 style="text-align: center">Filtrar Resultados</h3>
        </div>
        <div class="modal-body">
          <div class="form-horizontal">
            <?php $form=$this->beginWidget('CActiveForm', array(
              'id'=>'busqueda-form',
              'action'=>Yii::app()->createUrl('/site/filtrado'),
              // Please note: When you enable ajax validation, make sure the corresponding
              // controller action is handling ajax validation correctly.
              // There is a call to performAjaxValidation() commented in generated controller code.
              // See class documentation of CActiveForm for details on this.
              'enableAjaxValidation'=>false,
            )); ?>
              <div class="form-group form-group">
                <label class="col-sm-4 control-label" for="formGroupInputLarge">Ciudad </label>
                <div class="col-sm-8">
                  <?php echo $form->dropDownList($model,'comuna_propiedad',
        						array(
        							'Antofagasta' => 'Antofagasta',
        							'Arica' => 'Arica',
        							'Calama' => 'Calama',
        							'Iquique' => 'Iquique',
        						),
        						array("class"=>"form-control"),
        						array('empty' => '(Tipo de propiedad)')); ?>
                </div>
              </div>
              <div class="form-group form-group">
                <label class="col-sm-4 control-label" for="formGroupInputLarge">Servicio </label>
                <div class="col-sm-8">
                  <?php echo $form->dropDownList($model,'servicio_propiedad',
        						array(
        							'Todas' => 'Todas',
        							'Venta' => 'Venta',
        							'Arriendo' => 'Arriendo',
        						),
        						array("class"=>"form-control"),
        						array('empty' => '(Tipo de propiedad)')); ?>
                </div>
              </div>
              <div class="form-group form-group">
                <label class="col-sm-4 control-label" for="formGroupInputLarge">Tipo</label>
                <div class="col-sm-8">
                  <?php echo $form->dropDownList($model,'tipo_propiedad',
        						array(
        							'Casa' => 'Casa',
        							'Departamento Habitación' => 'Departamento Habitación',
        							'Local' => 'Local',
        							'Galpón' => 'Galpón',
        							'Oficina Departamento' => 'Oficina Departamento',
        							'Sitio Comercial' => 'Sitio Comercial',
        							'Sitio Recidencial' => 'Sitio Recidencial',
        							'Propiedad de inversión' => 'Propiedad de inversión',
        							'Terreno' => 'Terreno'
        						),
        						array("class"=>"form-control"),
        						array('empty' => '(Tipo de propiedad)')); ?>
                </div>
              </div>
              <div class="form-group form-group">
                <label class="col-sm-4 control-label" for="formGroupInputLarge">Ba&#241;os</label>
                <div class="col-sm-8">
                  <?php echo $form->dropDownList($model,'bano_propiedad',
                      array(
                          '1' => '1',
                          '2' => '2',
                          '3' => '3',
                          '4' => '4',
                          '5' => '5',
                          '6' => '6',
                          '7' => '7',
                          '8' => '8',
                          '9' => '9'
                      ),
                      array("class"=>"form-control"),
                      array('empty' => '(Seleccione la cantidad de baños)')); ?>
                </div>
              </div>
              <div class="form-group form-group">
                <label class="col-sm-4 control-label" for="formGroupInputLarge">Dormitorios</label>
                <div class="col-sm-8">
                  <?php echo $form->dropDownList($model,'habitacion_propiedad',
                      array(
                          '1' => '1',
                          '2' => '2',
                          '3' => '3',
                          '4' => '4',
                          '5' => '5',
                          '6' => '6',
                          '7' => '7',
                          '8' => '8',
                          '9' => '9'
                      ),
                      array("class"=>"form-control"),
                      array('empty' => '(Seleccione la cantidad de Habitaciones)')); ?>
                </div>
              </div>
              <div class="form-group form-group">
                <label class="col-sm-4 control-label" for="formGroupInputLarge">Extras</label>
                <div class="col-sm-8">
                  <?php echo $form->dropDownList($model,'amoblado_propiedad',
                      array(
                          '0' => 'Sin amoblar',
                          '1' => 'Amoblado',
                      ),
                      array("class"=>"form-control"),
                      array('empty' => '(Seleccione la cantidad de baños)')); ?>
                </div>
              </div>
              <div class="form-group form-group">
                <label class="col-sm-4 control-label" for="formGroupInputLarge">Terreno</label>
                <div class="col-sm-8">
                  <?php echo $form->dropDownList($model,'terreno_propiedad',
                      array(
                          'Todos' => 'Todos',
                          '10' => 'Hasta 10 m²',
                          '30' => 'Hasta 30 m²',
                          '50' => 'Hasta 50 m²',
                          '70' => 'Hasta 70 m²',
                          '90' => '90 m² o más',
                      ),
                      array("class"=>"form-control"),
                      array('empty' => '(Seleccione la cantidad de baños)')); ?>
                </div>
              </div>

          </div>
        </div>
        <div class="modal-footer">
          <?php echo CHtml::submitButton('Buscar', array('class'=>'btn btn-primary')); ?>
        </div>
        <?php $this->endWidget(); ?>
      </div>
    </div>
  </div>
  <div id="cd-logo"><a href="#0"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logoV2.png" width="150px" height="50px" alt="Logo"></a></div>
</header>
<main class="cd-main-content">
  <section class="cd-gallery">
    <ul>
      <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
      )); ?>
    </ul>
  </section>

