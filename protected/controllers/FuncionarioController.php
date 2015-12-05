<?php
//var_dump($model);
//yii::app()->end();
class FuncionarioController extends Controller
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
				'actions'=>array('create','update','index','view','contra', 'eliminar', 'select', 'select2'),
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
		$rut=$this->codigo($id);
		$this->render('view',array(
			'model'=>$this->loadModel($rut),
		));
	}

	public function actionObtener($id)
	{
		$rut=$this->codigo($id);
		$resp = Funcionario::model()->findAllByAttributes(array('rut_funcionario'=>$rut));
		if ($resp) {
			header("Content-type: application/json");
			echo CJSON::encode($resp);
		}else {
			$resp = '';
			header("Content-type: application/json");
			echo CJSON::encode($resp);
		}
	}

	public function actionContra($id)
	{
		$rut=$this->codigo($id);
		$model=$this->loadModel($rut);
		if (isset($_POST['Funcionario'])) {
			$model->attributes=$_POST['Funcionario'];
			if ($model->repeat_pass != '') {
				if ($model->contrasena_funcionario == $model->repeat_pass) {
					if ($model->save()) {
						Yii::app()->user->setFlash('success','La contraseña del funcionario fue actualizada');
					}else {
						Yii::app()->user->setFlash('error','La contraseña del funcionario no fue actualizada');
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Funcionario('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Funcionario']))
		{
			$model->attributes=$_POST['Funcionario'];
			$rut= str_replace('.','',$model->rut_funcionario);
			$model->rut_funcionario = $rut;
			$data = explode('-', $model->rut_funcionario);
			if ($model->contrasena_funcionario == $model->repeat_pass) {
				if($model->save()){
					Yii::app()->user->setFlash('success','El funcionario fue ingresado correctamente.');
					$this->redirect(array('view','id'=>$data[0]));
				}
			}else {
				Yii::app()->user->setFlash('error','Las contraseñas no coinciden.');
			}
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

		if(isset($_POST['Funcionario']))
		{
			$model->attributes=$_POST['Funcionario'];
			$data = explode('-', $model->rut_funcionario);
			if($model->save())
				$this->redirect(array('view','id'=>$data[0]));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionSelect()
	{
		$model=new Funcionario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Funcionario']))
			$model->attributes=$_GET['Funcionario'];

		$this->render('select',array(
			'model'=>$model,
		));
	}
	public function actionSelect2()
	{
		$model=new Funcionario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Funcionario']))
			$model->attributes=$_GET['Funcionario'];

		$this->render('select2',array(
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
		$model->eliminado_funcionario=1;
		if ($model->save()) {
			Yii::app()->user->setFlash('success','El funcionario fue eliminado correctamente.');
		}else {
			Yii::app()->user->setFlash('error','El funcionario no pudo ser eliminada.');
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	public function actionEliminar($id)
	{
		$rut=$this->codigo($id);
		$this->render('delete', array('model'=>$this->loadModel($rut)));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Funcionario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Funcionario']))
			$model->attributes=$_GET['Funcionario'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Funcionario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Funcionario']))
			$model->attributes=$_GET['Funcionario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Funcionario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Funcionario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Funcionario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='funcionario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
