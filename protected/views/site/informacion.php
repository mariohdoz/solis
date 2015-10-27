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
        <div  class='google-map2 ' id='map' streetnumber=<?php echo '1301';  ?> streetname=<?php echo 'Tiltil';  ?>
             cityname='calama' statecode='CL' zipcode='0'
             zoom=17 width=500 height=450>
        </div>
        <script>$('#map').googlemap();</script>

    </div>
    <div class=" col-md-6">
        <h4>Valor $ 500.000</h4>
        <ul class="list-group">
            <li class="list-group-item"><i class="fa fa-map-marker"></i> Ubicaci&#243;n: </li>
            <li class="list-group-item"><i class="fa fa-bed"></i> Dormitorios: </li>
            <li class="list-group-item"><i class="fa fa-th-large"></i> Ba&#241;os:</li>
            <li class="list-group-item"><i class="fa fa-object-ungroup"></i> &#x33a1; Totales: </li>
            <li class="list-group-item"><i class="fa fa-object-group"></i> &#x33a1; Construidos: </li>
            <li class="list-group-item"><i class="fa fa-building"></i> T&#314;po: </li>
            <li class="list-group-item"><i class="fa fa-hand-stop-o"></i> Estado: En Venta</li>
            <li class="list-group-item"><i class="fa fa-puzzle-piece"></i> Amoblado: </li>
            <li class="list-group-item"><i class="fa fa-comment"></i> Descripci&#243;n: </li>

        </ul>
    </div>

</section>
<section class="container informacion">
    <div class=" col-md-12">
        <h1>Imagenes</h1>

        <div class="col-lg-3 col-sm-4 col-xs-6"><a  href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p4.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a  href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p2.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a  href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p3.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a  href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p2.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a  href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p4.jpg"></a></div>
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
