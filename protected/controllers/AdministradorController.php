<?php

class AdministradorController extends Controller
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
				'actions'=>array('create','update','index','view','upload','eliminar'),
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
	public function actionEliminar($id)
	{
		$rut=$this->codigo($id);

		$model=$this->loadModel($rut);
		$model->setScenario('update');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Administrador']))
		{
			$model->attributes=$_POST['Administrador'];
			if($model->save()){
				$this->redirect(array('view','id'=>$id));
			}
		}

		$this->render('delete',array(
			'model'=>$model,
		));
	}
	public function actionCambio($id)
	{
		$rut=$this->codigo($id);
		$model=$this->loadModel($rut);
		$model->setScenario('cambio');
		if(isset($_POST['Administrador']))
		{
			$model->attributes=$_POST['Administrador'];
			if ($model->contrasena_admin == $model->repeat_pass) {
				if($model->save()){
					Yii::app()->user->setFlash('success','La contraseña fue actualizada');
					$this->redirect(array('view','id'=>$id));
				}else {
					Yii::app()->user->setFlash('danger','La contraseña no fue actualizada');
				}
			}else {
				Yii::app()->user->setFlash('danger','La contraseña no coinciden');
			}

		}
		$model->rut_admin = $model->Puntos;

		$this->render('update',array(
			'model'=>$model,
		));

	}
	public function actionView($id)
	{
		if(Yii::app()->user->hasFlash('success')){
			$msgs=Yii::app()->user->getFlashes();
			foreach ($msgs as $key => $value) {
				Yii::app()->user->setFlash($key,$value);
			}
		}
		$formulario=new Administrador('search');
		$formulario->unsetAttributes();  // clear any default values
		if(isset($_GET['Administrador']))
			$formulario->attributes=$_GET['Administrador'];
		$rut=$this->codigo($id);
		$this->render('view',array(
			'model'=>$this->loadModel($rut),
			'formulario'=>$formulario,
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$administrador=new Administrador;
		$administrador->setScenario('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($administrador);

		if(isset($_POST['Administrador']))
		{
			$administrador->attributes=$_POST['Administrador'];
			if($administrador->perfil_admin){
				$administrador->perfil_admin = 'dist/img/avatar5.png';
			}else {
				$administrador->perfil_admin = 'dist/img/avatar3';
			}
			$rut= str_replace('.','',$administrador->rut_admin);
			$administrador->rut_admin = $rut;
			if($administrador->save()){
				$data = explode('-', $model->rut_funcionario);
				$this->redirect(array('view','id'=>$data[0]));
			}
		}

		$this->render('create',array(
			'administrador'=>$administrador,
		));
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
		$model->setScenario('update');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Administrador']))
		{
			$model->attributes=$_POST['Administrador'];
			$rut= str_replace('.','',$model->rut_admin);
			$model->rut_admin = $rut;
			if($model->save()){
				$this->redirect(array('view','id'=>$id));
			}
		}
		$model->rut_admin = $model->formato;

		$this->render('update',array(
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
		$model=$this->loadModel($rut);
		$model->activo_admin = 0;
		$model->save();
		$as=Yii::app()->session['admin_rut'];
		$data = explode('-', $model->rut_admin);
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view', 'id'=>$data[0]));
	}
	public function actionUpload($id)
	{
		  $rut=$this->codigo($id);
		  $admin = Administrador::model()->findByPk($rut);
		  Yii::import("ext.EAjaxUpload.qqFileUploader");
		  $folder=Yii::app() -> getBasePath() . "/../dist/img/";// folder for uploaded files
		  $allowedExtensions = array("jpg","jpeg","gif","png");//array("jpg","jpeg","gif","exe","mov" and etc...
		  $sizeLimit = 5 * 3024 * 3024;// maximum file size in bytes
		  $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		  $result = $uploader->handleUpload($folder);
		  $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		  $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		  $fileName=$result['filename'];//GETTING FILE NAME
		  $admin->perfil_admin = '/dist/img/'.$fileName;
		  if($admin->save())
				Yii::app()->session['admin_img']= $admin->perfil_admin;
		  echo $return;// it's array
}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Administrador');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Administrador('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Administrador']))
			$model->attributes=$_GET['Administrador'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Administrador the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Administrador::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Administrador $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='administrador-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionContra($id)
	{
		$rut=$this->codigo($id);
		$model=$this->loadModel($rut);
		if (isset($_POST['Administrador'])) {
			$model->attributes=$_POST['Administrador'];
			if ($model->repeat_pass != '') {
				if ($model->contrasena_admin == $model->repeat_pass) {
					if ($model->save()) {
						Yii::app()->user->setFlash('success','La contraseña fue actualizada');
					}else {
						Yii::app()->user->setFlash('error','La contraseña  no fue actualizada');
					}
				}else {
					Yii::app()->user->setFlash('error','Las contraseñas no coinciden');
				}
			}else {
				Yii::app()->user->setFlash('error','debe repetir la contraseña');
			}
		}
		$this->redirect(array('view','id'=>$id));
	}
}
