<?php

class IntraController extends CController{

  public $layout='//layouts/intraLayout';


  public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

  public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'config'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionConfig($id)
	{
		$model = new Administrador();
		$model = Administrador::model()->findByPk($id);
		$this->render('/perfil/index', array('model'=>$model));
	}


  public function actionIndex(){
    $rut=Yii::app()->session['admin_rut'];
    $model=Administrador::model()->findByPk($rut);
    if(Yii::app()->session['activo']) {
      $proximo=Arriendo::model()->findAllByAttributes(array('activo_arriendo'=>1),
       'inicio_arriendo<CURDATE()
        AND termino_arriendo>CURDATE()
        AND fechapago_arriendo >= DATE_FORMAT( DATE_SUB( CURDATE( ) , INTERVAL 5 DAY ) ,  "%d" )
        AND id_arriendo NOT IN (
        SELECT id_arriendo
        FROM pago
        WHERE mes_pago = DATE_FORMAT( NOW( ) ,  "%m-20%y" ))' //AND id_arriendo NOT IN (SELECT id_arriendo FROM pago WHERE mes_pago = Date_format(now(),"%m"))
      );
      $count2=count($proximo);


      $atraso=Arriendo::model()->findAllByAttributes(array('activo_arriendo'=>1),
    	 '(inicio_arriendo<CURDATE()
        AND termino_arriendo>CURDATE()
        AND fechapago_arriendo < DATE_FORMAT( CURDATE( ) , "%d" )
        AND id_arriendo IN (
        SELECT id_arriendo
        FROM pago
        WHERE activo_pago =1
        AND STR_TO_DATE( mes_pago,  "%d-%m-%Y" ) <= DATE_FORMAT( NOW( ) ,  "%Y-%m-%j" ) ))' //AND id_arriendo NOT IN (SELECT id_arriendo FROM pago WHERE mes_pago = Date_format(now(),"%m"))
  		);
      $count=count($atraso);

      $this->render('intra',array('atraso'=>$count, 'proximo'=>$count2));
    }else
      {$this->redirect(Yii::app()->request->baseUrl.'/site/index');;}
    }


}
