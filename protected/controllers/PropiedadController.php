<?php

class PropiedadController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/intraLayout';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'index','view', 'obtener', 'codigo', 'upload', 'docu', 'select', 'select2'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$model1=new Imagen();
    $model2 = new Cliente();
    $model2 = Cliente::model()->findByPk($model->rut_cliente);
		Yii::app()->user->setFlash('success','La propiedad ha sido ingresada correctamente. Por favor subir imágenes de la propiedad.');
		$this->render('view',array(
			'model'=>$model,
			'model1'=>$model1,
			'model2'=>$model2,
		));
	}

	public function actionUpload($id)
	{
		$model = new Imagen;
		Yii::import("ext.EAjaxUpload.qqFileUploader");
    $folder=Yii::app() -> getBasePath() . "/../images/propiedades/";// folder for uploaded files
    $allowedExtensions = array("jpg","jpeg","gif","png");//array("jpg","jpeg","gif","exe","mov" and etc...
    $sizeLimit = 5 * 3024 * 3024;// maximum file size in bytes
    $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
    $result = $uploader->handleUpload($folder);
    $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
    $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	  $fileName=$result['filename'];//GETTING FILE NAME
		$model->url_imagen = $fileName;
		$model->id_propiedad = $id;
		$model->save();
    echo $return;// it's array
	}

	public function actionDocu()
	{
		Yii::import("ext.EAjaxUpload.qqFileUploader");
    $folder=Yii::app() -> getBasePath() . "/../documento/propiedad/";// folder for uploaded files
    $allowedExtensions = array("jpg","jpeg","gif","png","pdf","doc","docx");//array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit =25 * 1024 * 1024;// maximum file size in bytes
    $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
    $result = $uploader->handleUpload($folder);
    $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
    $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	  $fileName=$result['filename'];//GETTING FILE NAME
    echo $return;// it's array
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Propiedad;
		$model2=new Cliente;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Propiedad']))
		{
			$model->attributes=$_POST['Propiedad'];
			$cadena = str_replace('.','',$model->rut_cliente);
			$model->rut_cliente =$cadena;
			$valor = intval(preg_replace('/[^0-9]+/', '', $model->valor_propiedad),10);
			$model->valor_propiedad = $valor;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_propiedad));
		}
		$criteria = new CDbCriteria();
		$criteria->condition='activo_cliente =1';

		$dataProvider=new CActiveDataProvider(Cliente::model(), array(
			'keyAttribute'=>'rut_cliente',// IMPORTANTE, para que el CGridView conozca la seleccion
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>5,
			),
			'sort'=>array(
				'defaultOrder'=>array('rut_cliente'=>true),
			),
		));

		$this->render('create',array(
			'model'=>$model,
			'model2'=>$model2,
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionObtener($id)
	{
		$rut=$this->codigo($id);
		$resp = Cliente::model()->findAllByAttributes(array('rut_cliente'=>$rut));
		if ($resp) {
			header("Content-type: application/json");
			echo CJSON::encode($resp);
		}else {
			$resp = '';
			header("Content-type: application/json");
			echo CJSON::encode($resp);
		}

	}

	public function codigo($var)
	{
		$evaluate = strrev($var);
		$multiply = 2;
		$store = 0;
		for ($i = 0; $i < strlen($evaluate); $i++) {
			 $store += $evaluate[$i] * $multiply;
			 $multiply++;
			 if ($multiply > 7)
					 $multiply = 2;
		}
		$result = 11 - ($store % 11);
		if ($result == 10)
			 $result = 'k';
		if ($result == 11)
			 $result = 0;
		$rut = $var.'-'.$result;
		return $rut;
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$model2=new Cliente();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Propiedad']))
		{
			$model->attributes=$_POST['Propiedad'];
			if($model->save()){
				Yii::app()->user->setFlash('success','La propiedad fue actualizada exitozamente.');
				$this->redirect(array('view','id'=>$model->id_propiedad));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	public function actionSelect()
	{
		$model=new Propiedad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Propiedad']))
			$model->attributes=$_GET['Propiedad'];

		$this->render('select',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		$model->activo_propiedad=0;
		$model->eliminado_propiedad=1;
		if($model->save()){
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser

	}

	public function actionSelect2()
	{
		$model=new Propiedad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Propiedad']))
			$model->attributes=$_GET['Propiedad'];

		$this->render('select2',array(
			'model'=>$model,
		));
	}

	public function actionEliminar($id)
	{
		$model=$this->loadModel($id);
		$model3=new cliente;
		$model3=cliente::model()->findByPk($model->rut_cliente);
		$this->render('eliminar',array(
			'model'=>$model, 'model3'=>$model3
		));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Propiedad');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Propiedad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Propiedad']))
			$model->attributes=$_GET['Propiedad'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Propiedad the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Propiedad::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Propiedad $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='propiedad-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
