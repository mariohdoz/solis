<?php

class OrdentrabajoController extends Controller
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
				'actions'=>array('create','update','index','view','select','select2'),
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
	 public function actionSelect2()
	 {
		$orden = new Ordentrabajo('search');
		$orden->unsetAttributes();  // clear any default values
		if(isset($_GET['Ordentrabajo']))
			$orden->attributes=$_GET['Ordentrabajo'];
		$this->render('select2',array(
		'model'=>$orden,
		));
	 }
	 public function actionSelect()
	 {
		$orden = new Ordentrabajo('search');
		$orden->unsetAttributes();  // clear any default values
		if(isset($_GET['Ordentrabajo']))
			$orden->attributes=$_GET['Ordentrabajo'];
		$this->render('select',array(
		'model'=>$orden,
		));
	 }
	public function actionView($id)
	{
		$orden = $this->loadModel($id);
		$integra = Integra::model()->findByAttributes(
		  array('id_ot'=>$id)
		);
		$funcionario = Funcionario::model()->findByPk($integra->rut_funcionario);
		$this->render('view',array(
			'model'=>$orden,
			'integra'=>$integra,
			'funcionario'=>$funcionario,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$orden=new Ordentrabajo;
		$integra= new Integra;
		$funcionario= new Funcionario;
		$formulario= new Funcionario('libre');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($orden);

		if(isset($_POST['Ordentrabajo']))
		{
			$orden->attributes=$_POST['Ordentrabajo'];
			if (Funcionario::model()->findByPk($orden->rut_funcionario)) {
				$valor = intval(preg_replace('/[^0-9]+/', '', $orden->totalpagar_ot),10);
				$orden->totalpagar_ot=$valor;
				$integra->rut_funcionario=$orden->rut_funcionario;
				$orden->rut_admin=Yii::app()->session['admin_rut'];
				$orden->fechaemision_ot=date('Y-m-j');
				if($orden->save()){
					$integra->id_ot=$orden->id_ot;
					if ($integra->save()) {
						Yii::app()->user->setFlash('success','La orden de trabajo fue registada');
						$this->redirect(array('view','id'=>$orden->id_ot));
					}
				}
			}else {
				Yii::app()->user->setFlash('danger','El funcionario no se encuentra registrado');
			}
		}

		$this->render('create',array(
			'model'=>$orden,
			'integra'=>$integra,
			'funcionario'=>$funcionario,
			'formulario'=>$formulario,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$orden=$this->loadModel($id);
		$integra= Integra::model()->findByAttributes(
		  array('id_ot'=>$id)
		);
		$funcionario = Funcionario::model()->findByPk($integra->rut_funcionario);
		$formulario= new Funcionario('libre');
		$orden->rut_funcionario=$integra->rut_funcionario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($orden);

		if(isset($_POST['Ordentrabajo']))
		{
			$orden->attributes=$_POST['Ordentrabajo'];
			$valor = intval(preg_replace('/[^0-9]+/', '', $orden->totalpagar_ot),10);
			$orden->totalpagar_ot=$valor;
			$integra->rut_funcionario=$orden->rut_funcionario;
			$orden->rut_admin=Yii::app()->session['admin_rut'];
			$orden->fechaemision_ot=date('Y-m-j');
			if($orden->save()){
				$integra->id_ot=$orden->id_ot;
				if ($integra->save()) {
					$this->redirect(array('view','id'=>$orden->id_ot));
				}
			}
		}

		$this->render('update',array(
			'model'=>$orden,
			'integra'=>$integra,
			'funcionario'=>$funcionario,
			'formulario'=>$formulario,
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

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Ordentrabajo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ordentrabajo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ordentrabajo']))
			$model->attributes=$_GET['Ordentrabajo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ordentrabajo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ordentrabajo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ordentrabajo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ordentrabajo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
