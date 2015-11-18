<?php
/**
 * Created by PhpStorm.
 * User: aetex_000
 * Date: 05/11/2015
 * Time: 16:06
 */

Class PerfilController extends Controller
{
    public function actionIndex(){
        $model=new Administrador('search');
        $this->layout='//layouts/intraLayout';
        $model->unsetAttributes();
        if(isset($_GET['Administrador']))
            $model->attributes=$_GET['Administrador'];

        $this->render("index",array("model"=>$model));

    }
    public function actionconfig($id)
    {

        $model = new Administrador();
        $model = Administrador::model()->findByPk($id);
        $this->layout ='//layouts/intraLayout';
        $this->render('index', array('model'=>$model));

    }


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
}