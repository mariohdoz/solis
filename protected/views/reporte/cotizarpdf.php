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
      <?php
      setlocale(LC_TIME, 'Spanish_Chile'); Echo iconv('ISO-8859-1', 'UTF-8', strftime('Calama, %A %d de %B de %Y '))
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
      <td class="titulotabla" >
        COMISIÓN
      </td>
      <td class="titulotabla">
        Total
      </td>

    </tr>
   <!--fila 1-->
    <tr>
      <td >
       Valor de <?php echo $model->servicio_propiedad ?>
      </td>

      <td>

      </td>
      <td style="text-align: right">
        $ <?php
        echo  number_format($model->valor_propiedad, 0, ",", ".");
        ?>
      </td>

    </tr>
    <tr>
      <td>
        Mes de garantía (sólo una vez)
      </td>
      <td>

      </td>
      <td style="text-align: right">
        $ <?php  echo  number_format($model->valor_propiedad, 0, ",", "."); ?>
      </td>
    </tr>
    <tr>
      <td>
        Comisión por administración (sólo una vez)
      </td>

      <td style="text-align: center">
       50%
      </td>
      <td style="text-align: right">
        $ <?php
        $valor= ($model->valor_propiedad);
        $comision2 =( 50/100)*$valor;
        echo  number_format($comision2, 0, ",", ".");
        ?>
      </td>
    </tr>

    <tr>
      <td>
        Comisión mensual (no se aplica el primer mes)
      </td>

      <td style="text-align: center">
        <?php echo $model->comision_propiedad ;
        ?>%
      </td>
      <td style="text-align: right">
        $ <?php
        $comision= ($model->comision_propiedad);
        $valor= ($model->valor_propiedad);
        $comision2 =( $comision/100)*$valor;
        echo  number_format($comision2, 0, ",", ".");
        ?>
      </td>
    </tr>
    <tr>
      <td>

      </td>
      <td style="font-size: medium; text-align: center;background: #ff5722; color: white">
       VALOR NETO
      </td>
      <td style="text-align: center;font-size: medium"> $
        <?php
        $comision =($model->comision_propiedad);
        $valor= ($model->valor_propiedad);
        $comision3 =( 50/100)*$valor;
        $result= $comision3+$valor+$valor;
        echo  number_format($result, 0, ",", ".");
        ?>
      </td>
    </tr>

    <tr>
      <td>

      </td>
      <td style="font-size: medium; text-align: center;background: #ff5722; color: white">
        I.V.A.
      </td>
      <td style="text-align: center;font-size: medium"> $
        <?php
        $comision =($model->comision_propiedad);
        $valor= ($model->valor_propiedad);
        $comision3 =( 50/100)*$valor;
        $result= $comision3+$valor+$valor;
        $iva=$result*0.19;
        echo  number_format($iva, 0, ",", ".");
        ?>
      </td>
    </tr>

    <tr>
      <td>

      </td>
      <td style="font-size: medium; text-align: center;background: #ff5722; color: white">
       Total
      </td>
      <td style="text-align: center;font-size: medium"> $
        <?php
        $comision =($model->comision_propiedad);
        $valor= ($model->valor_propiedad);
        $comision3 =( 50/100)*$valor;
        $result= $comision3+$valor+$valor;
        $iva=$result*0.19;
        $total= $result+$iva;
        echo  number_format($total, 0, ",", ".");
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
      <td> : <?php echo $model->direccion_propiedad.''.$model->numero_propiedad; ?></td>
  </tr>
  <tr>
    <td><b>Cantidad de dormitorios </b></td>
      <td> : <?php echo $model->habitacion_propiedad; ?></td>
  </tr><tr>
    <td><b>Cantidad de baños </b></td>
      <td> : <?php echo $model->bano_propiedad; ?></td>
  </tr><tr>
    <td><b>Metros Totales </b></td>
      <td> : <?php echo $model->terreno_propiedad; ?></td>
  </tr><tr>
    <td><b>Metros Construídos </b></td>
      <td> : <?php echo $model->construido_propiedad; ?></td>
  </tr><tr>
    <td><b>Típo de propiedad </b></td>
      <td> : <?php echo $model->tipo_propiedad; ?></td>
  </tr><tr>
    <td><b>Propiedad amoblada </b></td>
      <td> : <?php if($model->amoblado_propiedad){ echo 'Si';}else{echo 'No';} ?></td>
  </tr>
  <tr>
    <td><b>Descripción </b></td>
      <td>: <?php echo $model->descripcion_propiedad; ?></td>
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
      <div class="datos">
      <p> SANDRA CAMPUSANO ARAYA
        12.582.393-9</p>
        <p>PROPIEDADES SOL Y COBRE CALAMA</p>

      </div>

<?php $this->endWidget(); ?>
</body>
</html>
  <script>
    $('#Propiedad_comision_propiedad').change(function(){
    valor();
    });
    function valor(){
    var a = $('#Propiedad_comision_propiedad').val();
    a=a.replace(/[^\d]/, '');
    a=parseInt(a.replace(".",""));
    var b = $('#Propiedad_valor_propiedad').val();
    b=b.replace(/[^\d]/, '');
    b=parseInt(b.replace(".",""));
    var c = (a/100)*b;
    $('#end').val(c);
    $('#end').formatCurrency({region: 'es-CL'
    , roundToDecimalPlace: -0});

    }

  </script>