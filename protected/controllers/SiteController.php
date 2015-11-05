<?php
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array('class' => 'CCaptchaAction','backColor' => 0xFFFFFF),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page' => array('class' => 'CViewAction')
		);
	}
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','busqueda','vista', 'error', 'login', 'logout','informacion', 'test', 'obtener', 'obtenerpro' ),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$model  = new LoginForm;
		$model1 = new Solicitud;
		$model2 = new Propiedad;
		Yii::app()->user->setFlash('danger','Esto es un error');
		Yii::app()->user->setFlash('success','Este es un mensaje de éxito');
		Yii::app()->user->setFlash('info','ésto es pura infromación');
		// validación de ajax
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login())
				$this->redirect(array("/intra/index"));
		}
		if(isset($_POST['Solicitud'])){
			$model1->attributes = $_POST['Solicitud'];
			if($model1->nombres_solicitud != '' && $model1->apellidos_solicitud != '' ){
				if($model1->save()){
					$this->render('index', array(
						'model' => $model,
						'model1' => $model1,
						'model2' => $model2
					));
				}
			}
		}
		// desplegar el login
		$this->render('index', array(
			'model' => $model,
			'model1' => $model1,
			'model2' => $model2
		));
	}

	public function actionTest(){
	$model=new Arriendo('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['Arriendo']))
		$model->attributes=$_GET['Arriendo'];
	$this->render('test',array('model'=>$model));
	}

	public function actionObtener($id){
		$rut=$this->codigo($id);
		$resp = Arrendatario::model()->findAllByAttributes(array('rut_arrendatario'=>$rut));
		header("Content-type: application/json");
		echo CJSON::encode($resp);
	}
	public function actionObtenerpro($id){
		$resp = Propiedad::model()->findAllByAttributes(array('id_propiedad'=>$id));
		header("Content-type: application/json");
		echo CJSON::encode($resp);
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



	public function actionBusqueda()
	{
		$this->layout ='//layouts/busquedaLayout';
		$model2 = new Propiedad();
		$model  = new Propiedad();
		if (isset($_POST['Propiedad'])) {
			$model2->attributes = $_POST['Propiedad'];
			$v                  = $model2->servicio_propiedad;
			$v2                 = 'Todas';
			if ($v == 'Todas') {
				if($model2->tipo_propiedad != 'Todas'){
					$criteria         = new CDbCriteria;
					$criteria->select = 't.*';
					$criteria->join   = 'LEFT JOIN imagen im ON t.id_propiedad = im.id_propiedad';
					$criteria->condition = 'estado_propiedad = TRUE AND activo_propiedad = TRUE AND tipo_propiedad="'.$model2->tipo_propiedad.'" AND comuna_propiedad="'.$model2->comuna_propiedad.'"';
					$criteria->group  = 't.id_propiedad';
					$dataProvider     = new CActiveDataProvider('propiedad', array(
						'criteria' => $criteria,
						'pagination' => array(
							'pageSize' => 20
						)
					));
				}else{
					$criteria         = new CDbCriteria;
					$criteria->select = 't.*';
					$criteria->join   = 'LEFT JOIN imagen im ON t.id_propiedad = im.id_propiedad';
					$criteria->condition = 'estado_propiedad = TRUE AND activo_propiedad = TRUE AND comuna_propiedad="'.$model2->comuna_propiedad.'"';
					$criteria->group  = 't.id_propiedad';
					$dataProvider     = new CActiveDataProvider('propiedad', array(
						'criteria' => $criteria,
						'pagination' => array(
							'pageSize' => 20
						)
					));
				}
		} else {
			if($model2->tipo_propiedad != 'Todas'){
				$criteria = new CDbCriteria;
				$criteria->select = 't.*';
				$criteria->condition = 'comuna_propiedad="'.$model2->comuna_propiedad.'" AND tipo_propiedad="'.$model2->tipo_propiedad.'" AND servicio_propiedad="'. $model2->servicio_propiedad.'" AND estado_propiedad = TRUE AND activo_propiedad = TRUE';
				$dataProvider = new CActiveDataProvider('Propiedad', array(
					'criteria' => $criteria,
					'pagination' => array(
						'pageSize' => 20
					),
				));
			}else{
				$criteria = new CDbCriteria;
				$criteria->select = 't.*';
				$criteria->condition = 'comuna_propiedad="'.$model2->comuna_propiedad.'" AND servicio_propiedad="'. $model2->servicio_propiedad.'" AND estado_propiedad = TRUE AND activo_propiedad = TRUE';
				$dataProvider = new CActiveDataProvider('Propiedad', array(
					'criteria' => $criteria,
					'pagination' => array(
						'pageSize' => 20
					),
				));
			}
		}
			$this->render('busqueda', array(
				'dataProvider' => $dataProvider,
				'model' => $model
			));
		}
	}

	public function actionFiltrado()
	{
		$model = new Propiedad;
		$model->attributes = $_POST['Propiedad'];
		$criteria = new CDbCriteria;
		$criteria->select = 't.*';
		$criteria->condition = 'comuna_propiedad="'.$model->comuna_propiedad.'" AND tipo_propiedad="'.$model->tipo_propiedad.'" AND servicio_propiedad="'. $model->servicio_propiedad.'"AND bano_propiedad="'. $model->bano_propiedad.'" AND habitacion_propiedad="'.$model->habitacion_propiedad.'" AND amoblado_propiedad='.$model->amoblado_propiedad.' AND activo_propiedad = TRUE AND activo_propiedad = TRUE';
		$dataProvider = new CActiveDataProvider(
			'Propiedad', array(
					'criteria' => $criteria,
					'pagination' => array(
					'pageSize' => 20
				),
			)
		);
		$this->render('busqueda', array(
			'dataProvider' => $dataProvider,
			'model' => $model
		));


	}

	public function actionInformacion($id)
	{
		$model = new Propiedad();
		$model = Propiedad::model()->findByPk($model->rut_cliente);
		$this->layout ='//layouts/informacionLayout';
		$this->render('informacion', array('model'=>$model));
	}

	public function actionVista($id)
	{
		$model    = new Propiedad();
		$criteria = new CDbCriteria;
		$criteria->compare('t.id_propiedad', $id);
		$criteria->select = 't.*';
		$criteria2        = new CDbCriteria;
		$criteria2->compare('t.id_propiedad', $id);
		$criteria2->select = 't.*';
		$dataProvider      = new CActiveDataProvider('Propiedad', array(
			'criteria' => $criteria,
			'pagination' => false
		));
		$dataProvider2     = new CActiveDataProvider('Imagen', array(
			'criteria' => $criteria,
			'pagination' => false
		));
		$this->render('vista', array(
			'dataProvider' => $dataProvider,
			'dataProvider2' => $dataProvider2
		));
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model = new ContactForm;
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];
			if ($model->validate()) {
				$name    = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
				$subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
				$headers = "From: $name <{$model->email}>\r\n" . "Reply-To: {$model->email}\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/plain; charset=UTF-8";
				mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
				Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact', array(
			'model' => $model
		));
	}
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model  = new LoginForm;
		$model1 = new Solicitud;
		$model2 = new Propiedad();
		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login())
				$this->redirect("/intra/index");
		}
		// display the login form
		$this->render('principal', array(
			'model' => $model,
			'model1' => $model1,
			'model2' => $model2
		));
	}
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		Yii::app()->session->destroy();
		$this->redirect(Yii::app()->homeUrl);
	}
}
