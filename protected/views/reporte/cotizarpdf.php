

<html>
<head>
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"> <!-- Resource style -->
</head>
<body>

<style>

</style>
  <htmlpageheader name="myheader">
  <table width="100%"><tr>
    <td width="50%">
        <span class="logo-lg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/LogoV2.png" width="150px" height="50px"></span>
    </td>
    <td width="50%" class="aBDP" style="text-align: '.' center" >11 de Noviembre de 2015 ,Calama </td>
  </tr></table>
  </htmlpageheader>

  <htmlpagefooter name="myfooter">
    <div style="border-top: 1px solid #000000;text-align: center;">

    </div>
  </htmlpagefooter>

  <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
  <sethtmlpagefooter name="myfooter" value="on" />


<h1>Cotización</h1>
<div class="tabla" >
  <table >
    <tr>
      <td >
        ARRIENDO DE PROPIEDAD
      </td>
      <td>
        P. UNITARIO
      </td>
      <td>
        TOTAL
      </td>
    </tr>
    <tr>
      <td >
        <?php echo $model->direccion_propiedad;?>
      </td>
      <td>
        Row 1
      </td>
      <td>
        Row 1
      </td>
      <td>
        Row 1
      </td>
    </tr>
    <tr>
      <td >
        Row 2
      </td>
      <td>
        Row 2
      </td>
      <td>
        Row 2
      </td>
      <td>
        Row 2
      </td>
    </tr>
    <tr>
      <td >
        Row 3
      </td>
      <td>
        Row 3
      </td>
      <td>
        Row 3
      </td>
      <td>
        Row 3
      </td>
    </tr>
  </table>
</div>

<div style="text-align: center"><?php echo $data->servicio_propiedad; ?></div>


</body>
</html>