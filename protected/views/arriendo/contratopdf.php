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

    En <?php setlocale(LC_TIME, 'Spanish_Chile'); Echo iconv('ISO-8859-1', 'UTF-8', strftime('Calama, %A %d de %B de %Y ')) ?> comparecen: Por una parte, como arrendador/a don/ña  <b><?php echo $model->propiedad->cliente->nombres_cliente?> <?php echo $model->propiedad->cliente->apellidos_cliente?></b>, domiciliado/a en la comuna de Calama, cédula de identidad número <b> <?php echo $model->propiedad->cliente->rut_cliente?></b>, y por otra parte como arrendatario don/ña  <b><?php echo $model->arrendatario->nombres_arrendatario ?> <?php echo $model->arrendatario->apellidos_arrendatario ?></b>, domiciliado/a en la comuna de Calama , cédula de identidad número <b> <?php echo $model->rut_arrendatario?></b>  ambos mayores de edad, y expresan: Que vienen en celebrar el siguiente contrato de arrendamiento.
<br>
    Don/ña <b><?php echo $model->propiedad->cliente->nombres_cliente?> <?php echo $model->propiedad->cliente->apellidos_cliente?></b> es dueño/a de la propiedad ubicada en calle <b><?php echo $model->propiedad->direccion_propiedad?></b> de la ciudad de <b><?php echo $model->propiedad->comuna_propiedad?>.</b><br><br>
    <b>1.- OBJETO DEL CONTRATO:</b> A través del presente contrato de arrendamiento, el arrendador, don/ña <b><?php echo $model->propiedad->cliente->nombres_cliente?> <?php echo $model->propiedad->cliente->apellidos_cliente?></b>, da en arrendamiento el inmueble, descrito y ya identificado. La propiedad arrendada será destinada, exclusivamente, a la habitación del arrendatario y de su familia y dependientes domésticos.<br><br>

    <b>2.- PLAZO:</b> El presente contrato de arrendamiento rige a partir de la fecha de celebración del presente, en la que se hace entrega material al arrendatario de la vivienda y de las llaves de acceso a la misma, y su vigencia será desde la fecha <b> <?php echo $model->inicio_arriendo?></b> hasta la fecha <b> <?php echo $model->termino_arriendo?></b>. Este plazo se renovará en forma tácita, automática y sucesivamente en las mismas condiciones aquí pactadas, si ninguna de las partes manifiesta a la otra su voluntad de poner término al arrendamiento a través de un aviso. Dicho aviso se debe notificar mediante carta certificada al domicilio consignado por las partes en la comparecencia, con a lo menos 60 días de anticipación a la fecha de vencimiento del plazo pactado precedentemente o de una cualquiera de sus prórrogas.  En caso que el arrendatario quisiera poner término al arriendo antes del plazo convenido, restituyendo al efecto la propiedad, deberá cancelar la renta del período faltante para la terminación del contrato de arrendamiento. Si pasado un año, la parte arrendadora quisiera ponerle término al contrato de arrendamiento en cualquier momento, deberá comunicarlo a través de carta certificada al domicilio del arrendatario a lo  menos con 60 días de anticipación.-<br><br>

    <b>3.- RENTA:</b> La renta mensual de arrendamiento será la suma <b>$ <?php echo  number_format($model->valor_arriendo, 0, ",", "."); ?></b>, a esta cantidad hay que agregar como costo adicional el gasto común mensual, el cual será cobrado y pagado en la Administración del Condominio  teniendo la obligación el arrendatario de informar al arrendador la fecha con que fue cancelado y enviar el comprobante de éste al email del administrador por este arrendador y que se pagarán  por anticipados dentro de los primeros cinco días de cada mes en el domicilio del arrendatario o en la fecha  que la administración del edificio los derive, otorgándose los  recibos o liquidaciones correspondientes. En caso de mora o simple retardo en el pago de la renta de arrendamiento, se deberá pagar el equivalente al 1% de la renta pactada por cada día de atraso. Si como consecuencia del retardo se le encarga a un abogado la cobranza judicial, el arrendatario deberá pagar además, el honorario de esta cobranza, ascendente al 10% de la suma adeudada, acogiéndose a lo establecido en las cláusulas 4ª y 5ª de este contrato de arrendamiento.<br><br>

    <b>4.- REAJUSTE:</b> La renta se reajustará durante toda la vigencia del arrendamiento; reajuste que se hará cada 6 meses, en la misma proporción o porcentaje en que haya podido variar el Índice de Precios al Consumidor (IPC) determinado por el Instituto Nacional de Estadísticas o por el organismo que lo reemplace, del período anterior y en forma acumulada. Para los efectos de calcular el porcentaje de este reajuste, se tomará el número de 6 meses inmediatamente anterior al mes en que se deba reajustar la renta de arrendamiento para su pago. Si durante algún periodo resulta un IPC negativo, se mantendrá el canon de arriendo que está rigiendo en ese momento hasta el próximo reajuste.<br><br>

    <b>5.- MES DE GARANTÍA:</b> El arrendatario entrega en este acto la cantidad correspondiente a 1 mes de renta, (<b>$ <?php echo  number_format($model->valor_arriendo, 0, ",", "."); ?></b>) con el fin de garantizar la conservación de la propiedad y su restitución en el mismo estado en que la recibe; la devolución y conservación de las especies y artefactos que se indicarán en el inventario; el pago de los perjuicios y deterioros que se causen en la propiedad arrendada, sus servicios e instalaciones; y, en general, para responder del fiel cumplimiento de las estipulaciones de este contrato de arrendamiento, en concepto de fianza o mes de garantía, suma que se entrega en efectivo, y deberá devolverse con los debidos reajustes de IPC – y también en efectivo- en el plazo de un mes a contar desde el día en que se devuelvan las llaves al arrendador. El mes de garantía no podrá ser cargado a mes de arriendo, y se autoriza al arrendatario, desde ahora, a deducir de su monto los detrimentos sufridos  en el inmueble cuya responsabilidad sea atribuible al arrendador.<br><br>

    <b>6.- OTROS PAGOS DEL CARGO DEL ARRENDATARIO:</b> Estará obligado  a pagar puntualmente, los consumos de servicios básicos como electricidad, agua potable, gas, extracción de basura y los gastos comunes que tiene el departamento. El atraso de un mes en cualquiera de los pagos indicados, dará derecho al arrendador para solicitar la suspensión de los servicios respectivos. Asimismo, el arrendatario deberá enviar oportunamente al domicilio del arrendador, el aviso de pago del Impuesto Territorial (o Contribuciones) que afecta al inmueble objeto del contrato de arrendamiento.<br><br>

    <b>7.- REAJUSTES EN OBLIGACIONES MOROSAS:</b> En caso de no pago oportuno de la renta de arrendamiento se cobrará una multa de $ 0 por cada día de atraso.<br><br>

    <b>8.- PROHIBICIONES AL ARRENDATARIO:</b> Queda expresamente prohibido al arrendatario y su infracción acarreará el término Ipso-Facto del presente contrato de arrendamiento con  la sola notificación del arrendador por carta certificada al arrendatario dándose cumplimiento a la cláusula 2ª del presente contrato de arrendamiento:<br>

    a)    Ceder, subarrendar, transferir a cualquier título y destinar el inmueble arrendado a un objeto diferente al convenido en la cláusula 1ª del presente contrato de arrendamiento (habitación).<br>
    b)    No mantener la propiedad arrendada en buen estado de conservación.<br>
    c)    Atrasarse en el pago de las cuentas de luz, agua, gas y gastos comunes.<br>
    d)    Ejecutar obra alguna en la propiedad, sin previa autorización escrita del arrendador.<br>
    e)   Reiterados ruidos molestos que afecten la buena convivencia de la comunidad.<br>
    f)     Clavar o agujerear paredes, introducir materiales explosivos, inflamables o de mal olor en la propiedad arrendada.<br>
    g)    No dar cumplimiento a lo dispuesto en el Reglamento  de Convivencia Interno del Condominio  el cual fue comentado por  su arrendador.<br>
    i)     Introducir animales, materiales explosivos, inflamables o de mal olor en la propiedad arrendada.<br><br>

    <b>9.- RESTITUCIÓN DEL IMUEBLE:</b> El arrendatario debe devolver la vivienda, al concluir el arriendo, tal como la recibió, salvo lo que hubiese perecido o se hubiera menoscabado por el tiempo o por causa inevitable.<br><br>

    <b>10.- MANTENCIÓN DEL INMUEBLE:</b><br>

    a) De parte del arrendador: El  arrendador está obligada a realizar todas las reparaciones necesarias en el inmueble, que ocurran o hubiesen acaecido por menoscabado por el tiempo o por causa inevitable,  o fuerza mayor, a fin de que el inmueble esté en óptimas condiciones para ser habitado al momento de ser arrendado y mientras dure el arrendamiento, para conservar la vivienda en estado de servir para el uso al que ha sido destinado, sin tener derecho a elevar la renta por ello, así como a mantener al arrendatario en el goce pacífico del arrendamiento por todo el tiempo del contrato.-<br>

    b) de Parte del arrendatario: Se obliga a mantener en buen estado el aseo y conservación de la propiedad arrendada y todas  las instalaciones del departamento, como asimismo a arreglar por su cuenta deterioros que haya producido por su acción en los cielos, pisos, paredes, vidrios, pinturas, instalaciones, grifería u otros.Del mismo modo se obliga la arrendataria a responder de los deterioros que en los bienes comunes  o  en el  resto del inmueble, o propiedades vecinas puedan causar el mismo, el personal que trabaje para el o bajo su dependencia y las personas que visiten o concurran al inmueble arrendado por cualquier motivo, siendo de su cargo la reparación de los daños causados. El arrendatario no tendrá obligación de efectuar mejoras, conviniéndose que las que haga el arrendatario quedaran a beneficio de la propiedad sin que el dueño este obligado a cancelar suma alguna por ella.<br>
