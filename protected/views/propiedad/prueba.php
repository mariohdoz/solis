<div class="content-wrapper">
    <section class="content-header">
        <h1>Configuración<small>Registrar Propietario</small></h1>
        <ol class="breadcrumb">
            <li><a href="?r=intra/index">
                    <i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Clientes</li>
            <li><a href="?r=intra/index">Gestión</a></li>
            <li class="active">Registrar Propietario</li>
        </ol>
    </section>
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Registro de propietario</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

          <?php
            $this->widget('ext.coco.CocoWidget'
              ,array(
                  'id'=>'cocowidget1',
                  'onCompleted'=>'function(id,filename,jsoninfo){  }',
                  'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
                  'onMessage'=>'function(m){ alert(m); }',
                  'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
                  'uploadDir' => 'images/', // coco will @mkdir it
                  // this arguments are used to send a notification
                  // on a specific class when a new file is uploaded,
                  'receptorClassName'=>'application.models.Imagen',
                  'methodName'=>'onFileUploaded',
                  'userdata'=>$model->IDIMAGEN,
                  // controls how many files must be uploaded
                  'maxUploads'=>3, // defaults to -1 (unlimited)
                  'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
                  // controls how many files the can select (not upload, for uploads see also: maxUploads)
                  'multipleFileSelection'=>true, // true or false, defaults: true
                  'buttonText'=>'Seleccionar imagenes',
              ));
          ?> <br>
          <?php $this->widget('ext.plupload.Plupload', 
              array(
                  'types' => array(
                      array(
                          "title" => "Image file",
                          "extensions" => "jpg,gif,png"
                      ),
              ))); ?>

        </div>
      </div>
    </section>
</div>
