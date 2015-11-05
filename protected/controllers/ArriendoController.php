<?php

class ArriendoController extends Controller
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
				'actions'=>array('create','update','index','view','obtener','obtenerpro', 'select'),
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
		$model=$this->loadModel($id);
		$model2=new Arrendatario;
		$model2=Arrendatario::model()->findByPk($model->rut_arrendatario);
		$model3=new Propiedad;
		$model3=Propiedad::model()->findByPk($model->id_propiedad);
		$this->render('view',array(
			'model'=>$model,'model2'=>$model2,'model3'=>$model3
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Arriendo;
		$model2=new Arrendatario;
		$model3=new Propiedad;

		$criteria2 = new CDbCriteria();
		$criteria2->condition='activo_arrendatario=1';

		$dataProvider=new CActiveDataProvider(Arrendatario::model(), array(
			'keyAttribute'=>'rut_arrendatario',// IMPORTANTE, para que el CGridView conozca la seleccion
			'criteria'=>$criteria2,
			'pagination'=>array(
				'pageSize'=>5,
			),
			'sort'=>array(
				'defaultOrder'=>array('rut_arrendatario'=>true),
			),
		));
		$criteria = new CDbCriteria();
		$criteria->condition='activo_propiedad=1 AND eliminado_propiedad=0';
		$dataProvider2=new CActiveDataProvider(Propiedad::model(), array(
			'keyAttribute'=>'id_propiedad',// IMPORTANTE, para que el CGridView conozca la seleccion
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>5,
			),
			'sort'=>array(
				'defaultOrder'=>array('id_propiedad'=>true),
			),
		));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Arriendo']))
		{
			$model->attributes=$_POST['Arriendo'];
			$model->rut_admin = Yii::app()->session['admin_rut'];
			$model->inscripcion_arriendo = date('Y-m-d');
			$model3=Propiedad::model()->findByPk($model->id_propiedad);
			$model2=Arrendatario::model()->findByPk($model->rut_arrendatario);
			if($model3->activo_propiedad == 1){
				$model3->activo_propiedad= 0;
				if($model->save() && $model3->save())
				{
					$this->redirect(array('view','id'=>$model->id_arriendo));
				}
			}else {
				Yii::app()->user->setFlash('error','La propiedad ya se encuentra con un servicio prestado.');
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'model2'=>$model2,
			'model3'=>$model3,
			'dataProvider'=>$dataProvider,
			'dataProvider2'=>$dataProvider2,
		));
	}
	/* Se crea la función obtener para poder acceder a los datos del arrendatario*/
	public function actionObtener($id){
		$rut=$this->codigo($id);
		$resp = Arrendatario::model()->findAllByAttributes(array('rut_arrendatario'=>$rut));
		header("Content-type: application/json");
		echo CJSON::encode($resp);
	}

	public function actionObtenerpro($id){
		$resp = Propiedad::model()->findAllByAttributes(array('id_propiedad'=>$id));
		header("Content-type: application/json");
		echo CJSON::encode($resp);
	}
	/* Se crea la función codigo para poder obtener el rut del funcionario*/
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Arriendo']))
		{
			$model->attributes=$_POST['Arriendo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_arriendo));
		}

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
		$dataProvider=new CActiveDataProvider('Arriendo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionSelect()
	{
		$criteria=new CDbCriteria;
		$dataProvider=new CActiveDataProvider('Arriendo');
		$this->render('select',array('model'=>$model));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Arriendo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Arriendo']))
			$model->attributes=$_GET['Arriendo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Arriendo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Arriendo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Arriendo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='arriendo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
