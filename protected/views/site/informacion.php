<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'cliente-form',
  // Please note: When you enable ajax validation, make sure the corresponding
  // controller action is handling ajax validation correctly.
  // There is a call to performAjaxValidation() commented in generated controller code.
  // See class documentation of CActiveForm for details on this.
  'enableAjaxValidation'=>false,
  )); ?>
<section class="container informacion">
    <div class="col-md-6 ">
        <div  class='google-map2 ' id='map' streetnumber=<?php echo '2337';  ?> streetname=<?php echo 'Atacama';  ?>
             cityname='calama' statecode='CL' zipcode='0'
             zoom=17 width=500 height=450>
        </div>
        <script>$('#map').googlemap();</script>

    </div>
    <div class=" col-md-6">
        <h4>Valor $ 500.000 <button type="button" style="float: right" class="btn btn-success " onclick="javascript:window.print()">Imprimir </button></h4>
        <ul class="list-group">

            <li class="list-group-item"><i class="fa fa-map-marker"></i> Ubicaci&#243;n: </li>
            <li class="list-group-item"><i class="fa fa-bed"></i> Dormitorios: </li>
            <li class="list-group-item"><a  href="#"><img class="" width="12" height="14" src="<?php echo Yii::app()->request->baseUrl; ?>/images/bano.png"></a> Ba&#241;os:</li>
            <li class="list-group-item"><i class="fa fa-object-ungroup"></i> &#x33a1; Totales: </li>
            <li class="list-group-item"><i class="fa fa-object-group"></i> &#x33a1; Construidos: </li>
            <li class="list-group-item"><i class="fa fa-building"></i> T&#314;po: </li>
            <li class="list-group-item"><i class="fa fa-hand-stop-o"></i> Estado: En Venta</li>
            <li class="list-group-item"><img class="" width="16" height="18" src="<?php echo Yii::app()->request->baseUrl; ?>/images/sofa.png"></a> Amoblado: </li>
            <li class="list-group-item"><i class="fa fa-comment"></i> Descripci&#243;n: </li>


        </ul>
    </div>
</section>
<section class="container informacion">
    <div class=" col-md-12">
        <h1>Imagenes</h1>

        <div class="col-lg-3 col-sm-4 col-xs-6"><a  href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p4.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a  href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p4.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a  href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p2.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a  href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p2.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a  href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p3.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a  href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p3.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a  href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p3.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a  href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p3.jpg"></a></div>

    </div>

</section>
<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
