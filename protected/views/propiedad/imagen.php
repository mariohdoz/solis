<div class="content-wrapper">
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
     <div class="form-group">
       <?php if(($msgs=Yii::app()->user->getFlashes())!=null): ?>
         <?php foreach($msgs as $type => $message):?>
           <div class="alert alert-<?php echo $type;?>" style="margin-left: 10px; margin-right: 10px ">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Éxito</strong> <?php echo $message;?>.
           </div>
         <?php endforeach;?>
       <?php endif; ?>
     </div>
     <div class="row row-centered">
       <section class="col-lg-6">
          <div class="box box-default">
             <div class="box-header with-border">
                <h3 class="box-title">Subir de fotos de propiedad</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                <div class="row">
                   <div class="col-md-1">
                   </div>
                   <div class="col-centered">
                      <div class="form-group">
                         <br>
                         <p>Seleccione las imagenes de la propiedad.</p>
                            <?php $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
                                 'id' => 'uploadFile',
                                 'config' => array(
                                     'action' => Yii::app()->createUrl('propiedad/upload/',array('id'=>$model->id_propiedad)),
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
              			<!--<div class="pull-left">
              					<div class="row buttons" style="margin-left: 10px ">
              							<?php  CHtml::link('Terminar', array('intra/index'), array('class'=>'btn btn-success')); ?>
              					</div>
              			</div> -->
              	</div>
             </div>
             <div class="box-footer">
             </div>
          </section>
          <section class="col-lg-6">
             <div class="box box-default">
                <div class="box-header with-border">
                   <h3 class="box-title">Subir los documentos de propiedad</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                   <div class="row">
                      <div class="col-md-1">
                      </div>
                      <div class="col-centered">
                         <div class="form-group">
                            <br>
                            <p>Seleccione los documentos de la propiedad.</p>
                               <?php $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
                                    'id' => 'documento',
                                    'config' => array(
                                        'action' => Yii::app()->createUrl('propiedad/docu/',array('id'=>$model->id_propiedad)),
                                        'allowedExtensions' => array("jpg","jpeg","gif","png", 'pdf', 'doc', 'docx'), //array("jpg","jpeg","gif","exe","mov" and etc...
                                        'sizeLimit' =>25  * 1024 * 1024, // maximum file size in bytes
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
                     <!--<div class="pull-left">
                         <div class="row buttons" style="margin-left: 10px ">
                             <?php  CHtml::link('Terminar', array('intra/index'), array('class'=>'btn btn-success')); ?>
                         </div>
                     </div> -->
                 	</div>
                </div>
                <div class="box-footer">
                </div>
             </section>
             <section class='col-lg-12'>
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
                                   $model->id_propiedad,
                               );
                               ?>
                            <?php $this->widget('zii.widgets.CDetailView', array(
                               'data'=>$model,
                               'attributes'=>array(
                                   'tipo_propiedad',
                                   'comuna_propiedad',
                                   'direccion_propiedad',
                                   'servicio_propiedad',
                                   'habitacion_propiedad',
                                   'bano_propiedad',
                                   'terreno_propiedad',
                                   'construido_propiedad',
                                   'descripcion_propiedad',
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
                               $model->id_propiedad
                           );
                           ?>
                          <?php
                           $this->widget('zii.widgets.CDetailView', array(
                               'data' => $model2,
                               'attributes' => array(
                                   'rut_cliente',
                                   array(
                                     'header'=>'Nombre completo',
                                     'name'=>'nombres_cliente',
                                     'value'=>$model2->nombres_cliente.' '.$model2->apellidos_cliente,
                                   ),
                                   'telefonocelular_cliente',
                                   'domicilio_cliente',
                                   'correo_cliente'
                               )
                           ));
                          ?>
                         </div>
                      </div>
                   </div>
              </div>
     </section>
    </div>
  </div>
</div>
