<?php
class IntraController extends CController{
    public $layout='//layouts/intraLayout';

    public function actionIndex(){
        if(Yii::app()->session['activo']) {

            $this->render('intra');
        }
        else
        {$this->redirect('?r=site/index');;}
    }

    public function actionNuevo(){
    	$this->render(nuevo);
    }



}
