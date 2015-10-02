<?php

class PropiedadController extends Controller
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
				'actions'=>array('index','view', 'ver', 'imagen', 'busqueda'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'upload', 'select', 'Modificar','prueba', 'eliminar', 'desa','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
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
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */


	public function actionCreate()
	{
		$model=new Propiedad;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Propiedad']))
		{
			$model->attributes=$_POST['Propiedad'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDPROP));
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionUpload($id)
	{

		$model = new Imagen();
		Yii::import("ext.EAjaxUpload.qqFileUploader");
    $folder=Yii::app()->request->baseUrl.'/images/propiedades/';// folder for uploaded files
    $allowedExtensions = array("jpg","jpeg","gif","png");//array("jpg","jpeg","gif","exe","mov" and etc...
    $sizeLimit = 5 * 3024 * 3024;// maximum file size in bytes
    $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
    $result = $uploader->handleUpload($folder);
    $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
    $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	  $fileName=$result['filename'];//GETTING FILE NAME
		$model->URLIMAGEN = $fileName;
		$model->IDPROP = $id;
		$model->save();
    echo $return;// it's array
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$layout='intralayout';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Propiedad']))
		{
			$model->attributes=$_POST['Propiedad'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDPROP));
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
		var_dump($id);

		$this->loadModel($id);
		$model = Propiedad::model()->findByPk($id);
		$model->activo = false;


		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Propiedad;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Propiedad']))
		{
			$model->attributes=$_POST['Propiedad'];
			if($model->save())
				$this->redirect(array('propiedad/imagen', 'id'=>$model->IDPROP, 'rut'=>$model->RUTCLIENTE));
		}
	$this->render('gestion',array('model'=>$model,));
	}

  public function actionImagen($id,$rut){
			$model = new Propiedad;
			$model1=new Imagen();
      $model2 = new Cliente();
      $model2 = Cliente::model()->findByPk($rut);
      $this->render('imagen',array(
          'model'=>$this->loadModel($id),
          'model2'=>$model2,'model1'=>$model1,
      ));
  }

	public function actionSelect(){
		$model = new PropiedadForm();
		$this->render('select', array('model'=>$model));
	}
	public function actionModificar()
	{
		$model = new Propiedad;
		$model1 = new PropiedadForm;
		$model1->attributes=$_POST['PropiedadForm'];
		$model=Propiedad::model()->findByPk($model1->IDPROP);
		if($model===null){
			$this->render('select', array('model'=>$model));
		}else{
			$model2 = new Propiedad();
			$model2=$this->loadModel($model->IDPROP);
			$this->render('update',array(
				'model'=>$model2,
			));

		}
	}
	public function actionEliminar(){
		$model = new PropiedadForm();
		$this->render('select2', array('model'=>$model));
	}
	public function actionDesa(){
		$model = new Propiedad();
		$model1 = new PropiedadForm();
		if(isset($_POST['PropiedadForm'])){
			$model1->attributes = $_POST['PropiedadForm'];
			$model=Propiedad::model()->findByPk($model1->IDPROP);
			$model->Activo = 0;
			if($model->save()){
				$this->redirect('/propiedad/ver');
			}else{
				$this->render('select', array('model'=>$model));

			}
		}else{
			$this->render('select',  array('model'=>$model));
		}
	}

  public function actionVer(){
      $dataProvider=new CActiveDataProvider('Propiedad',array(
          'pagination'=>array(
              'pageSize'=>20,
          ),
      ));
      $this->render('index',array(
          'dataProvider'=>$dataProvider,
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
}
