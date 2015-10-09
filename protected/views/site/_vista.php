<?php
/* @var $this SiteController */
/* @var $data Propiedad */
?>

<div id="galeria">
  <img id="imgmostrar" src="images/<?php
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
  ?>" />

    <div class="nombre">
        <?php echo '&nbsp;'.$data->direccion_propiedad.' <hh class="glyphicon glyphicon-earphone" >&nbsp;(56)55287022</hh>'?>
        <br>
        &nbsp;Valor: $<?php echo $data->valor_propiedad; ?>
    </div>

</div>

<h2>Características</h2>
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
<desc>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data->terreno_propiedad ?></desc>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3687.575349008711!2d-68.92942229999998!3d-22.44500359999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96ac09eb306f9269%3A0x3d7e452f9089f5d8!2sArturo+Prat+2337%2C+Calama%2C+Regi%C3%B3n+de+Antofagasta!5e0!3m2!1ses-419!2scl!4v1441408015581" class="mapas" ></iframe>
</br></br></br></br>


