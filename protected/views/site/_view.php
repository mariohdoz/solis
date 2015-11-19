<?php
/* @var $this SiteController */
/* @var $data Propiedad */
?>
<section  >

    <div class=" contenedor-img2 ejemplo-2" >
        <a href="?r=site/vista&id=<?php echo $data->id_propiedad;?>">
            <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/<?php
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
        </a>
        <div  class="mascara2 ">
            <?php echo CHtml::link('M&aacute;s informaci&oacute;n', array('Site/informacion/'.$data->id_propiedad), array('class'=>'btn btn-success btn-block')); ?>
            <h2>En <?php echo $data->servicio_propiedad; ?> $ <?php echo  number_format($data->valor_propiedad, 0, ",", "."); ?>
                </br><?php echo$data->direccion_propiedad ?></h2>
        </div>

</section>