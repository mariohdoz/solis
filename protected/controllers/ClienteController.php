<?php

class ClienteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/intralayout';

	/**
	 * @return array action filters
	 */
	public function actions()
	{
		return array(
			'captcha'=>array(
					'class'=>'CCaptchaAction',
					'backColor'=>0xFFFFFF,
			),
			'page'=>array(
					'class'=>'CViewAction',
			),
			'upload'=>array(
					'class' => 'ext.EAjaxupload.EAjaxUpload',
					'save' => array(
							'modelClass' => 'EventAttachments',
							'foreignKey' => 'event_id',
					),
					'delete' => array(
							'modelClass' => 'EventAttachments',
							'foreignKey' => 'event_id',
					),
			)
		);
	}
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
				'actions'=>array('create','update','documento','index','view', 'eliminar'),
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
		$rut=$this->codigo($id);
		$this->render('view',array(
			'model'=>$this->loadModel($rut),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Cliente;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Cliente']))
		{
			$model->attributes=$_POST['Cliente'];
			if($model->save()){
				$data = explode('-',$model->rut_cliente);
				$this->redirect(array('documento','id'=>$data[0]));
			}else{
				$this->render('create',array(
					'model'=>$model,
				));
			}
		}else{
			$this->render('create',array(
				'model'=>$model,
			));
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

	public function actionDocumento($id){
		$rut=$this->codigo($id);
		$this->render('view',array(
			'model'=>$this->loadModel($rut),
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$rut = $this->codigo($id);
		$model=$this->loadModel($rut);
		$layout='intralayout';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Cliente']))
		{
		  $model->attributes=$_POST['Cliente'];

		  if($model->save()){
				$data = explode('-',$model->rut_cliente);
		    $this->redirect(array('view','id'=>$data[0]));
			}
		}
		$this->render('update',array(
		  'model'=>$model,
		));
	}

	public function actionSelect()
	{
		$model = new Cliente;
		$this->render('select', array('model'=>$model));
	}

	public function actionEliminar()
	{
		$model = new Cliente;
		$this->render('select2', array('model'=>$model));
	}

	public function actionDesactivar()
	{
		$model= new Cliente;
		$model->attributes=$_POST['Cliente'];
		$model = Cliente::model()->findByPk($model->rut_cliente);
		if($model === null){
			$this->render('select2', array('model', $model));
		}else{
			$this->render('documento',array(
				'model'=>$model,
			));
		}
	}

	public function actionDesa($id)
	{
		$rut=$this->codigo($id);
		$model1 = new Cliente;
		$cliente = new Cliente;
		$cliente = $this->loadModel($rut);
		$criteria = new CDbCriteria();
		$criteria->addCondition("rut_cliente=:rut");
		$criteria->params = array(':rut' => $rut);
		$list = Propiedad::model()->findAll($criteria);
		foreach($list as $model)
		{
		   $model->eliminado_propiedad = 1;
			 if (!$model->save()) {
				 Yii::app()->user->setFlash('danger','Esto es un error');
				 $this->redirect(Yii::app()->request->baseUrl.'/cliente/modificar/');
			 }
		}
		$cliente->activo_cliente = 0;
		if ($cliente->save()) {
			Yii::app()->user->setFlash('success','Exitooo!!!!');
			$this->redirect(Yii::app()->request->baseUrl.'/cliente/index/');
		}else{
			Yii::app()->user->setFlash('danger','Error al eliminar el cliente.');
			$this->redirect(Yii::app()->request->baseUrl.'/cliente/select2/', array('model'=>$model1));
		}
	}

	public function actionModificar(){
		$model = new Cliente();
		$model->attributes=$_POST['Cliente'];
		$model = Cliente::model()->findByPk($model->rut_cliente);
		if($model === null){
		  $this->render('select', array('model', $model));
		}else{
		  $this->render('update',array(
		    'model'=>$model,
		  ));
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->select = 't.*';
		$criteria->condition = 'activo_cliente='.true.'';
		$dataProvider = new CActiveDataProvider(
			'cliente', array(
					'criteria' => $criteria,
					'pagination' => false,
			)
		);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cliente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cliente']))
			$model->attributes=$_GET['Cliente'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cliente the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cliente::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cliente $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cliente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
