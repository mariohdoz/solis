<?php

class SolicitudController extends Controller
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
				'actions'=>array('create','update','index','view'),
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
		$solicitud=$this->loadModel($id);
		$cliente=new cliente;
		$funcionario = new Funcionario;
		if ($solicitud->rut_cliente!=null) {
			$cliente=Cliente::model()->findByPk($solicitud->rut_cliente);
		}
		if ($solicitud->rut_funcionario!=null) {
			$funcionario=Funcionario::model()->findByPk($solicitud->rut_funcionario);
		}
		$this->render('delete', array('solicitud'=>$solicitud,'cliente'=>$cliente,
		'funcionario'=>$funcionario));
	}

	public function actionView($id)
	{
		$solicitud=$this->loadModel($id);
		$cliente=new cliente;
		$funcionario = new Funcionario;
		if ($solicitud->rut_cliente!=null) {
			$cliente=Cliente::model()->findByPk($solicitud->rut_cliente);
		}
		if ($solicitud->rut_funcionario!=null) {
			$funcionario=Funcionario::model()->findByPk($solicitud->rut_funcionario);
		}
		$this->render('view',array(
			'solicitud'=>$this->loadModel($id),
			'cliente'=>$cliente,
			'funcionario'=>$funcionario,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$solicitud=new Solicitud;
		$solicitud->setScenario('create');


		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($solicitud);

		if(isset($_POST['Solicitud']))
		{
			$solicitud->attributes=$_POST['Solicitud'];
			if($solicitud->save())
				$this->redirect(array('view','id'=>$solicitud->id_solicitud));
		}

		$this->render('create',array(
			'solicitud'=>$solicitud,
		));
	}
	public function actionRealizada($id)
	{
		$solicitud=$this->loadModel($id);
		$cliente=new Cliente;
		$funcionario= new Funcionario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Solicitud']))
		{
			$solicitud->attributes=$_POST['Solicitud'];
			if($solicitud->save())
				$this->redirect(array('view','id'=>$solicitud->id_solicitud));
		}

		$this->render('realizada',array(
			'solicitud'=>$solicitud,
			'cliente'=>$cliente,
			'funcionario'=>$funcionario,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$cliente=new Cliente;
		$funcionario= new Funcionario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Solicitud']))
		{
			$model->attributes=$_POST['Solicitud'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_solicitud));
		}

		$this->render('update',array(
			'model'=>$model,
			'cliente'=>$cliente,
			'funcionario'=>$funcionario,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		Yii::app()->user->setFlash('success','La solicitud n° '.$id.' fue eliminada correctamente');

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$Solicitud=Solicitud::model()->findAllByAttributes(array('estado_solicitud'=>1));
		$funcionario= new Solicitud('fun');
		$cliente = new Solicitud('clie');
		$solicitud=new Solicitud('sol');
		$solicitud->unsetAttributes();  // clear any default values
		$cliente->unsetAttributes();  // clear any default values
		$funcionario->unsetAttributes();  // clear any default values
		if(isset($_GET['Solicitud']))
			$cliente->attributes=$_GET['Solicitud'];
		$funcionario->unsetAttributes();  // clear any default values
		if(isset($_GET['Solicitud']))
			$solicitud->attributes=$_GET['Solicitud'];
		if(isset($_GET['Solicitud']))
			$funcionario->attributes=$_GET['Solicitud'];
		$this->render('index',array(
			'solicitud'=>$solicitud,
			'cliente'=>$cliente,
			'funcionario'=>$funcionario,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Solicitud('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Solicitud']))
			$model->attributes=$_GET['Solicitud'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Solicitud the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Solicitud::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Solicitud $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='solicitud-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
