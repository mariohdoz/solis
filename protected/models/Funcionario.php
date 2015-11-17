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
 */
class Funcionario extends CActiveRecord
{
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
			array('rut_funcionario, nombres_funcionario, apellidos_funcionario, telefonofijo_funcionario, telefonocelular_funcionario, domicilio_funcionario, correo_funcionario', 'required'),
			array('rut_funcionario', 'length', 'max'=>10),
			array('rut_funcionario', 'ValidateRut'),
			array('rut_funcionario', 'unique','attributeName'=>'rut_funcionario','className'=>'Cliente','message'=>'El funcionario ya se encuentra ingresado'),
			array('correo_funcionario', 'unique','attributeName'=>'correo_funcionario','className'=>'Funcionario','message'=>'El correo ya se encuentra ingresado'),
			array('nombres_funcionario, apellidos_funcionario, correo_funcionario', 'length', 'max'=>100),
			array('telefonofijo_funcionario, telefonocelular_funcionario', 'length', 'max'=>12),
			array('domicilio_funcionario', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut_funcionario, nombres_funcionario, apellidos_funcionario, telefonofijo_funcionario, telefonocelular_funcionario, domicilio_funcionario, correo_funcionario', 'safe', 'on'=>'search'),
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
			'rut_funcionario' => 'Rut Funcionario',
			'nombres_funcionario' => 'Nombres Funcionario',
			'apellidos_funcionario' => 'Apellidos Funcionario',
			'telefonofijo_funcionario' => 'Telefonofijo Funcionario',
			'telefonocelular_funcionario' => 'Telefonocelular Funcionario',
			'domicilio_funcionario' => 'Domicilio Funcionario',
			'correo_funcionario' => 'Correo Funcionario',
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
