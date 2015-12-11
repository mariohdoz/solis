<html>
<head>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"> <!-- Resource style -->
</head>
<body>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'arriendo-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to per    formAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

<htmlpageheader name="myheader">
    <table width="100%"><tr>
            <td width="50%">
                <span class="logo-lg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/LogoV2.png" width="190px" height="70px"></span>
            </td>
            <td width="250px" style="text-align: center">
                <h2>Contrato de Arrendamiento </h2>
            </td>
            <td width="50%" class="aBDP" style="text-align: right">
                <b> <?php echo $model->id_arriendo?></b>
            </td>
        </tr></table>
</htmlpageheader>

<htmlpagefooter name="myfooter">
    <div style="border-top: 1px solid #000000;text-align: center;">

    </div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />

<p class="contrato">

    En <b>Calama</b>, a <b><?php
    setlocale(LC_TIME, 'Spanish_Chile'); Echo iconv('ISO-8859-1', 'UTF-8', strftime(' %A %d de %B de %Y '))
    ?></b> , ante el Ministro
    de Fe que autoriza, comparecen: Don___ <b> <?php   $a= $arriendo->arrendatario->nombres_arrendatario  ;
        var_dump($a);?></b>,
    RUT<b> <?php echo $model->rut_arrendatario?></b> , con domicilio en la comuna de <b>Calama</b>,
    calle____ y don______ ,
    RUT ___ , con domicilio en la comuna de <b>Calama</b> ,
    calle_____ , mayores de edad, quienes acreditan sus
    identidades por intermedio de sus respectivas cédulas, ya anotadas y exponen que han
    convenido en el siguiente Contrato de Arrendamiento:<br><br>
    <b>PRIMERO:</b> Don ______,declara que es
    propietario del inmueble, ubicado en _______ ,___,
    calle ______.<br><br>
    <b>SEGUNDO:</b> Por el presente instrumento, don______ ,
    da en arrendamiento a don __________, quien
    acepta para sí el inmueble antes individualizado.<br><br>
    <b>TERCERO:</b> La renta de arrendamiento será de<b> $ <?php echo number_format($model->valor_arriendo, 0, ",", ".");?></b>, que se cancelará por períodos mensuales anticipados, los días <b><?php echo $model->fechapago_arriendo?></b> de cada
    mes el cual se reajustará anualmente de acuerdo al IPC y será pagado en el domicilio del
    arrendador.<br><br>
    <b>CUARTO:</b> El mero retardo en el pago de la renta de dos mensualidades consecutivas,
    dará derecho a la parte arrendadora para ponerle término al contrato de arrendamiento,
    sin que el arrendatario pueda oponerse consignando judicialmente la renta después de
    la primera reconvención. El atraso en el pago dará, en todo caso, derecho a cobrar el
    interés penal del mensual por el tiempo que la parte arrendataria demore en el pago.<br><br>
    <b>QUINTO:</b> El presente contrato, comenzará a regir del día <b><?php echo $model->inicio_arriendo?></b> y con un
    término el <b><?php echo $model->termino_arriendo?></b> , con posterioridad a dicha fecha, será renovable,
    pero solo mes a mes, todo ello, salvo desahucio de cualquiera de las partes, mediante
    carta certificada, con una anticipación mínima de un mes. Si el arrendatario pusiere
    término anticipado al contrato en forma unilateral, por cualquier causa, la garantía se
    hará efectiva como indemnización por contrato o cumplido, sin perjuicio de los derechos
    del arrendador.<br><br>
    <b>SEXTO:</b> Las partes declaran que la propiedad que por el presente contrato se arrienda,
    se encuentra en perfecto estado de conservación, con todos sus artefactos, instalaciones
    y accesorios en buen estado de funcionamiento, todo lo cual es conocido por el
    arrendatario, quien se, obliga a conservarlo y restituirlo en las mismas condiciones al
    término del arriendo.<br>
    La entrega material de la propiedad se hará con ésta fecha. Las reparaciones y
    desperfectos de ordinaria ocurrencia serán del arrendatario sin derecho a reembolso
    quedando, en consecuencia a beneficio del inmueble: la propiedad será destinada por el
    arrendatario a la Administración de la emrpesa <b> Propiedades Sol y Cobre</b> .<br><br>
    <b>SEPTIMO:</b> El arrendatario se obliga a pagar los gastos comunes y los consumos de
    agua, electricidad, gas, extracción de basuras, debiendo exhibir los recibos
    correspondientes al día, cada vez que el arrendador lo exija y al término del contrato, al
    momento de restituir la propiedad.<br><br>
    <b>OCTAVO:</b> Queda prohibido al arrendatario: A) Hacer variaciones o transformaciones de
    cualquier clase o naturaleza en la casa arrendada, sin permiso por escrito al arrendador:
    B) Subarrendar o ceder total ni parcialmente el arriendo, salvo expresa autorización del
    propietario: C) Destinar la propiedad a un objeto distinto al pactado o a objetos contrarios
    a las buenas costumbres o al orden público.<br><br>
    <b>NOVENO:</b> El arrendador no responderá de manera alguna por los perjuicios que puedan
    producirse al arrendatario con ocasión de incendios, inundaciones, filtraciones, rotura de
    cañerías de agua o gas, uso de ascensores, si los hay, efectos de humedad o del calor,
    etc. Igualmente no responderá por los perjuicios, que pudieran irrogarse al arrendatario
    por cualquier disposición o exigencia de autoridad, Fiscal, Municipal, sanitaria, o de
    cualquier otro índole, derivada del destino del inmueble arrendado.<br><br>
    <b>DECIMO:</b> El arrendatario deja en poder del arrendador el valor de<b> $ <?php echo number_format($model->valor_arriendo, 0, ",", ".");?></b>.
    correspondiente a un mes de renta por adelantado y a un mes de
    garantía, para responder al cumplimiento del presente contrato. Esta garantía no podrá
    ser imputada a pago de renta de arrendamiento ni siquiera para el último mes. Será
    devuelta al término del contrato, después de descontar los daños que pudieran existir.
    Para todos los efectos del presente contrato las partes fijan domicilio en la ciudad de
    Calama y se someten a la jurisdicción de sus Tribunales ordinarios de Justicia.<br>
    El presente contrato se extiende y suscribe en DOS ejemplares, quedando uno en
    poder de cada otorgante.-<br><br><br>
    <div class="izquierda">
    ________________________________________<br>
    ARRENDADOR
    </div>
    <div class="derecha">
    ________________________________________<br>
    ARRENDATARIO
    </div><br><br>
<div style="text-align: center">
    FIRMARON ANTE MI, CON FECHA <b><br>
    <?php
    setlocale(LC_TIME, 'Spanish_Chile'); Echo iconv('ISO-8859-1', 'UTF-8', strftime(' %A %d de %B de %Y ,Calama'))
    ?></b>.
    </div>
</p>


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