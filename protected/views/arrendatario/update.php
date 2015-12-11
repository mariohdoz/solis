<?php
/* @var $this ArrendatarioController */
/* @var $model Arrendatario */

$this->breadcrumbs=array(
	'Arrendatarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Arrendatario', 'url'=>array('index')),
	array('label'=>'Manage Arrendatario', 'url'=>array('admin')),
);
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Actualizar
	    <small>Actualizar el arrendatario <?php echo CHtml::encode($model->rut_arrendatario); ?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Arrendatarios</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Actualizar</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
			<div class="col-md-12">
				<?php if(($msgs=Yii::app()->user->getFlashes())!=null): ?>
         <?php foreach($msgs as $type => $message):?>
           <div class="alert alert-<?php echo $type;?>" style="margin-left: 10px; margin-right: 10px ">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong><?php
							 if($type == 'danger'){
								 echo 'Error';
							 }elseif ($type == 'success'){
								 echo 'Éxito';
							 };
							?> !</strong> <?php echo $message;?>.
           </div>
         <?php endforeach;?>
       <?php endif; ?>
			</div>
      <!-- Inicio se container -->
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
      <!-- término se container -->
    </div>
  </section>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.Rut.min.js" type="text/javascript"></script>
<script>
$("#Arrendatario_rut_arrendatario").Rut({
	on_error: function(){
		alert('El RUT ingresado es incorrecto.');
		$("#Arrendatario_rut_arrendatario").val('');
	},
})
$("#Arrendatario_rut_arrendatario").click(function(){
	$("#Arrendatario_rut_arrendatario").val('');
})
</script>
