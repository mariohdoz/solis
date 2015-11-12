

<html>
<head>
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"> <!-- Resource style -->
</head>
<body>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'admin-form',
  // Please note: When you enable ajax validation, make sure the corresponding
  // controller action is handling ajax validation correctly.
  // There is a call to per    formAjaxValidation() commented in generated controller code.
  // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>
<style>



</style>
  <htmlpageheader name="myheader">
  <table width="100%"><tr>
    <td width="50%">
        <span class="logo-lg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/LogoV2.png" width="180px" height="70px"></span>
    </td>
      <td width="250px" style="text-align: center">
        <h2>Cotización <?php echo  $model->servicio_propiedad ?></h2>
      </td>
    <td width="50%" class="aBDP" style="text-align: right">
      <?php echo //Establecer la información local en castellano de España
      setlocale(LC_TIME,"es_ES.UTF-8");

      echo strftime("Calama %A %d de %B de %Y ");

      ?>
    </td>
  </tr></table>
  </htmlpageheader>

  <htmlpagefooter name="myfooter">
    <div style="border-top: 1px solid #000000;text-align: center;">

    </div>
  </htmlpagefooter>

  <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
  <sethtmlpagefooter name="myfooter" value="on" />

<div><p>N O T A :
  Los valores son expresados en pesos chilenos, el valor total incluye IVA.
el costo de el mes de arriendo es $<?php  echo  number_format($model->valor_propiedad, 0, ",", "."); ?> p/p Incluyendo gastos comúnes. Se enviarán fotos de respaldo de la propiedad</p></div>


<div class="tabla" >
  <table >
    <tr>
      <td class="titulotabla" >
        PROPIEDAD
      </td>
      <td class="titulotabla">
        Valor de la propiedad
      </td>
      <td class="titulotabla" style="text-align: center;font-size: large">
        Total
      </td>
    </tr>
    <tr>
      <td >
       <?php echo $model->direccion_propiedad ?>
      </td>
      <td>
        $<?php
        echo  number_format($model->valor_propiedad, 0, ",", ".");
        ?>
      </td>

    </tr>
    <tr>
      <td>
        Mes de garantía
      </td>

      <td>
        $<?php  echo  number_format($model->valor_propiedad, 0, ",", "."); ?>
      </td>
    </tr>
    <tr>
      <td>
        Comisión por administración
      </td>

      <td>
        $ 125.000
      </td>
    </tr>
    <tr>
      <td>

      </td>
      <td>

      </td>
      <td style="text-align: center;font-size: medium"> $
        <?php
        $comision = '125000';
        $valor= ($model->valor_propiedad);
        $result= $comision+$valor+$valor;
        echo  number_format($result, 0, ",", ".");
        ?>
      </td>
    </tr>
  </table>
</div>
<h3>Datos de la propiedad</h3>
<div style="border-top: 1px solid #000000;text-align: center;">
<table style="margin-top: 20px">

  <tr>
    <td><b>Dirección </b></td>
      <td> :<?php echo $model->direccion_propiedad.'#'.$model->numero_propiedad; ?></td>
  </tr>
  <tr>
    <td><b>Cantidad de dormitorios </b></td>
      <td> :<?php echo $model->habitacion_propiedad; ?></td>
  </tr><tr>
    <td><b>Cantidad de baños </b></td>
      <td> :<?php echo $model->bano_propiedad; ?></td>
  </tr><tr>
    <td><b>Metros Totales </b></td>
      <td> :<?php echo $model->terreno_propiedad; ?></td>
  </tr><tr>
    <td><b>Metros Construídos </b></td>
      <td> :<?php echo $model->construido_propiedad; ?></td>
  </tr><tr>
    <td><b>Típo de propiedad </b></td>
      <td> :<?php echo $model->tipo_propiedad; ?></td>
  </tr><tr>
    <td><b>Propiedad amoblada </b></td>
      <td> :<?php if($model->amoblado_propiedad){ echo 'Si';}else{echo 'No';} ?></td>
  </tr>
  <tr>
    <td><b>Descripción </b></td>
      <td>:<?php echo $model->descripcion_propiedad; ?></td>
  </tr>
</table>
  </div>

<br>
<br>
<br>
<br>
    <div class="datos">
      <p> CONDICIONES GENERALES</p>
      <p>Plazo de entrega :	A Convenir -  Entrega Inmediata</p>
    </div>

    <div class="datos">
      <p> DATOS DE ORDEN DE PAGO</p>
      <p> Sandra Marisol Campusano Araya</p>
      <p> Cuenta Vista o Chequera  Electrónica</p>
      <p>Banco Estado  N° 021-7-090293-1</p>
      <p> Dirección : PASAJE LATORRE N° 1291 VILLA CHICA</p>
    </div>

<?php $this->endWidget(); ?>
</body>
</html>