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
				'actions'=>array('create','update','index','view','obtener','obtenerpro', 'select', 'select2', 'eliminar', 'arrendatario'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin',),
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
				'pageSize'=>15,
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
				'pageSize'=>15,
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
			$rut= str_replace('.','',$model->rut_arrendatario);
			$model->rut_arrendatario = $rut;
			if($model->id_propiedad != '' && $model->rut_arrendatario != ''){
				if ($model->inicio_arriendo < $model->termino_arriendo ) {

					$model3=Propiedad::model()->findByPk($model->id_propiedad);
					$model2=Arrendatario::model()->findByPk($model->rut_arrendatario);
					$valor = intval(preg_replace('/[^0-9]+/', '', $model->valor_arriendo),10);
					$model->valor_arriendo = $valor;
					if($model3->activo_propiedad == 1){
						$model3->activo_propiedad= 0;
						if($model->save() && $model3->save())
						{
							Yii::app()->user->setFlash('success','El arriendo fue ingresado correctamente.');
							$this->redirect(array('view','id'=>$model->id_arriendo));
						}
					}else {
						Yii::app()->user->setFlash('error','La propiedad ya se encuentra con un servicio prestado.');
					}
				}else {
					Yii::app()->user->setFlash('error','La fecha de inicio debe ser menor a la de termino.');
				}
			}else {
				Yii::app()->user->setFlash('error','Debe seleccionar una propiedad y un arrendatario.');
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
	public function actionArrendatario($id)
	{
		$rut=$this->codigo($id);
		$resp = Arrendatario::model()->findAllByAttributes(array('rut_arrendatario'=>$rut));
		if ($resp) {
			header("Content-type: application/json");
			echo CJSON::encode($resp);
		}else {
			$resp = '';
			header("Content-type: application/json");
			echo CJSON::encode($resp);
		}

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
		$variable= $this->loadModel($id);
		$model2=new Arrendatario;
		$model3=new Propiedad;
		$model2=Arrendatario::model()->findByPk($model->rut_arrendatario);
		$model3=Propiedad::model()->findByPk($model->id_propiedad);


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Arriendo']))
		{
			$model->attributes=$_POST['Arriendo'];
			if($model->id_propiedad != '' && $model->rut_arrendatario != ''){
				$model3=Propiedad::model()->findByPk($model->id_propiedad);
				if($model->id_propiedad != $variable->id_propiedad){
					$model4=new Propiedad;
					$model4=Propiedad::model()->findByPk($variable->id_propiedad);
					$model4->activo_propiedad=1;
					if($model4->save()){
						Yii::app()->user->setFlash('success','La propiedad enlazada con el arriendo fue modificada.');
					}else {
						Yii::app()->user->setFlash('danger','La propiedad enlazada con el arriendo no pudo ser modificada.');
					}
				}
				$rut= str_replace('.','',$model->rut_arrendatario);
				$model->rut_arrendatario = $rut;
				$model3->activo_propiedad =0;
				$valor = intval(preg_replace('/[^0-9]+/', '', $model->valor_arriendo),10);
				$model->valor_arriendo = $valor;
				if($model->save() && $model3->save()){
					Yii::app()->user->setFlash('success','El arriendo fue actualizado.');
					$this->redirect(array('view','id'=>$model->id_arriendo));
				}else{
					Yii::app()->user->setFlash('danger','El arriendo no fue actualizado.');
				}
			}
		}
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

		$this->render('update',array(
			'model'=>$model,
			'model2'=>$model2,
			'model3'=>$model3,
			'dataProvider'=>$dataProvider,
			'dataProvider2'=>$dataProvider2,
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
		$model2=new Propiedad;
		$model2 = Propiedad::model()->findByPk($model->id_propiedad);
		$model2->activo_propiedad =1;
		$model->activo_arriendo =0;
		if ($model2->save() && $model->save()) {
			Yii::app()->user->setFlash('success','El arriendo fue eliminado satisfactoriamente.');
		}else {
			Yii::app()->user->setFlash('danger','El arriendo no pudo ser eliminado.');
		}
		$this->redirect(Yii::app()->request->baseUrl.'/arriendo/index/');
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser

	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Arriendo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Arriendo']))
			$model->attributes=$_GET['Arriendo'];
		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionSelect()
	{
		$model=new Arriendo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Arriendo']))
			$model->attributes=$_GET['Arriendo'];
		$this->render('select',array('model'=>$model));
	}

	public function actionSelect2()
	{
		$model=new Arriendo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Arriendo']))
			$model->attributes=$_GET['Arriendo'];
		$this->render('select2',array('model'=>$model));
	}

	public function actionEliminar($id)
	{
		$model=$this->loadModel($id);
		$model2=new Arrendatario;
		$model2=Arrendatario::model()->findByPk($model->rut_arrendatario);
		$model3=new Propiedad;
		$model3=Propiedad::model()->findByPk($model->id_propiedad);
		$this->render('eliminar',array(
			'model'=>$model,'model2'=>$model2,'model3'=>$model3
		));
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
