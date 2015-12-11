<?php

/**
 * This is the model class for table "administrador".
 *
 * The followings are the available columns in table 'administrador':
 * @property string $rut_admin
 * @property string $nombres_admin
 * @property string $apellidos_admin
 * @property string $contrasena_admin
 * @property string $correo_admin
 * @property string $telefono_admin
 * @property string $perfil_admin
 * @property integer $super_admin
 * @property integer $activo_admin
 * @property integer $fn_admin
 */
class Administrador extends CActiveRecord
{
	public $repeat_pass;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'administrador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut_admin, nombres_admin, apellidos_admin, contrasena_admin, correo_admin, telefono_admin, perfil_admin', 'required', 'on'=>'create'),
			array('nombres_admin, apellidos_admin, correo_admin, telefono_admin', 'required', 'on'=>'update'),
			array('contrasena_admin, repeat_pass', 'required', 'on'=>'cambio'),
			array('super_admin, activo_admin,  fn_admin', 'numerical', 'integerOnly'=>true),
			array('rut_admin', 'length', 'max'=>12),
			array('contrasena_admin, repeat_pass', 'length', 'max'=>255),
			array('rut_admin', 'ValidateRut'),
			array('contrasena_admin','hasha', 'on'=>'cambio'),
			array('contrasena_admin','hasha', 'on'=>'create'),
			array('repeat_pass','required','on'=>'create','message'=>'Debe repetir la contraseña'),
			array('rut_admin', 'unique','attributeName'=>'rut_admin','className'=>'Administrador','message'=>'El administrador ya se encuentra ingresado'),
			array('correo_admin', 'unique','attributeName'=>'correo_admin','className'=>'Administrador','message'=>'El correo  ya se encuentra ingresado'),
			array('nombres_admin, apellidos_admin, contrasena_admin, correo_admin', 'length', 'max'=>100),
			array('telefono_admin', 'length', 'max'=>12),
			array('perfil_admin', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut_admin, nombres_admin, apellidos_admin, contrasena_admin, correo_admin, telefono_admin, perfil_admin, super_admin, activo_admin, fn_admin',  'safe', 'on'=>'search'),
		);
	}
	public function getRut(){
		$data = explode('-', $this->rut_admin);
		return $data[0];
	}
 	public function ValidateRut($attribute, $param){
 		$data = explode('-', $this->rut_admin);
 		$evaluate = strrev($data[0]);
 		$multiply = 2;
 		$store = 0;
 		for ($i = 0; $i < strlen($evaluate); $i++) {
 			 $store += $evaluate[$i] * $multiply;
 			 $multiply++;
 			 if ($multiply > 7)
 					 $multiply = 2;
 		}
 		isset($data[1]) ? $verifyCode = strtolower($data[1]) : $verifyCode = '';
 		$result = 11 - ($store % 11);
 		if ($result == 10)
 			 $result = 'k';
 		if ($result == 11)
 			 $result = 0;
 		if ($verifyCode != $result)
 			 $this->addError('rut', 'Rut inválido.');
 	}
	function hasha() {
		$this->contrasena_admin = sha1($this->contrasena_admin);
		return parent::beforeSave();
	}
	function getFormato() {
		$rutTmp = explode( "-", $this->rut_admin );
		return number_format( $rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rut_admin' => 'RUT ',
			'nombres_admin' => 'Nombres',
			'apellidos_admin' => 'Apellidos',
			'contrasena_admin' => 'Contraseña',
			'correo_admin' => 'Correo',
			'telefono_admin' => 'Telefono',
			'perfil_admin' => 'Foto',
			'super_admin' => 'Super Admin',
			'repeat_pass'=>'Repetir contraseña',
			'activo_admin' => 'administrador activo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('rut_admin',$this->rut_admin,true);
		$criteria->compare('nombres_admin',$this->nombres_admin,true);
		$criteria->compare('apellidos_admin',$this->apellidos_admin,true);
		$criteria->compare('contrasena_admin',$this->contrasena_admin,true);
		$criteria->compare('correo_admin',$this->correo_admin,true);
		$criteria->compare('telefono_admin',$this->telefono_admin,true);
		$criteria->compare('perfil_admin',$this->perfil_admin,true);
		$criteria->compare('super_admin',$this->super_admin);
		$criteria->compare('activo_admin',1);
		$criteria->compare('fn_admin',$this->fn_admin);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Administrador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
