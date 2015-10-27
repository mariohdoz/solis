<?php echo CHtml::link('Delete',"#", array("submit"=>array('delete', 'id'=>$data->ID), 'confirm' => 'Are you sure?')); ?>


<?php



 /**$model = new Cliente();
$model->attributes=$_POST['Cliente'];
$model = Cliente::model()->findByPk($model->rut_cliente);
if($model === null){
  $this->render('select', array('model', $model));
}else{
  $this->render('update',array(
    'model'=>$model,
  ));
}

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

/**if(isset($_POST['Cliente']))
{
  $model->attributes=$_POST['Cliente'];
  if($model->save())
    $this->redirect(array('view','id'=>$model->rut_cliente));
}

$this->render('update',array(
  'model'=>$model,
));*/



/**$model=$this->loadModel($id);
$layout='intralayout';
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
if(isset($_POST['Propiedad']))
{
  $model->attributes=$_POST['Propiedad'];
  if($model->save())
    $this->redirect(array('view','id'=>$model->id_propiedad));
}
$this->render('update',array(
  'model'=>$model,
));*/

?>
