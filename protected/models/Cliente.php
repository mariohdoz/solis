<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property string $rut_cliente
 * @property string $nombres_cliente
 * @property string $apellidos_cliente
 * @property string $estadocivil_cliente
 * @property string $profesion_cliente
 * @property string $domicilio_cliente
 * @property string $correo_cliente
 * @property string $telefonofijo_cliente
 * @property string $telefonocelular_cliente
 * @property string $nrocuenta_cliente
 * @property string $banco_cliente
 * @property string $tipocuenta_cliente
 * @property integer $activo_cliente
 */
class Cliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut_cliente, nombres_cliente, apellidos_cliente, estadocivil_cliente', 'required'),
			array('activo_cliente', 'numerical', 'integerOnly'=>true),
			array('rut_cliente, estadocivil_cliente', 'length', 'max'=>10),
			array('rut_cliente', 'ValidateRut'),
			array('rut_cliente', 'unique','attributeName'=>'rut_cliente','className'=>'Cliente','message'=>'El propietario ya se encuentra ingresado'),
			array('nombres_cliente, apellidos_cliente, profesion_cliente, correo_cliente', 'length', 'max'=>100),
			array('domicilio_cliente', 'length', 'max'=>150),
			array('telefonofijo_cliente, telefonocelular_cliente', 'length', 'max'=>12),
			array('nrocuenta_cliente', 'length', 'max'=>25),
			array('banco_cliente', 'length', 'max'=>50),
			array('tipocuenta_cliente', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut_cliente, nombres_cliente, apellidos_cliente, estadocivil_cliente, profesion_cliente, domicilio_cliente, correo_cliente, telefonofijo_cliente, telefonocelular_cliente, nrocuenta_cliente, banco_cliente, tipocuenta_cliente, activo_cliente', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	 public function relations()
 	{
 		// NOTE: you may need to adjust the relation name and the related
 		// class name for the relations automatically generated below.
 		return array(
 			'propiedad'=>array(self::HAS_MANY, 'Propiedad', 'rut_cliente'),
			'solicitud'=>array(self::HAS_MANY, 'Solicitud', 'rut_cliente'),
 		);
 	}
 	public function getFullName(){
 		return $this->rut_cliente.'  '.$this->nombres_cliente.' '.$this->apellidos_cliente;
 	}
	public function getRut(){
		$data = explode('-', $this->rut_cliente);
		return $data[0];
	}
 	public function ValidateRut($attribute, $param){
 		$data = explode('-', $this->rut_cliente);
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
	function getFormato() {
		$rutTmp = explode( "-",  $this->rut_cliente );
	return number_format( $rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rut_cliente' => 'RUT del cliente',
			'nombres_cliente' => 'Nombres',
			'apellidos_cliente' => 'Apellidos',
			'estadocivil_cliente' => 'Estado civil',
			'profesion_cliente' => 'Profesión',
			'domicilio_cliente' => 'domicilio',
			'correo_cliente' => 'Correo electrónico',
			'telefonofijo_cliente' => 'Teléfono fijo',
			'telefonocelular_cliente' => 'Teléfono celular',
			'nrocuenta_cliente' => 'Número de cuenta',
			'banco_cliente' => 'Banco',
			'tipocuenta_cliente' => 'Tipo de cuenta',
			'activo_cliente' => 'Cliente activo',
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

		$criteria->compare('rut_cliente',$this->rut_cliente,true);
		$criteria->compare('nombres_cliente',$this->nombres_cliente,true);
		$criteria->compare('apellidos_cliente',$this->apellidos_cliente,true);
		$criteria->compare('estadocivil_cliente',$this->estadocivil_cliente,true);
		$criteria->compare('profesion_cliente',$this->profesion_cliente,true);
		$criteria->compare('domicilio_cliente',$this->domicilio_cliente,true);
		$criteria->compare('correo_cliente',$this->correo_cliente,true);
		$criteria->compare('telefonofijo_cliente',$this->telefonofijo_cliente,true);
		$criteria->compare('telefonocelular_cliente',$this->telefonocelular_cliente,true);
		$criteria->compare('nrocuenta_cliente',$this->nrocuenta_cliente,true);
		$criteria->compare('banco_cliente',$this->banco_cliente,true);
		$criteria->compare('tipocuenta_cliente',$this->tipocuenta_cliente,true);
		$criteria->compare('activo_cliente',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
