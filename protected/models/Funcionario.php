<?php

/**
 * This is the model class for table "funcionario".
 *
 * The followings are the available columns in table 'funcionario':
 * @property string $rut_funcionario
 * @property string $nombres_funcionario
 * @property string $apellidos_funcionario
 * @property string $telefonofijo_funcionario
 * @property string $telefonocelular_funcionario
 * @property string $domicilio_funcionario
 * @property string $correo_funcionario
 * @property string $contrasena_funcionario
 * @property integer $activo_funcionario
 * @property string $cargo_funcionario
 * @property integer $eliminado_funcionario
 */
class Funcionario extends CActiveRecord
{
	public $repeat_pass;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'funcionario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut_funcionario, nombres_funcionario, apellidos_funcionario, telefonofijo_funcionario, telefonocelular_funcionario, domicilio_funcionario, correo_funcionario,contrasena_funcionario', 'required'),
			array('activo_funcionario, eliminado_funcionario', 'numerical', 'integerOnly'=>true),
			array('rut_funcionario', 'length', 'max'=>10),
			array('contrasena_funcionario, repeat_pass', 'length', 'max'=>255),
			array('rut_funcionario', 'ValidateRut'),
			array('repeat_pass','required','on'=>'create','message'=>'Debe repetir la contraseña'),
			array('rut_funcionario', 'unique','attributeName'=>'rut_funcionario','className'=>'Funcionario','message'=>'El RUT del funcionario ya se encuentra ingresado'),
			array('correo_funcionario', 'unique','attributeName'=>'correo_funcionario','className'=>'Funcionario','message'=>'El correo ya se encuentra ingresado'),
			array('nombres_funcionario, apellidos_funcionario, correo_funcionario, cargo_funcionario', 'length', 'max'=>100),
			array('telefonofijo_funcionario, telefonocelular_funcionario', 'length', 'max'=>12),
			array('domicilio_funcionario', 'length', 'max'=>150),
			array('repeat_pass','compare','compareAttribute'=>'contrasena_funcionario','message'=>'Las contrasñas no coinciden','on'=>'create'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut_funcionario, nombres_funcionario, apellidos_funcionario, telefonofijo_funcionario, telefonocelular_funcionario, domicilio_funcionario, correo_funcionario, activo_funcionario, cargo_funcionario, eliminado_funcionario', 'safe', 'on'=>'search'),
			array('rut_funcionario, nombres_funcionario, apellidos_funcionario, telefonofijo_funcionario, telefonocelular_funcionario, domicilio_funcionario, correo_funcionario, activo_funcionario, cargo_funcionario, eliminado_funcionario', 'safe', 'on'=>'libre'),
		);
	}
	public function getRut(){
		$data = explode('-', $this->rut_funcionario);
		return $data[0];
	}
 	public function ValidateRut($attribute, $param){
 		$data = explode('-', $this->rut_funcionario);
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
	protected function beforeSave() {
       $this->contrasena_funcionario = sha1($this->contrasena_funcionario);
       return parent::beforeSave();
}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'integra'=>array(self::HAS_MANY, 'Integra', 'rut_funcionario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rut_funcionario' => 'Rut del Funcionario',
			'nombres_funcionario' => 'Nombres',
			'apellidos_funcionario' => 'Apellidos',
			'telefonofijo_funcionario' => 'Teléfono fijo',
			'telefonocelular_funcionario' => 'Teléfono celular',
			'domicilio_funcionario' => 'Domicilio',
			'correo_funcionario' => 'Correo electrónico',
			'activo_funcionario' => 'Activo Funcionario',
			'contrasena_funcionario' => 'Contraseña ',
			'repeat_pass'=>'Repetir contraseña',
			'cargo_funcionario' => 'Cargo del funcionario',
			'eliminado_funcionario' => 'Eliminado Funcionario',


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

		$criteria->compare('rut_funcionario',$this->rut_funcionario,true);
		$criteria->compare('nombres_funcionario',$this->nombres_funcionario,true);
		$criteria->compare('apellidos_funcionario',$this->apellidos_funcionario,true);
		$criteria->compare('telefonofijo_funcionario',$this->telefonofijo_funcionario,true);
		$criteria->compare('telefonocelular_funcionario',$this->telefonocelular_funcionario,true);
		$criteria->compare('domicilio_funcionario',$this->domicilio_funcionario,true);
		$criteria->compare('correo_funcionario',$this->correo_funcionario,true);
		$criteria->compare('activo_funcionario',$this->activo_funcionario);
		$criteria->compare('contrasena_funcionario',$this->contrasena_funcionario,true);
		$criteria->compare('cargo_funcionario',$this->cargo_funcionario,true);
		$criteria->compare('eliminado_funcionario',0);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function libre()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('rut_funcionario',$this->rut_funcionario,true);
		$criteria->compare('nombres_funcionario',$this->nombres_funcionario,true);
		$criteria->compare('apellidos_funcionario',$this->apellidos_funcionario,true);
		$criteria->compare('telefonofijo_funcionario',$this->telefonofijo_funcionario,true);
		$criteria->compare('telefonocelular_funcionario',$this->telefonocelular_funcionario,true);
		$criteria->compare('domicilio_funcionario',$this->domicilio_funcionario,true);
		$criteria->compare('correo_funcionario',$this->correo_funcionario,true);
		$criteria->compare('activo_funcionario',1);
		$criteria->compare('contrasena_funcionario',$this->contrasena_funcionario,true);
		$criteria->compare('cargo_funcionario',$this->cargo_funcionario,true);
		$criteria->compare('eliminado_funcionario',0);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Funcionario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
