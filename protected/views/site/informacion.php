<div class="container">
    <div class="row">
        <h1>Bootstrap 3 Lightbox image gallery using Modal</h1>

        <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 1" href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p4.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 2" href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p2.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 3" href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p3.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 4" href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p2.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 5" href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p4.jpg"></a></div>
        <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 6" href="#"><img class="thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/propiedades/p3.jpg"></a></div>

        <hr>

        <hr>
    </div>
</div>
<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Heading</h3>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>