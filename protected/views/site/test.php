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
              <h1>Imagenes</h1>
              <?php foreach ($model->imagen as $key => $value) {
                //echo '<a class="showcase" href="'.Yii::app()->request->baseUrl.'/images/propiedades/'.$value->url_imagen.'" data-rel="lightcase:myCollection:slideshow">';
                echo  CHtml::image(Yii::app()->baseUrl."/images/propiedades/".$value->url_imagen, '',  array('class'=>'thumbnail img-responsive'));
              } ?>
						</div>
						<div class="box-footer">

						</div>
					</div>
				</div>
      </div>
    </div>
  </section>
</div>

<script>
  var max_width = 230; var max_height = 230;
  $('img').each(function() {
    var w = $(this).width();
    var h = $(this).height();
    var scale = null;
    if (w >= h) { if (w > max_width) { scale = 1 / (w / max_width); } }
    else { if (h > max_height) { scale = 1 / (h / max_height); } }
    if (scale) {
        $(this).width(w * scale);
        $(this).height(h * scale);
    }
  });

  $('img').click(function(){
    alert($(this).attr('src'));
  });
</script>
