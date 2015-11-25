<?php

class PagoController extends Controller
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
				'actions'=>array('create','update','index','view','select', 'fecha', 'atrasado', 'listado', 'limpiar'),
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
		$arriendo = Arriendo::model()->findByPk($id);
		$this->render('admin', array('arriendo'=>$arriendo));
	}

	public function actionAtrasado()
	{
		$model=new Arriendo('atrasado');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pago']))
			$model->attributes=$_GET['Pago'];

		$this->render('atrasado',array(
			'model'=>$model,
		));
	}

	public function actionListado($id)
	{
		$arriendo = Arriendo::model()->findByPk($id);

		$this->render('admin', array('arriendo'=>$arriendo));
	}

	public function actionLimpiar($id)
	{
		$model=$this->loadModel($id);
		$arriendo = Arriendo::model()->findByPk($model->id_arriendo);
		$model->totalpagado_pago=0;
	 	$arriendo->valor_arriendo;
		$model->activo_pago=1;
		if($model->save())
		{
			Yii::app()->user->setFlash('success','El pago fue modificado.');
			$this->redirect(array('view','id'=>$arriendo->id_arriendo));
		}else {
			var_dump($model->getErrors());
			Yii::app()->user->setFlash('error','El pago no pudo ser modificado.');
			$this->redirect(array('view','id'=>$arriendo->id_arriendo));
		}
	}



	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		/**$model= Pago::model()->findByAttributes(array('activo_pago'=>1),
			'mes_pago = DATE_FORMAT( NOW( ) ,  "%m" )'
		);*/

		$fecha = date('y');
		$anos = $fecha-5;


		$model = new Pago;
		$arriendo= Arriendo::model()->findByPk($id);
		$arrendatario= Arrendatario::model()->findByPk($arriendo->rut_arrendatario);
		$propiedad= Propiedad::model()->findByPk($arriendo->id_propiedad);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pago']))
		{
			$model->attributes=$_POST['Pago'];
			$model->fecha_pago=date('Y-m-d');
			$model->mes_pago = date('m').'-'.date('Y');
			if ($model->totalpagado_pago==null) {
				$model->totalpagado_pago=$valor;
			}
			$model->id_arriendo= $id;
			if ($model->totalpagado_pago <= $arriendo->valor_arriendo) {
				var_dump($model->totalpagado_pago.' '.$arriendo->valor_arriendo.' '.($model->totalpagado_pago == $arriendo->valor_arriendo));
				if($model->totalpagado_pago == $arriendo->valor_arriendo)
					$model->activo_pago =0;
				if($model->save())
				{
					$this->redirect(array('view','id'=>$model->id_pago));
				}else {
					$this->render('create',array(
						'model'=>$model,
						'arriendo'=>$arriendo,
						'arrendatario'=>$arrendatario,
						'propiedad'=>$propiedad,
						'anos'=>$anos
					));
				}
			}else {
				Yii::app()->user->setFlash('error','El pago del arriendo supera la deuda.');
				$this->redirect(array('fecha','id'=>$model->id_arriendo));
			}
		}

		$fecha = date('m-20y');
		$model->mes_pago=$fecha;
		if(Pago::model()->findByAttributes(array('mes_pago'=>$fecha, 'id_arriendo'=>$id))){
			$model=Pago::model()->findByAttributes(array('mes_pago'=>$fecha, 'id_arriendo'=>$id));
			$data = explode('-', $model->mes_pago);
		}

		$this->render('create',array(
			'model'=>$model,
			'arriendo'=>$arriendo,
			'arrendatario'=>$arrendatario,
			'propiedad'=>$propiedad,
			'anos'=>$anos
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


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$arriendo= Arriendo::model()->findByPk($model->id_arriendo);
		$arrendatario= Arrendatario::model()->findByPk($arriendo->rut_arrendatario);
		$propiedad= Propiedad::model()->findByPk($arriendo->id_propiedad);
		$fecha = date('y');
		$anos = $fecha-5;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pago']))
		{
			$model->attributes=$_POST['Pago'];
			$model->fecha_pago=date('Y-m-d');
			if ($model->totalpagado_pago <= $arriendo->valor_arriendo) {
				$var = intval(preg_replace('/[^0-9]+/', '', $model->totalpagar_pago), 10);
				$model->totalpagar_pago=$var;
				$model->totalpagado_pago=$model->totalpagar_pago+$model->totalpagado_pago;
				if($model->totalpagado_pago == $arriendo->valor_arriendo){
					$model->activo_pago =0;
				}
				if($model->save())
				{
					Yii::app()->user->setFlash('success','El pago fue realizado.');
					$this->redirect(array('view','id'=>$arriendo->id_arriendo));
				}else {
					var_dump($model->getErrors());

					Yii::app()->user->setFlash('error','El pago no pudo ser realizado.');
					$this->redirect(array('view','id'=>$model->id_arriendo));
				}
			}else {
				var_dump($model->getErrors());

				Yii::app()->user->setFlash('error','El pago del arriendo supera la deuda.');
				$this->redirect(array('view','id'=>$model->id_arriendo));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'arriendo'=>$arriendo,
			'arrendatario'=>$arrendatario,
			'propiedad'=>$propiedad,
			'anos'=>$anos,
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
		$dataProvider=new CActiveDataProvider('Pago');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pago('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pago']))
			$model->attributes=$_GET['Pago'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pago the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pago::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pago $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pago-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
