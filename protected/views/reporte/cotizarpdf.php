

<html>
<head>
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"> <!-- Resource style -->
</head>
<body>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'admin-form',
  // Please note: When you enable ajax validation, make sure the corresponding
  // controller action is handling ajax validation correctly.
  // There is a call to performAjaxValidation() commented in generated controller code.
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
    <td width="50%" class="aBDP" style="text-align: '.' center" >56454656</td>
  </tr></table>
  </htmlpageheader>

  <htmlpagefooter name="myfooter">
    <div style="border-top: 1px solid #000000;text-align: center;">

    </div>
  </htmlpagefooter>

  <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
  <sethtmlpagefooter name="myfooter" value="on" />
<h1>Cotizaci�n</h1>
<div class="tabla" >
  <table >
    <tr>
      <td>
        �TEM
      </td>
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
        Row 1
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

<?php $this->endWidget(); ?>
</body>
</html>