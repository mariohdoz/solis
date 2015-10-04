<?php
   Yii::app()->user->setState('salt', rand(10, 99));
   ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Configuración
         <small>Registrar propiedad </small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="?r=intra/index"><i class="fa fa-dashboard"></i>Inicio</a></li>
         <li class="active">Propiedades</li>
         <li><a href="?r=intra/index">Gestión</a></li>
         <li class="active">Registrar propiedad</li>
      </ol>
   </section>
   <section class="content">
      <div class="box box-default">
         <div class="box-header with-border">
            <h3 class="box-title">Subir de fotos de propiedad</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <div class="row">
               <div class="col-md-1">
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <br>
                     <p>Seleccione las imagenes de la propiedad.</p>
                        <?php $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
                             'id' => 'uploadFile',
                             'config' => array(
                                 'action' => Yii::app()->createUrl('propiedad/upload/',array('id'=>$model->IDPROP)),
                                 'allowedExtensions' => array("jpg","jpeg","gif","png"), //array("jpg","jpeg","gif","exe","mov" and etc...
                                 'sizeLimit' => 10 * 1024 * 1024, // maximum file size in bytes
                                 'buttonText' => 'Selección',
                                 //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
                                 //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
                                 'messages' => array(
                                     'typeError' => "{file} posee una extención invalida. se acepta solamente {extensions}.",
                                     'sizeError' => "{file} is too large, maximum file size is {sizeLimit}.",
                                     'minSizeError' => "{file} is too small, minimum file size is {minSizeLimit}.",
                                     'emptyError' => "{file} is empty, please select files again without it.",
                                     'onLeave' => "Los archivos seleccionados se están subiendo al servidor. si usted deja la página la carga será cancelada."
                                 ),
                                 'showMessage' => "js:function(message){ alert(message); }"
                             )
                         ));
                         ?>
                  </div>
               </div>
            </div>
            <div class="box-footer">
          			<div class="pull-right">
          					<div class="row buttons" style="margin-right: 10px ">
          							<?php echo CHtml::link('Terminar', array('intra/index'), array('class'=>'boton')); ?>
          					</div>
          			</div>
          	</div>
         </div>
         <div class="box-footer">
         </div>
      </div>
      <div class="box box-default">
         <div class="box-header with-border">
            <h3 class="box-title">Datos de la propiedad</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <?php
                        /* @var $this PropiedadController */
                        /* @var $model Propiedad */

                        $this->breadcrumbs=array(
                            'Propiedads'=>array('index'),
                            $model->IDPROP,
                        );
                        ?>
                     <?php $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model,
                        'attributes'=>array(
                            'TIPO',
                            'COMUNAPROPIEDAD',
                            'DIRECCION',
                            'SERVICIO',
                            'CANTPIEZA',
                            'CANTBANO',
                            'TERRENO',
                            'TERRENOCONSTRUIDO',
                            'DESCRIPCION',
                        ),
                        )); ?>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                  <?php
                    /* @var $this PropiedadController */
                    /* @var $model Propiedad */
                    $this->breadcrumbs = array(
                        'Propiedads' => array(
                            'index'
                        ),
                        $model->IDPROP
                    );
                    ?>
                   <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model2,
                        'attributes' => array(
                            'RUTCLIENTE',
                            'NOMBRESCLIENTE',
                            'APELLIDOSCLIENTE',
                            'TELEFONOCLIENTE',
                            'DIRECCIONCLIENTE',
                            'CORREOCLIENTE'
                        )
                    ));
                   ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
