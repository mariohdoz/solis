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
                <span class="logo-lg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/LogoV2.png" width="200px" height="70px"></span>
            </td>
            <td width="250px" style="text-align: center">
                <h2>Lista de propiedades ingresadas al sistema</h2>
            </td>
            <td width="50%" class="aBDP" style="text-align: right">
                <?php
                setlocale(LC_TIME, 'Spanish_Chile'); Echo iconv('ISO-8859-1', 'UTF-8', strftime('Calama, %A %d de %B de %Y '))
                ?>
            </td>
        </tr></table>
    <div style="border-top: 4px solid #ff5722;text-align: center;">
</htmlpageheader>

<htmlpagefooter name="myfooter">
    <div style="border-top: 1px solid #000000;text-align: center;">

    </div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />

<div class="tabla" >
    <table >
        <tr>
            <td class="titulotabla" >
                PROPIEDAD
            </td>
            <td class="titulotabla">
                COMUNA
            </td>
            <td class="titulotabla">
                ESTADO
            </td>
            <td class="titulotabla">
                AMOBLADA
            </td>
            <td class="titulotabla">
                FECHA DE INGRESO
            </td>
            <td class="titulotabla">
                VALOR
            </td>
            <td class="titulotabla">
               COMISIÓN
            </td>
        </tr>

            <?php
            foreach ($model as $key=>$value){
                echo $value->id_propiedad;
                echo "<tr><td>$value->direccion_propiedad</td>";
                echo "<td>$value->comuna_propiedad</td>";
                echo  "<td>$value->servicio_propiedad</td>";
                ?>
                 <td><?php if($model->amoblado_propiedad){ echo 'Si';}else{echo 'No';} ?></td>
                <?php
                echo  "<td>$value->ingreso_propiedad</td>";
                $peso= number_format($value->valor_propiedad, 0, ",", ".");
                echo  "<td style='text-align: right'>$ $peso</td>";
                echo  "<td>$value->comision_propiedad %</td>";
                echo "</tr>";
            }
            ?>





    </table>
</div>


<?php $this->endWidget(); ?>
</body>
</html>