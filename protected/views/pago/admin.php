<div class="content-wrapper">
  <section class="content-header">
    <h1>
        Estado de
        <small>Pagos.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
            <i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Estado de pagos</li>
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
               if($type == 'error'){
                 echo 'Error';
               }elseif ($type == 'success'){
                 echo 'Éxito';
               };
              ?> !</strong> <?php echo $message;?>
           </div>
         <?php endforeach;?>
       <?php endif; ?>
      </div>


      <!-- Inicio se container -->
			<?php	foreach ($arriendo->pago as $key => $value): ?>
				<div class="col-md-12">
					<div class="box <?php /**echo $value->activo_pago? 'box-primary':'box-success'*/
					$a =date('m-Y-j');
					$b =$value->mes_pago;
					$data= explode('-',$a);
					$datb= explode('-',$b);
          if($value->activo_pago==1){
            if(($data[0]>$datb[1] && $data[1]>$datb[2]) || ($data[0]>$datb[1] && $data[1]==$datb[2]) ){
              echo 'box-solid box-danger';
            }elseif (($data[0]==$datb[1] && $data[1]==$datb[2]) && $arriendo->fechapago_arriendo <= $data[0]  ) {
              echo 'box-solid box-warning';
            }else{
              echo 'box-solid box-primary';
            }
          }else{
            echo ' box-solid box-success';
          }

					 ?>">
						<div class="box-header with-border">
	            <h3 class="box-title">Fecha de pago <?php echo date("d/m/Y", strtotime($value->mes_pago	)) ?></h3>
	          </div>
						<div class="form">
							<div class="box-body">
                <div class="col-xs-12 col-md-3 col-lg-3">
        					<div class="form-group">
                    <label for="end">Pago acumulado a la fecha</label>
                    <input class="form-control" name="Pago[end]" id="end" type="text" value ='<?php echo CHtml::encode($value->totalpagado_pago); ?>' disabled="true">
        					</div>
        				</div>
                <div class="col-xs-12 col-md-3 col-lg-3">
        					<div class="form-group">
                    <label for="end">Deuda acumulado a la fecha</label>
                    <input class="form-control" name="Pago[end]" id="end" type="text" value ='<?php $var = $arriendo->valor_arriendo-$value->totalpagado_pago ; echo $var; ?>' disabled="true">
        					</div>
        				</div>
                <div class="col-xs-12 col-md-3 col-lg-3">
        					<div class="form-group">
                    <label for="end">Valor total del arriendo</label>
                    <input class="form-control" name="Pago[end]" id="end" type="text" value ='<?php echo CHtml::encode($arriendo->valor_arriendo); ?>' disabled="true">
        					</div>
        				</div>
						  </div>
	            <div class="box-footer">
                <?php
                $b =$value->mes_pago;
                $datb= explode('-',$b);
                 echo CHtml::link('Administrar pago', array('/pago/update/', 'id'=>$value->id_pago, 'm'=>$datb[1] , 'a'=>$datb[2]), array('class'=>"btn btn-primary", $value->activo_pago? '':'disabled'=>true,)); ?>
                 <?php echo CHtml::link('Reiniciar valores del pago', array('/pago/limpiar/', 'id'=>$value->id_pago), array('class'=>"btn btn-danger",  'confirm' => '¿Está seguro de reiniciar los valores del pago?')); ?>
	            </div>
					  </div>
				  </div>
	      </div>
			<?php endforeach; ?>
      <!-- término se container -->
    </div>
  </section>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.formatCurrency-1.4.0.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/i18n/jquery.formatCurrency.es-CL.js" type="text/javascript"></script>
<script>
 $(document).ready(function(){
   $('input').formatCurrency({region: 'es-CL',roundToDecimalPlace:-1});
 });
</script>
