<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'cliente-form',
  // Please note: When you enable ajax validation, make sure the corresponding
  // controller action is handling ajax validation correctly.
  // There is a call to performAjaxValidation() commented in generated controller code.
  // See class documentation of CActiveForm for details on this.
  'enableAjaxValidation'=>false,
  )); ?>
<style type="text/css">

    #map_canvas {
        width:529px;
        height:400px;
    }

</style>
<script type="text/javascript">
    function initialize(address) {
        var geoCoder = new google.maps.Geocoder(address)
        var request = {address:'<?php echo $model->comuna_propiedad.' '.$model->direccion_propiedad; ?>'};
        geoCoder.geocode(request, function(result, status){
            var latlng = new google.maps.LatLng(result[0].geometry.location.lat(), result[0].geometry.location.lng());
            var myOptions = {
                zoom: 16,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);

            var marker = new google.maps.Marker({
                position:latlng,map:map,title:'<?php echo $model->comuna_propiedad.' '.$model->direccion_propiedad; ?>',
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP
            });

        })
    }
</script>

<script>
    $(document).ready(function(){
        initialize('Calama');
        $('#search').bind('click',function(){
            initialize($('#address').val());
        })
    })
</script>

<section class="container informacion">
    <div class="col-md-6 ">

            <div class="google-map2 " id="map_canvas"></div>

    </div>
    <div class=" col-md-6">
        <h4 id='ho'>Valor  <?php echo $model->servicio_propiedad; ?> $ <?php  echo  number_format($model->valor_propiedad, 0, ",", "."); ?> <button type="button" style="float: right" class="btn btn-success " onclick="javascript:window.print()">Imprimir </button></h4>
        <ul class="list-group">
            <li class="list-group-item"><i class="fa fa-map-marker"></i> Ubicación: <?php echo $model->direccion_propiedad.' '.$model->numero_propiedad; ?></li>
            <li class="list-group-item"><i class="fa fa-bed"></i> Dormitorios: <?php echo $model->habitacion_propiedad; ?></li>
            <li class="list-group-item"><a  href="#"><img class="" width="12" height="14" src="<?php echo Yii::app()->request->baseUrl; ?>/images/bano.png"></a> Baños: <?php echo $model->bano_propiedad; ?></li>
            <li class="list-group-item"><i class="fa fa-object-ungroup"></i> &#x33a1; Totales: <?php echo $model->terreno_propiedad; ?></li>
            <li class="list-group-item"><i class="fa fa-object-group"></i> &#x33a1; Construidos: <?php echo $model->construido_propiedad; ?></li>
            <li class="list-group-item"><i class="fa fa-building"></i> Tipo: <?php echo $model->tipo_propiedad; ?></li>
            <li class="list-group-item"><i class="fa fa-hand-stop-o"></i> Estado: En <?php echo $model->servicio_propiedad; ?></li>
            <li class="list-group-item"><img class="" width="16" height="18" src="<?php echo Yii::app()->request->baseUrl; ?>/images/sofa.png"></a> Amoblado: <?php if($model->amoblado_propiedad){ echo 'Si';}else{echo 'No';} ?></li>
            <li class="list-group-item"><i class="fa fa-comment"></i> Descripción: <?php echo $model->descripcion_propiedad; ?></li>
        </ul>
    </div>
</section>
<section class="container informacion">
    <div class=" col-md-12">
        <h1>Imáenes</h1>
        <?php foreach ($model->imagen as $key => $value) {
          echo '<div class="col-lg-3 col-sm-4 col-xs-6">';
          echo '<a class="showcase" href="'.Yii::app()->request->baseUrl.'/images/propiedades/'.$value->url_imagen.'" data-rel="lightcase:myCollection:slideshow">';
          echo  CHtml::image(Yii::app()->baseUrl."/images/propiedades/".$value->url_imagen, '',  array('class'=>'thumbnail img-responsive'));
          echo '</a></div>';
        } ?>
    </div>
</section>
<?php $this->endWidget(); ?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.formatCurrency-1.4.0.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/i18n/jquery.formatCurrency.es-CL.js" type="text/javascript"></script>
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
</script>
