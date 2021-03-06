<?php

class ClienteController extends Controller
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
				'actions'=>array('create','update', 'index','view', 'select', 'select2', 'eliminar'),
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
		$rut = $this->codigo($id);
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
			$rut= str_replace('.','',$model->rut_cliente);
			$model->rut_cliente = $rut;
			$data = explode('-', $model->rut_cliente);
			if($model->save()){
				Yii::app()->user->setFlash('success','El cliente fue ingresado correctamente.');
				$this->redirect(array('view','id'=>$data[0]));
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
		$rut= $this->codigo($id);
		$model=$this->loadModel($rut);


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cliente']))
		{
			$model->attributes=$_POST['Cliente'];
			$rut= str_replace('.','',$model->rut_cliente);
			$model->rut_cliente = $rut;
			$data = explode('-', $model->rut_cliente);
			if($model->save())
				$this->redirect(array('view','id'=>$data[0]));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionSelect()
	{
		$model=new Cliente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cliente']))
			$model->attributes=$_GET['Cliente'];
		$this->render('select',array('model'=>$model));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$rut=$this->codigo($id);
		$cliente =$this->loadModel($rut);
		$cliente->activo_cliente=0;
		if ($cliente->save()) {
			$criteria = new CDbCriteria();
			$criteria->addCondition("rut_cliente=:rut");
			$criteria->params = array(':rut' => $rut);
			$list = Propiedad::model()->findAll($criteria);
			foreach($list as $model)
			{
				$criteria = new CDbCriteria();
				$criteria->addCondition("id_propiedad=:id");
				$criteria->params = array(':id' => $model->id_propiedad);
				$lista = Arriendo::model()->findAll($criteria);
				foreach($lista as $arriendo)
				{
					 $arriendo->activo_arriendo =0;
					 if (!$arriendo->save()) {
						 Yii::app()->user->setFlash('danger','El arriendo '.$arriendo->id_arriendo.' no ha podido ser eliminado.');
						 $this->redirect(Yii::app()->request->baseUrl.'/cliente/index/');
					 }
				}
				$model->eliminado_propiedad = 1;
				if (!$model->save()) {
				 Yii::app()->user->setFlash('danger','La Propiedad'.$model->id_propiedad.' No ha podido ser eliminada.');
				 $this->redirect(Yii::app()->request->baseUrl.'/cliente/index/');
			 }else{
				 if($model->arriendo!=null)
	 			{
	 				foreach ($model->arriendo as $key => $arriendo) {
	 					$arriendo->activo_arriendo =0;
	 					if ($arriendo->save()) {
	 						foreach ($arriendo->pago as $arriendo => $pago) {
	 							$pago->activo_pago =0;
	 							$pago->save();
	 						}
	 					}
	 				}
	 			}
	 			if ($model->imagen != null) {
	 				foreach ($model->imagen as $key => $value) {
	 					$file=YiiBase::getPathOfAlias("webroot")."/images/propiedades/".$value->url_imagen;
	 					$do = unlink($file);
	 					$value->delete();
	 				}
	 			}
	 			if ($model->documento != null) {
	 				foreach ($model->documento as $key => $value) {
	 					$file=YiiBase::getPathOfAlias("webroot")."/documento/propiedad/".$value->url_documento;
	 					$do = unlink($file);
	 					$value->delete();
	 				}
	 			}
			 }
			}
			foreach ($cliente->solicitud as $key => $value) {
				$value->delete();
			}
		}else {
			Yii::app()->user->setFlash('danger','El cliente no ha podido ser eliminado.');
			$this->redirect(Yii::app()->request->baseUrl.'/cliente/index/');
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	public function actionSelect2()
	{
		$model=new Cliente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cliente']))
			$model->attributes=$_GET['Cliente'];
		$this->render('select2',array('model'=>$model));
	}
	 public function actionEliminar($id)
	 {
		 $rut = $this->codigo($id);
		 $model = $this->loadModel($rut);
		 $this->render('delete', array('model'=> $model));
	 }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Cliente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cliente']))
			$model->attributes=$_GET['Cliente'];

		$this->render('index',array(
			'model'=>$model,
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


	public function actionGenerarPdf($id)
	{

		$model =Cliente::model()->findByPk($id); //Consulta para buscar todos los registros
		$mPDF1 = Yii::app()->ePdf->mpdf('utf8_encode()','A4-P','','',15,15,35,25,9,9,'P'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
		$mPDF1->useOnlyCoreFonts = true;
		$mPDF1->SetTitle("Ficha - Reporte");
		$mPDF1->SetAuthor("Propiedades Sol y Cobre");
		$mPDF1->SetWatermarkText("");
		$mPDF1->showWatermarkText = true;
		$mPDF1->watermark_font = 'DejaVuSansCondensed';
		$mPDF1->watermarkTextAlpha = 0.1;
		$mPDF1->ignore_invalid_utf8 = true;
		$mPDF1->SetDisplayMode('fullpage');
		$mPDF1->WriteHTML($this->renderPartial('ficha', array('model'=>$model), true)); //hacemos un render partial a una vista preparada, en este caso es la vista pdfReport
		$mPDF1->Output('Cotizaci?n Propiedad'.date('YmdHis'),'I');  //Nombre del pdf y par?metro para ver pdf o descargarlo directamente.
		exit;
	}
}
