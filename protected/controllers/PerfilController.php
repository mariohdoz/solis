<?php
/**
 * Created by PhpStorm.
 * User: aetex_000
 * Date: 05/11/2015
 * Time: 16:06
 */

Class PerfilController extends Controller
{

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
    public function actionIndex($id){
      $rut = $this->codigo($id);
      $admin = Administrador::model()->findByPk($rut);
        $this->layout ='//layouts/intraLayout';
        $this->render("index",array("model"=>$admin));

    }
    public function actionConfig($id)
    {

        $model = new Administrador();
        $model = Administrador::model()->findByPk($id);
        $this->layout ='//layouts/intraLayout';
        $this->render('index', array('model'=>$model));

    }
    public function loadModel($id)
    {
        $model=Administrador::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }



    public function actionAdmin($id)
    {
        $model =Administrador::model()->findByPk($id);

        $model->unsetAttributes();
        if(isset($_GET['Administrador']))
            $model->attributes=$_GET['Administrador'];

        $this->render("index",array("model"=>$model));
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='admin-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
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


    public function actionUpdate($id)
    {
      $rut = $this->codigo($id);
       $model= Administrador::model()->findByPk($rut);
        if(isset($_POST["Administrador"]))
        {
            $model->attributes=$_POST[Administrador];
            if($model->save())
            {
                $this->redirect(array("index"));
            }
        }
        $this->render("update", array("model"=>$model));
    }

}
