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
				'actions'=>array('index','busqueda','vista', 'error', 'login', 'logout','informacion', 'test', 'aja' ),
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
	public function actionSendEmail()
	{
		Yii::app()->mailer->IsHTML(true);
		Yii::app()->mailer->IsSMTP();
		Yii::app()->mailer->SMTPAuth = true;
		Yii::app()->mailer->SMTPSecure = "ssl";
		Yii::app()->mailer->Host = "smtp.gmail.com";
		Yii::app()->mailer->Port = 465;
		Yii::app()->mailer->Username = "mario.hdoz1@gmail.com";
		Yii::app()->mailer->Password = "NiNa1234";
		Yii::app()->mailer->From = "mario.hdoz1@gmail.com";
		Yii::app()->mailer->FromName = "Test";
		Yii::app()->mailer->AddAddress("user@example.com");
		Yii::app()->mailer->Subject = "Someone sent you an email.";
		Yii::app()->mailer->Body = "Hi, This is just a test email using PHP Mailer and Yii Framework.";
		if(!Yii::app()->mailer->Send()) {
		    echo "Message sent successfully!";
		}
		else {
		    echo "Fail to send your message!";
		}

	}
	public function actionTest(){
		/**$criteria=new CDbCriteria;
		$criteria->join = 'LEFT JOIN propiedad ON propiedad.id_propiedad = t.id_propiedad LEFT JOIN pago ON pago.id_arriendo=t.id_arriendo';
		$criteria->select = 't.*, pago.*, propiedad.*';
		$criteria->condition='t.id_arriendo = pago.id_arriendo AND DATE_FORMAT( STR_TO_DATE( pago.mes_pago,  "%d-%m-%Y" ) ,  "%m-%Y" ) =  DATE_FORMAT( NOW( ) ,  "%m-%Y" )';
*/

		$model=Administrador::model()->findByPK('18183527-3');
		$model2=Administrador::model()->findByPK('18183527-3');

		$model->setScenario('update');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Administrador']))
		{
			$model->attributes=$_POST['Administrador'];
			if($model->save()){


						$this->render('test',array(
							'model'=>$model,

						));
			}
		}

		$this->render('test',array(
			'model'=>$model,

		));
 	}
	public function actionIndex()
	{
		$model  = new LoginForm;
		$model1 = new Solicitud;
		$model2 = new Propiedad;
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
				$model1->fecha_solicitud = date('Y-m-j');
				if($model1->save()){
					Yii::app()->user->setFlash('text-success','Solicitud enviada correctamente, proximamente será contactado por la administración.');
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
	public function actionAja()
	{
		$nombres = $_POST['nombres_solicitud'];
		$apellidos = $_POST['apellidos_solicitud'];
		$servicio = $_POST['servico_solicitud'];
		$telefono = $_POST['telefono_solicitud'];
		$correo = $_POST['correo_solicitud'];
		$descripcion = $_POST['descripcion_solicitud'];
		$model=new Solicitud;
		$model->nombres_solicitud =$nombres ;
		$model->apellidos_solicitud =$apellidos ;
		$model->servicio_solicitud =$servicio ;
		$model->telefono_solicitud =$telefono ;
		$model->correo_solicitud = $correo;
		$model->descripcion_solicitud = $descripcion;
		$model->fecha_solicitud =date('Y-m-j') ;
		if ($model->save()) {
			Yii::app()->mailer->IsHTML(true);
			Yii::app()->mailer->IsSMTP();
			Yii::app()->mailer->SMTPAuth = true;
			Yii::app()->mailer->SMTPSecure = "ssl";
			Yii::app()->mailer->Host = "smtp.gmail.com";
			Yii::app()->mailer->Port = 465;
			Yii::app()->mailer->Username = "Sycalama@gmail.com";
			Yii::app()->mailer->Password = "NiNa1234";
			Yii::app()->mailer->From = "Sycalama@gmail.com";
			Yii::app()->mailer->FromName = "Propiedades Sol y Cobre";
			Yii::app()->mailer->AddAddress($correo);
			Yii::app()->mailer->Subject = "Solicitud registrada.";
			Yii::app()->mailer->Body = '
			 <strong>Saludos.</strong>
				<p>Estimado/a '.$nombres.' '.$apellidos.', se envía el presente correo con el motivo informar sobre la recepción de su solicitud.<br>
					 A la brevedad será contactado por la corredora.<br>
					 De antemano muchas gracias por contactarnos. antentamente, Corredora de propiedades Sol y Cobre.</P>
					 <br>
					 <P>Datos de la solicitud</P><br>
					 <table style="BORDER-RIGHT:#c7d7ee 1px solid;BORDER-TOP:#c7d7ee 1px solid;BORDER-LEFT:#c7d7ee 1px solid;BORDER-BOTTOM:#c7d7ee 1px solid" cellspacing="0" cellpadding="2" width="65%">
							<tbody>
								 <tr style="FONT-WEIGHT:bold;FONT-SIZE:14px;FONT-FAMILY:arial;BACKGROUND-COLOR:#ebeff7;TEXT-ALIGN:center">
										<td colspan="2"><font color="#4264af">Datos del solicitante</font></td>
								 </tr>
								 <tr style="FONT-SIZE:11px;COLOR:#4264af;FONT-FAMILY:arial">
										<td style="BORDER:#ebeff7 1px solid" width="25%">Fecha de ingreso</td>
										<td style="BORDER:#ebeff7 1px solid" width="40%">'.date('j/m/Y').'</td>
								 </tr>
								 <tr style="FONT-SIZE:11px;COLOR:#4264af;FONT-FAMILY:arial">
										<td style="BORDER:#ebeff7 1px solid" width="25%">Nombres</td>
										<td style="BORDER:#ebeff7 1px solid" width="40%">'.$nombres .' '.$Apellidos.'</td>
								 </tr>
								 <tr style="FONT-SIZE:11px;COLOR:#4264af;FONT-FAMILY:arial">
										<td style="BORDER:#ebeff7 1px solid" width="25%">Telefono</td>
										<td style="BORDER:#ebeff7 1px solid" width="40%">'.$telefono.'</td>
								 </tr>
								 <tr style="FONT-SIZE:11px;COLOR:#4264af;FONT-FAMILY:arial">
										<td style="BORDER:#ebeff7 1px solid" width="25%">Correo electrónico</td>
										<td style="BORDER:#ebeff7 1px solid" width="40%">'.$correo.'</td>
								 </tr>
								 <tr style="FONT-WEIGHT:bold;FONT-SIZE:14px;FONT-FAMILY:arial;BACKGROUND-COLOR:#ebeff7;TEXT-ALIGN:center">
										<td colspan="2"><font color="#4264af">Datos de la solicitud n° '.$model->id_solicitud.'</font></td>
								 </tr>
								 <tr style="FONT-SIZE:11px;COLOR:#4264af;FONT-FAMILY:arial">
										<td style="BORDER:#ebeff7 1px solid" width="25%">Servicio solicitado</td>
										<td style="BORDER:#ebeff7 1px solid" width="40%"> '.$servicio.'</td>
								 </tr>
								 <tr style="FONT-SIZE:11px;COLOR:#4264af;FONT-FAMILY:arial">
										<td style="BORDER:#ebeff7 1px solid" width="25%">Descripción</td>
										<td style="BORDER:#ebeff7 1px solid" width="40%"> '.$descripcion.'</td>
								 </tr>
								 <tr style="FONT-SIZE:10px;FONT-FAMILY:arial;BACKGROUND-COLOR:#ebeff7;TEXT-ALIGN:left">
										<td><strong><font color="#4264af">Sistema de Gestión Sol y Cobre</font></strong></td>
										<td align="right"><font color="#4264af">Fecha:'.date('j/m/Y H:i:s').'</font></td>
								 </tr>
							</tbody>
					 </table>
					 <br>
					 <br>
					 <div>
					   <div dir="ltr">
					      <div>
					         <div dir="ltr">
					            <div style="text-align:center"><img src="https://ci6.googleusercontent.com/proxy/tzNiplLOMnUQ7ybgMuDeSVluGoR3TAeyp1VvVSJxByULIXurqCsWL0IzFxBloa3t_Nbyy2XXgCUB7Az7vXA3Zju1Blb2TzAZRQbHZMgYUc5U6ssPq1w67UjpcSDHZgkI-ydiM7ePJz1iGwXM9UluQCxzPYfV=s0-d-e1-ft#https://41.media.tumblr.com/ef4639767824c353ba94a25eff17a75f/tumblr_nz2sojYrTT1qi067zo1_540.png" width="200" height="64" style="font-size:12.8px" class="CToWUd"></div>
					            <div style="text-align:center">
											<br>
					               <div style="font-size:12.8px"><span><span style="color:rgb(0,0,0)">Corredora de propiedades Sol y Cobre.<br></span></span></div>
					               <div style="font-size:12.8px"><span style="color:rgb(0,0,0)">Sandra Campusano Araya<br></span></div>
					               <div style="font-size:12.8px"><span style="color:rgb(0,0,0)">Contacto -&nbsp;<a href="tel:%2B56988357413" value="+56988357413" style="color:rgb(17,85,204)" target="_blank">+56988357413</a>&nbsp;-&nbsp;<a href="tel:%2B56965378227" value="+56965378227" style="color:rgb(17,85,204)" target="_blank">+56965378227</a></span></div>
					               <div style="font-size:12.8px">Correo&nbsp;<a href="mailto:propiedadessolycobre@gmail.com" style="font-size:12.8px;color:rgb(17,85,204)" target="_blank">propiedadessolycobre@<wbr>gmail.com</a></div>
					            </div>
					         </div>
					      </div>
					   </div>
					</div>
					 ';
		 		 Yii::app()->mailer->Send();
			echo 1;
		}else {
			echo 0;
		}	}

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
					$criteria->condition = 'eliminado_propiedad = false AND activo_propiedad = TRUE AND tipo_propiedad="'.$model2->tipo_propiedad.'" AND comuna_propiedad="'.$model2->comuna_propiedad.'"';
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
					$criteria->condition = 'eliminado_propiedad = false AND activo_propiedad = TRUE AND comuna_propiedad="'.$model2->comuna_propiedad.'"';
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
				$criteria->condition = 'comuna_propiedad="'.$model2->comuna_propiedad.'" AND tipo_propiedad="'.$model2->tipo_propiedad.'" AND servicio_propiedad="'. $model2->servicio_propiedad.'" AND eliminado_propiedad = false AND activo_propiedad = TRUE';
				$dataProvider = new CActiveDataProvider('Propiedad', array(
					'criteria' => $criteria,
					'pagination' => array(
						'pageSize' => 20
					),
				));
			}else{
				$criteria = new CDbCriteria;
				$criteria->select = 't.*';
				$criteria->condition = 'comuna_propiedad="'.$model2->comuna_propiedad.'" AND servicio_propiedad="'. $model2->servicio_propiedad.'" AND eliminado_propiedad = false AND activo_propiedad = TRUE';
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
		$model = Propiedad::model()->findByPk($id);
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
		$model2 = new Propiedad;
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
				$model1->fecha_solicitud = date('Y-m-j');
				if($model1->save()){
					Yii::app()->user->setFlash('text-success','Solicitud enviada correctamente, proximamente será contactado por la administración.');
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
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		Yii::app()->session->destroy();
		$this->redirect(Yii::app()->homeUrl);
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
