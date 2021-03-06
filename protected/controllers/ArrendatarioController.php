<?php

class ArrendatarioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/intralayout';

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
				'actions'=>array('create','update','index','view', 'codigo', 'docu', 'download', 'select', 'select2'),
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
		if(Yii::app()->user->hasFlash('success')){
			$msgs=Yii::app()->user->getFlashes();
			foreach ($msgs as $key => $value) {
				Yii::app()->user->setFlash($key,$value);
			}
		}
		$model2=new Documento();
		$rut=$this->codigo($id);
		$this->render('view',array(
			'model'=>$this->loadModel($rut),
			'model2'=>$model2,
		));
	}
	public function actionDocu($id)
	{
		$rut = $this->codigo($id);
		$model=new Documento();
		Yii::import("ext.EAjaxUpload.qqFileUploader");
    $folder=Yii::app() -> getBasePath() . "/../documento/propiedad/";// folder for uploaded files
    $allowedExtensions = array("jpg","jpeg","gif","png","pdf","doc","docx");//array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit =25 * 1024 * 1024;// maximum file size in bytes
    $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
    $result = $uploader->handleUpload($folder);
    $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
    $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	  $fileName=$result['filename'];//GETTING FILE NAME
		$model->rut_arrendatario=$rut;
		$model->url_documento = $fileName;
		$model->save();
    echo $return;// it's array
	}

	function actionDownload($type)
	{
	  $filecontent=file_get_contents(Yii::app()->getBasePath()."/../documento/propiedad/".$type);
	  header("Content-Type: text/plain");
	  header("Content-disposition: attachment; filename=$type");
	  header("Pragma: no-cache");
	  echo $filecontent;
	  exit;
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Arrendatario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Arrendatario']))
		{
			$model->attributes=$_POST['Arrendatario'];
			$rut= str_replace('.','',$model->rut_arrendatario);
			$model->rut_arrendatario = $rut;
			$data = explode('-', $model->rut_arrendatario);
			if($model->save()){
				Yii::app()->user->setFlash('success','El arrendatario fue ingresado correctamente.');
				$this->redirect(array('view','id'=>$data[0]));}
		}

		$this->render('create',array(
			'model'=>$model,
		));
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
		$rut=$this->codigo($id);
		$model=$this->loadModel($rut);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Arrendatario']))
		{
			$model->attributes=$_POST['Arrendatario'];
			$data = explode('-', $model->rut_arrendatario);
			if($model->save())
				$this->redirect(array('view','id'=>$data[0]));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionSelect()
	{
		$model=new Arrendatario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Arrendatario']))
			$model->attributes=$_GET['Arrendatario'];

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
		$rut=$this->codigo($id);
		$model=	$this->loadModel($rut);
		$model->activo_arrendatario=0;
		if ($model->save()) {
			$criteria = new CDbCriteria();
	    $criteria->addCondition("rut_arrendatario=:rut");
	    $criteria->params = array(':rut' => $rut);
	    $list = Arriendo::model()->findAll($criteria);
			foreach ($list as $key => $value) {
				$value->activo_arriendo=0;
				$propiedad=Propiedad::model()->findByPk($value->id_propiedad);
				$propiedad->activo_propiedad =1;
				if ($value->save() xor $propiedad->save()) {
					Yii::app()->user->setFlash('danger','El arriendo '.$value->id_arriendo.' y su propiedad '.$propiedad->id_propiedad.' No puedieron modificarse.');
	        $this->redirect(Yii::app()->request->baseUrl.'/arrendatario/index/');
				}
			}
			if(!isset($_GET['ajax'])){
	      Yii::app()->user->setFlash('success','El arrendatario '.$model->rut_arrendatario.' y todas sus dependencias fueron eliminadas.');
	      $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	    }
		}else {
			Yii::app()->user->setFlash('danger','La arrendatario '.$model->rut_arrendatario.' no ha podido ser eliminado.');
			$this->redirect(Yii::app()->request->baseUrl.'/arrendatario/index/');
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
	}

	public function actionEliminar($id)
	{
		$rut=$this->codigo($id);
		$this->render('eliminar', array('model'=>$this->loadModel($rut)));
	}

	public function actionSelect2()
	{
		$model=new Arrendatario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Arrendatario']))
			$model->attributes=$_GET['Arrendatario'];
		$this->render('select2',array(
			'model'=>$model,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Arrendatario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Arrendatario']))
			$model->attributes=$_GET['Arrendatario'];
		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Arrendatario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Arrendatario']))
			$model->attributes=$_GET['Arrendatario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Arrendatario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Arrendatario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Arrendatario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='arrendatario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
