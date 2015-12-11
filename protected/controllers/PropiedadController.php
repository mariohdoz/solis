<?php

class PropiedadController extends Controller
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
				'actions'=>array('create','update', 'index','view', 'obtener', 'codigo', 'upload', 'docu', 'select', 'select2'),
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
		$model = $this->loadModel($id);
		$model1=new Imagen();
    $model2 = new Cliente();
    $model2 = Cliente::model()->findByPk($model->rut_cliente);
		$this->render('view',array(
			'model'=>$model,
			'model1'=>$model1,
			'model2'=>$model2,
		));
	}

	public function actionUpload($id)
	{
		$model = new Imagen;
		Yii::import("ext.EAjaxUpload.qqFileUploader");
    $folder=Yii::app() -> getBasePath() . "/../images/propiedades/";// folder for uploaded files
    $allowedExtensions = array("jpg","jpeg","gif","png");//array("jpg","jpeg","gif","exe","mov" and etc...
    $sizeLimit = 5 * 3024 * 3024;// maximum file size in bytes
    $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
    $result = $uploader->handleUpload($folder);
    $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
    $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	  $fileName=$result['filename'];//GETTING FILE NAME
		$model->url_imagen = $fileName;
		$model->id_propiedad = $id;
		$model->save();
    echo $return;// it's array
	}

	public function actionDocu($id)
	{
		$model = new Documento;
		Yii::import("ext.EAjaxUpload.qqFileUploader");
    $folder=Yii::app() -> getBasePath() . "/../documento/propiedad/";// folder for uploaded files
    $allowedExtensions = array("jpg","jpeg","gif","png","pdf","doc","docx");//array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit =25 * 1024 * 1024;// maximum file size in bytes
    $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
    $result = $uploader->handleUpload($folder);
    $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
    $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	  $fileName=$result['filename'];//GETTING FILE NAME
		$model->url_documento = $fileName;
		$model->id_propiedad = $id;
		$model->save();
    echo $return;// it's array
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Propiedad;
		$formulario=new Cliente;
		$cliente=new Cliente('search');
		$cliente->unsetAttributes();  // clear any default values
		if(isset($_GET['Cliente']))
			$cliente->attributes=$_GET['Cliente'];		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Propiedad']))
		{
			$model->attributes=$_POST['Propiedad'];
			if($model->rut_cliente!='' && strlen($model->rut_cliente)>7){
				$cadena = str_replace('.','',$model->rut_cliente);
				$model->rut_cliente =$cadena;
				$valor = intval(preg_replace('/[^0-9]+/', '', $model->valor_propiedad),10);
				$model->valor_propiedad = $valor;
				$model->ingreso_propiedad = date('Y-m-j');
				if($model->save()){
				Yii::app()->user->setFlash('success','La propiedad ha sido ingresada correctamente. Por favor subir imágenes de la propiedad');
					$this->redirect(array('view','id'=>$model->id_propiedad));
				}
			}else {
				Yii::app()->user->setFlash('danger','Seleccione un cliente para poder continuar');
			}
		}
		$this->render('create',array(
			'model'=>$model,
			'formulario'=>$formulario,
			'cliente'=>$cliente,

		));
	}

	public function actionObtener($id)
	{
		$rut=$this->codigo($id);
		$resp = Cliente::model()->findAllByAttributes(array('rut_cliente'=>$rut));
		if($resp==NULL){
			$resp= new Cliente;
			$resp->nombres_cliente='false';
		}
		if ($resp) {
			header("Content-type: application/json");
			echo CJSON::encode($resp);
		}else {
			$resp = '';
			header("Content-type: application/json");
			echo CJSON::encode($resp);
		}

	}
	public function actionimg($id)
	{
		$resp = Imagen::model()->findByPk($id);
		if ($resp->delete()) {
			$file=YiiBase::getPathOfAlias("webroot")."/images/propiedades/".$resp->url_imagen;
			$do = unlink($file);
			$var = 1;
		}else {
			$var = 0;
		}
		header("Content-type: application/json");
		echo CJSON::encode($var);
	}
	public function actionDoc($id)
	{
		$resp = Documento::model()->findByPk($id);
		if ($resp->delete()) {
			$file=YiiBase::getPathOfAlias("webroot")."/documento/propiedad/".$resp->url_documento;
			$do = unlink($file);
			$var = 1;
		}else {
			$var = 0;
		}
		header("Content-type: application/json");
		echo CJSON::encode($var);
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
		$model=$this->loadModel($id);
		$model2= Cliente::model()->findByPk($model->rut_cliente);
		$cliente=new Cliente('search');
		$cliente->unsetAttributes();  // clear any default values
		if(isset($_GET['Cliente']))
			$cliente->attributes=$_GET['Cliente'];		// Uncomment the following line if AJAX validation is needed

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Propiedad']))
		{
			$model->attributes=$_POST['Propiedad'];
			$cadena = str_replace('.','',$model->rut_cliente);
			$model->rut_cliente =$cadena;
			$valor = intval(preg_replace('/[^0-9]+/', '', $model->valor_propiedad),10);
			$model->valor_propiedad = $valor;
			if($model->save()){
				Yii::app()->user->setFlash('success','La propiedad fue actualizada exitosamente.');
				$this->redirect(array('view','id'=>$model->id_propiedad));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'model2'=>$model2,
			'cliente'=>$cliente
		));
	}

	public function actionSelect()
	{
		$model=new Propiedad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Propiedad']))
			$model->attributes=$_GET['Propiedad'];

		$this->render('select',array(
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
		$model=$this->loadModel($id);
		$model->activo_propiedad=0;
		$model->eliminado_propiedad=1;
		if($model->save()){
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
			if($model->venta!=null)
			{
				foreach ($model->venta as $key => $venta) {
					$venta->activo_venta =0;
					if ($venta->save()) {
						foreach ($venta->pago as $venta => $pago) {
							$pago->activo_pago =0;
							$pago->save();
						}
					}
				}
			}
			if(!isset($_GET['ajax'])){
				Yii::app()->user->setFlash('success','Se elimino correctamente la propiedad, servicios prestados y todos sus documentos e imagenes');
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
	}

	public function actionSelect2()
	{
		$model=new Propiedad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Propiedad']))
			$model->attributes=$_GET['Propiedad'];

		$this->render('select2',array(
			'model'=>$model,
		));
	}

	public function actionEliminar($id)
	{
		$model=$this->loadModel($id);
		$cliente=cliente::model()->findByPk($model->rut_cliente);
		$this->render('eliminar',array(
			'model'=>$model, 'model2'=>$cliente
		));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Propiedad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Propiedad']))
			$model->attributes=$_GET['Propiedad'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Propiedad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Propiedad']))
			$model->attributes=$_GET['Propiedad'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Propiedad the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Propiedad::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Propiedad $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='propiedad-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionGenerarPdf()
	{
		$model =Propiedad::model()->findAll(); //Consulta para buscar todos los registros
		$mPDF1 = Yii::app()->ePdf->mpdf('utf8_encode()','A4-L','','',15,15,35,25,9,9,'L'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
		$mPDF1->useOnlyCoreFonts = true;
		$mPDF1->SetTitle("Propiedad - Reporte");
		$mPDF1->SetAuthor("Propiedades Sol y Cobre");
		$mPDF1->SetWatermarkText("");
		$mPDF1->showWatermarkText = true;
		$mPDF1->watermark_font = 'DejaVuSansCondensed';
		$mPDF1->watermarkTextAlpha = 0.1;
		$mPDF1->ignore_invalid_utf8 = true;
		$mPDF1->SetDisplayMode('fullpage');
		$mPDF1->WriteHTML($this->renderPartial('pdfpropiedad', array('model'=>$model), true)); //hacemos un render partial a una vista preparada, en este caso es la vista pdfReport
		$mPDF1->Output('Reporte Propiedad'.date('YmdHis'),'I');  //Nombre del pdf y par?metro para ver pdf o descargarlo directamente.
		exit;
	}
}
