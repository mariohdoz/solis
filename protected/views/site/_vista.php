<?php
/* @var $this SiteController */
/* @var $data Propiedad */
?>

<div id="contenedor-img2 half left cf">
  <img id="imgmostrar" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/<?php
  if(imagen::model()->findByAttributes(array('id_propiedad'=>$data->id_propiedad))){
      $clave = imagen::model()->findByAttributes(
          array(
              'id_propiedad'=>$data->id_propiedad
          ),
          array(
              'order' => 'id_imagen ASC',
              'limit' => '1',
          ));
      echo $clave -> url_imagen;
  }else{
      echo 'default.gif';
  }
  ?>"/>

    <div class="mascara2">
        <?php echo '&nbsp;'.$data->direccion_propiedad.' <hh class="glyphicon glyphicon-earphone" >&nbsp;(56)55287022</hh>'?>
        <br>
        &nbsp;Valor: $<?php echo $data->valor_propiedad; ?>
    </div>

</div>

<p><h4>Características</h4></p>
<span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-3x"></i>
  <i class="fa fa-home fa-stack-4x fa-inverse"></i>


</span>
<desc>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data->tipo_propiedad; ?></desc>



<span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-3x"></i>
  <i class="fa fa-home fa-stack-4x fa-inverse"></i>


</span>
<desc>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data->bano_propiedad.' Baños'; ?></desc>

<span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-3x"></i>
  <i class="fa fa-random fa-stack-4x fa-inverse"></i>


</span>
<desc>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data->habitacion_propiedad.' Habitaciónes'; ?></desc>

<span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-3x"></i>
  <i class="fa fa-arrows-h fa-stack-4x fa-inverse"></i>


</span>
<desc>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data->terreno_propiedad ?></desc><div class="half right cf">
    <div class="google-map">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1550.1614112716795!2d-68.9253001374728!3d-22.469416482835825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96ac09cb43a152a5%3A0xd5a4bc040bd6013a!2sLatorre+1291%2C+Calama%2C+Regi%C3%B3n+de+Antofagasta!5e0!3m2!1ses-419!2scl!4v1443819530064" width="600" height="450" frameborder="0" style="border:0"></iframe>
    </div>
</div></br></br></br></br>


