<?php

class VentaController extends Controller
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
				'actions'=>array('create','update','index','view', 'select', 'select2', 'eliminar'),
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
		$model=$this->loadModel($id);
		$model3=new Propiedad;
		$model3=Propiedad::model()->findByPk($model->id_propiedad);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'model3'=>$model3
		));
	}

	public function actionSelect()
	{
		$model=new Venta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Venta']))
			$model->attributes=$_GET['Venta'];
		$this->render('select',array('model'=>$model));
	}

	public function actionSelect2()
	{
		$model=new Venta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Venta']))
			$model->attributes=$_GET['Venta'];
		$this->render('select2',array('model'=>$model));
	}

	public function actionEliminar($id)
	{
		$model=$this->loadModel($id);
		$model3=new Propiedad;
		$model3=Propiedad::model()->findByPk($model->id_propiedad);
		$this->render('eliminar',array(
			'model'=>$model, 'model3'=>$model3
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Venta;
		$model3=new Propiedad;

		$criteria2 = new CDbCriteria();
		$criteria2->condition='activo_arrendatario=1';

		$dataProvider=new CActiveDataProvider(Arrendatario::model(), array(
			'keyAttribute'=>'rut_arrendatario',// IMPORTANTE, para que el CGridView conozca la seleccion
			'criteria'=>$criteria2,
			'pagination'=>array(
				'pageSize'=>5,
			),
			'sort'=>array(
				'defaultOrder'=>array('rut_arrendatario'=>true),
			),
		));
		$criteria = new CDbCriteria();
		$criteria->condition='activo_propiedad=1 AND eliminado_propiedad=0';
		$dataProvider2=new CActiveDataProvider(Propiedad::model(), array(
			'keyAttribute'=>'id_propiedad',// IMPORTANTE, para que el CGridView conozca la seleccion
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>5,
			),
			'sort'=>array(
				'defaultOrder'=>array('id_propiedad'=>true),
			),
		));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Venta']))
		{
			$model->attributes=$_POST['Venta'];
			$model->rut_admin = Yii::app()->session['admin_rut'];
			if ($model->id_propiedad != '') {
				$model3=Propiedad::model()->findByPk($model->id_propiedad);
				if($model3->activo_propiedad == 1){
					$model3->activo_propiedad= 0;
					$valor = intval(preg_replace('/[^0-9]+/', '', $model->ganancia_venta),10);
					$model->ganancia_venta = $valor;
					$rut= str_replace('.','',$model->rutcomprador_venta);
					$model->rutcomprador_venta = $rut;
					if($model->save() && $model3->save())
					{
						Yii::app()->user->setFlash('success','La venta fue ingresada correctamente.');
						$this->redirect(array('view','id'=>$model->id_venta));
					}
				}else {
					Yii::app()->user->setFlash('error','La propiedad ya se encuentra con un servicio prestado.');
				}
			}else{
				Yii::app()->user->setFlash('error','La propiedad ya se encuentra con un servicio prestado.');
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'model3'=>$model3,
			'dataProvider'=>$dataProvider,
			'dataProvider2'=>$dataProvider2,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$variable= $this->loadModel($id);
		$propiedad=new Propiedad;
		$propiedad=Propiedad::model()->findByPk($model->id_propiedad);


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Venta']))
		{
			$model->attributes=$_POST['Venta'];
			$propiedad=Propiedad::model()->findByPk($model->id_propiedad);
			if($model->id_propiedad != $variable->id_propiedad){
				$model4=new Propiedad;
				$model4=Propiedad::model()->findByPk($variable->id_propiedad);
				$model4->activo_propiedad=1;
				if($model4->save()){
					Yii::app()->user->setFlash('success','La propiedad enlazada con el arriendo fue modificada.');
				}else {
					Yii::app()->user->setFlash('danger','La propiedad enlazada con el arriendo no pudo ser modificada.');
				}
			}
			$propiedad->activo_propiedad =0;
			$valor = intval(preg_replace('/[^0-9]+/', '', $model->ganancia_venta),10);
			$model->ganancia_venta = $valor;
			$rut= str_replace('.','',$model->rutcomprador_venta);
			$model->rutcomprador_venta = $rut;
			if($model->save() && $propiedad->save()){
				Yii::app()->user->setFlash('success','El venta fue actualizado.');
				$this->redirect(array('view','id'=>$model->id_venta));
			}else{
				Yii::app()->user->setFlash('danger','El venta no fue actualizado.');
			}
		}
		$criteria2 = new CDbCriteria();
		$criteria2->condition='activo_arrendatario=1';

		$dataProvider=new CActiveDataProvider(Arrendatario::model(), array(
			'keyAttribute'=>'rut_arrendatario',// IMPORTANTE, para que el CGridView conozca la seleccion
			'criteria'=>$criteria2,
			'pagination'=>array(
				'pageSize'=>5,
			),
			'sort'=>array(
				'defaultOrder'=>array('rut_arrendatario'=>true),
			),
		));
		$criteria = new CDbCriteria();
		$criteria->condition='activo_propiedad=1 AND eliminado_propiedad=0';
		$dataProvider2=new CActiveDataProvider(Propiedad::model(), array(
			'keyAttribute'=>'id_propiedad',// IMPORTANTE, para que el CGridView conozca la seleccion
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>5,
			),
			'sort'=>array(
				'defaultOrder'=>array('id_propiedad'=>true),
			),
		));

		$this->render('update',array(
			'model'=>$model,
			'model3'=>$propiedad,
			'dataProvider'=>$dataProvider,
			'dataProvider2'=>$dataProvider2,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model =$this->loadModel($id);
		$model2 = Propiedad::model()->findByPk($model->id_propiedad);
		$model2->activo_propiedad = 1;
		if($model2->save()){
			$this->loadModel($id)->delete();
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Venta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Venta']))
			$model->attributes=$_GET['Venta'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Venta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Venta']))
			$model->attributes=$_GET['Venta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Venta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Venta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Venta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='venta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