<br>
    <b>11.- RESTITUCIÓN DEL INMUEBLE:</b>  El arrendatario se obliga a restituir el inmueble arrendado, inmediatamente que se cumpla el plazo de desahucio estipulado, entrega que deberá hacerse mediante la desocupación total de la propiedad poniéndola a disposición del arrendador  entregándoles las llaves.<br><br>

    <b>12.- VARIOS:</b> El arrendador no responderá por robos que puedan ocurrir en la propiedad arrendada o por perjuicio causados por incendio, inundaciones, roturas de cañerías, efectos de humedad o calor, etc. Se prohíbe al arrendatario modificar desagües, instalaciones de agua, luz eléctrica, sin permiso escrito del arrendador, como a si mismo hacer variaciones en parte algunas de la propiedad, como en la pintura, estructuras internas o separaciones de ambientes. De producirse desperfectos en el inmueble cuya reparación correspondan al arrendador, el arrendatario deberá darle aviso inmediato de lo sucedido. Si los arreglos no se efectuaren dentro de 10 días, el arrendatario estará facultado para reparar los desperfectos él mismo, y descontar los gastos del pago de la renta de arrendamiento del mes siguiente.<br><br>

    <b>13.- MOROSIDAD DEL ARRENDATARIO:</b> Con el objeto de dar cumplimiento a la ley N° 19628, sobre protección de datos de carácter personal el arrendatario faculta irrevocable al arrendador o al administrador del inmueble arrendado indistintamente, para que cualquiera de ellos pueda dar a conocer la morosidad en el pago de las rentas de arrendamiento, gastos comunes y consumos del inmueble arrendado, proporcionando dicha información a cualquier registro o banco de datos personales en el que funcione SICOM (sistema consolidado de morosidades y protesto) de Dicom S.A., o la empresa que asuma estas funciones con el objeto de que sea divulgado, relevando el arrendamiento o la responsabilidad que se pueda derivar al efecto.<br><br>

    <b>14.- RESOLUCIÓN DEL CONTRATO:</b> Serán motivos plausibles para que el arrendador desahucie el contrato de arrendamiento, los generales previstos en la ley, y especialmente los siguientes: cuando el arrendatario incumpla su obligación de pago de la renta, así cuando tengan lugar actividades molestas, insalubres, nocivas, peligrosas o ilícitas, y cuando se incumpla por parte del arrendatario lo dispuesto en las cláusulas del presente contrato de arrendamiento, y/o lo estipulado en el Reglamento de copropiedad que la arrendataria declara conocer.<br><br>

    <b>15.- RESTITUCIÓN DEL IMUEBLE:</b> El arrendatario debe devolver la vivienda, al concluir el arriendo, tal como la recibió, entrega que deberá hacer mediante la desocupación total de la propiedad, poniéndola a disposición del arrendador y entregándole las llaves y todas sus copias.<br>

    La no restitución de la propiedad en la época señalada, hará incurrir al arrendatario en una multa mensual equivalente al 50% de la renta pactada en este contrato de arrendamiento, suma en que las partes avalúan anticipadamente y de común acuerdo los perjuicios.<br><br>

    <b>16.- ESTADO DEL INMUEBLE:</b> Se deja constancia que se entrega el inventario completo de las especies que quedan en el inmueble, de propiedad del arrendador, como anexo Nº 1 del presente contrato de arrendamiento, debidamente firmado por los contratantes, el departamento se entrega en buenas condiciones, sus servicios se  encuentran cancelados y funcionando en buena forma.<br><br>

    <b>17.- CUENTAS SERVICIOS BÁSICOS:</b> La propiedad se arrienda  con  sus servicios  de luz, agua, gas y gastos comunes  al día.<br><br>

    <b>18.- JURISDICCIÓN:</b> Para todos los efectos legales, las partes fijan su domicilio en la ciudad de <b>Calama</b>.-<br><br><br><br><br><br>
    <div class="izquierda">
    ________________________________________<br>
    ARRENDADOR<br>
        <b><?php echo $model->propiedad->cliente->nombres_cliente?> <?php echo $model->propiedad->cliente->apellidos_cliente?></b>
    </div>
    <div class="derecha">
    ________________________________________<br>
    ARRENDATARIO<br>
        <b><?php echo $model->arrendatario->nombres_arrendatario?> <?php echo $model->arrendatario->apellidos_arrendatario?> </b>
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