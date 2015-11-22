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
				'actions'=>array('create','update','index','view','select', 'fecha'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionFecha($id, $m, $a)
	{
		/**$model= Pago::model()->findByAttributes(array('activo_pago'=>1),
			'mes_pago = DATE_FORMAT( NOW( ) ,  "%m" )'
		);*/
		if(Yii::app()->user->hasFlash('success')){
			$msgs=Yii::app()->user->getFlashes();
			foreach ($msgs as $key => $value) {
				Yii::app()->user->setFlash($key,$value);
			}
		}
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
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_pago));
		}
		$fecha = $m.'-'.$a;
		$model->mes = $m;
		$model->ano = $a;

		if(Pago::model()->findByAttributes(array('mes_pago'=>$fecha, 'id_arriendo'=>$id))){
			$model=Pago::model()->findByAttributes(array('mes_pago'=>$fecha, 'id_arriendo'=>$id));
			$model->totalpagar_pago=0;
			$data = explode('-', $model->mes_pago);
			$model->mes = $data[0];
			$model->ano= $data[1];
		}
		$model->mes_pago = $fecha;

		$this->render('create',array(
			'model'=>$model,
			'arriendo'=>$arriendo,
			'arrendatario'=>$arrendatario,
			'propiedad'=>$propiedad,
			'anos'=>$anos
		));
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
			$model->mes_pago = $model->mes.'-'.$model->ano;
			$valor = intval(preg_replace('/[^0-9]+/', '', $model->totalpagar_pago),10);
			$model->totalpagar_pago = $valor;
			if ($model->totalpagado_pago==null) {
				$model->totalpagado_pago=$valor;
			}
			$model->id_arriendo= $id;
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

		}

		$fecha = date('m-20y');
		if(Pago::model()->findByAttributes(array('mes_pago'=>$fecha, 'id_arriendo'=>$id))){
			$model=Pago::model()->findByAttributes(array('mes_pago'=>$fecha, 'id_arriendo'=>$id));
			$model->totalpagar_pago=$model->totalpagado_pago-$Arriendo->valor_arriendo;
			$data = explode('-', $model->mes_pago);
			$model->mes = $data[0];
			$model->ano= $data[1];
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pago']))
		{
			$model->attributes=$_POST['Pago'];
			$model->fecha_pago=date('Y-m-d');
			$model->mes_pago = $model->mes.'-'.$model->ano;
			$valor = intval(preg_replace('/[^0-9]+/', '', $model->totalpagar_pago),10);
			$model->totalpagar_pago = $valor;
			if ($model->totalpagado_pago==null) {
				$model->totalpagado_pago=$valor;
			}else {
				$model->totalpagado_pago=$model->totalpagado_pago+$model->totalpagar_pago;
			}
			$model->totalpagar_pago=$arriendo->valor_arriendo-$model->totalpagado_pago;
			if ($model->totalpagado_pago <= $arriendo->valor_arriendo) {
				if($model->save())
				{
					$this->redirect(array('view','id'=>$model->id_pago));
				}else {
					$data = explode('-', $model->mes_pago);
					$model->mes = $data[0];
					$model->ano= $data[1];
					$this->redirect(array('fecha','id'=>$model->id_arriendo, 'm'=>$model->mes, 'a'=>$model->ano) );
				}
			}else {
				Yii::app()->user->setFlash('error','El pago del arriendo supera la deuda.');
				$data = explode('-', $model->mes_pago);
				$model->mes = $data[0];
				$model->ano= $data[1];
				$this->redirect(array('fecha','id'=>$model->id_arriendo, 'm'=>$model->mes, 'a'=>$model->ano) );
			}
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
