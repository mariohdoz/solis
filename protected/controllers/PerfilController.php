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
        $this->layout='//layouts/intraLayout';
        $model=CActiveRecord::model("Administrador")->findAll();
        $wea="asdadsasd";
        $this->render("index",array("model"=>$model,"wea"=>$wea));

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



    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='admin-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}