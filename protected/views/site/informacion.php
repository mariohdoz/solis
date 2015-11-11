<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'cliente-form',
  // Please note: When you enable ajax validation, make sure the corresponding
  // controller action is handling ajax validation correctly.
  // There is a call to performAjaxValidation() commented in generated controller code.
  // See class documentation of CActiveForm for details on this.
  'enableAjaxValidation'=>false,
  )); ?>


<section class="container informacion">
    <div class="col-md-6 ">
        <div  class='google-map2 ' id='map' streetnumber=<?php echo '1301';  ?> streetname=<?php echo 'Tiltil';  ?>
             cityname='calama' statecode='CL' zipcode='0'
             zoom=17 width=500 height=450>
        </div>
        <script>$('#map').googlemap();</script>
    </div>
    <div class=" col-md-6">
        <h4>Valor $ <?php echo $model->valor_propiedad; ?> <button type="button" style="float: right" class="btn btn-success " onclick="javascript:window.print()">Imprimir </button></h4>
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
        <h1>Imagenes</h1>
        <?php foreach ($model->imagen as $key => $value) {
          echo '<div class="col-lg-3 col-sm-4 col-xs-6">';
          echo '<a class="showcase" href="'.Yii::app()->request->baseUrl.'/images/propiedades/'.$value->url_imagen.'" data-rel="lightcase:myCollection:slideshow">';
          echo  CHtml::image(Yii::app()->baseUrl."/images/propiedades/".$value->url_imagen, '',  array('class'=>'thumbnail img-responsive'));
          echo '</a></div>';
        } ?>
    </div>
</section>
<?php $this->endWidget(); ?>
