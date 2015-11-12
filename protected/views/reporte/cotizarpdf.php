

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
        <span class="logo-lg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/LogoV2.png" width="150px" height="50px"></span>
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
<h1>Cotización <?php echo $model->servicio_propiedad ?></h1>
<div class="tabla" >
  <table >
    <tr>
      <td >
        PROPIEDAD
      </td>
      <td>
        Valor de Arriendo
      </td>
      <td>
        TOTAL
      </td>
    </tr>
    <tr>
      <td >
       <?php echo $model->direccion_propiedad ?>
      </td>
      <td>
        $<?php echo $model->valor_propiedad ?>
      </td>
      <td>
        $<?php echo $model->valor_propiedad ?>
      </td>

    </tr>
    <tr>
      <td>
        Mes de garantía
      </td>
      <td>
        $<?php echo $model->valor_propiedad ?>
      </td>
      <td>
        $<?php echo $model->valor_propiedad ?>
      </td>
    </tr>
    <tr>
      <td>
        Comisión por administración
      </td>
      <td>

      </td>
      <td>
        $ 125000
      </td>
    </tr>
    <tr>
      <td>

      </td>
      <td>

      </td>
      <td>
        $ 675000
      </td>
    </tr>
  </table>
</div>
<table style="margin-top: 50px">
  <tr>
    <td><b>Dirección: </b></td>
      <td><?php echo $model->direccion_propiedad.'#'.$model->numero_propiedad; ?></td>
  </tr>
  <tr>
    <td><b>Cantidad de dormitorios: </b></td>
      <td><?php echo $model->habitacion_propiedad; ?></td>
  </tr><tr>
    <td><b>Cantidad de baños: </b></td>
      <td><?php echo $model->bano_propiedad; ?></td>
  </tr><tr>
    <td><b>Metros Totales: </b></td>
      <td><?php echo $model->terreno_propiedad; ?></td>
  </tr><tr>
    <td><b>Metros Construídos: </b></td>
      <td><?php echo $model->construido_propiedad; ?></td>
  </tr><tr>
    <td><b>Típo de propiedad: </b></td>
      <td><?php echo $model->tipo_propiedad; ?></td>
  </tr><tr>
    <td><b>Estado de la propiedad: </b></td>
      <td> En <?php echo $model->servicio_propiedad; ?></td>
  </tr><tr>
    <td><b>Propiedad amoblada: </b></td>
      <td><?php if($model->amoblado_propiedad){ echo 'Si';}else{echo 'No';} ?></td>
  </tr>
  <tr>
    <td><b>Descripción: </b></td>
      <td><?php echo $model->descripcion_propiedad; ?></td>
  </tr>

</table>
<?php $this->endWidget(); ?>
</body>
</html>