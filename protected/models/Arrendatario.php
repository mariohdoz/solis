<?php

/**
 * This is the model class for table "arrendatario".
 *
 * The followings are the available columns in table 'arrendatario':
 * @property string $rut_arrendatario
 * @property string $nombres_arrendatario
 * @property string $apellidos_arrendatario
 * @property string $estadocivil_arrendatario
 * @property string $profesion_arrendatario
 * @property string $correo_arrendatario
 * @property string $telefonofijo_arrendatario
 * @property string $telefonocelular_arrendatario
 * @property string $nrocuenta_arrendatario
 * @property string $banco_arrendatario
 * @property string $nacionalidad_arrendatario
 * @property integer $empresa_arrendatario
 * @property integer $activo_arrendatario
 */
class Arrendatario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'arrendatario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut_arrendatario, nombres_arrendatario, apellidos_arrendatario, estadocivil_arrendatario, profesion_arrendatario, correo_arrendatario, telefonocelular_arrendatario, nacionalidad_arrendatario', 'required'),
			array('empresa_arrendatario, activo_arrendatario', 'numerical', 'integerOnly'=>true),
			array('rut_arrendatario', 'length', 'max'=>10),
			array('rut_arrendatario', 'ValidateRut'),
			array('rut_arrendatario', 'unique','attributeName'=>'rut_arrendatario','className'=>'Arrendatario','message'=>'El arrendatario ya se encuentra ingresado'),
			array('nombres_arrendatario, apellidos_arrendatario, correo_arrendatario', 'length', 'max'=>100),
			array('estadocivil_arrendatario', 'length', 'max'=>10),
			array('profesion_arrendatario', 'length', 'max'=>250),
			array('telefonofijo_arrendatario, telefonocelular_arrendatario', 'length', 'max'=>12),
			array('nrocuenta_arrendatario', 'length', 'max'=>25),
			array('banco_arrendatario, nacionalidad_arrendatario', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut_arrendatario, nombres_arrendatario, apellidos_arrendatario, estadocivil_arrendatario, profesion_arrendatario, correo_arrendatario, telefonofijo_arrendatario, telefonocelular_arrendatario, nrocuenta_arrendatario, banco_arrendatario, nacionalidad_arrendatario, empresa_arrendatario, activo_arrendatario', 'safe', 'on'=>'search'),
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
			'arriendo'=>array(self::HAS_MANY, 'Arriendo', 'rut_arrendatario'),
			'documento'=>array(self::HAS_MANY, 'Documento', 'rut_arrendatario'),
			'pago'=>array(self::HAS_MANY, 'Pago', 'rut_arrendatario'),
		);
	}
	public function getRut(){
		$data = explode('-', $this->rut_arrendatario);
		return $data[0];
	}
 	public function ValidateRut($attribute, $param){
 		$data = explode('-', $this->rut_arrendatario);
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
    return number_format( substr ( $this->rut_arrendatario, 0 , -1 ) , 0, "", ".") . '-' . substr ( $this->rut_arrendatario, strlen($this->rut_arrendatario) -1 , 1 );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rut_arrendatario' => 'RUT del arrendatario',
			'nombres_arrendatario' => 'Nombres',
			'apellidos_arrendatario' => 'Apellidos',
			'estadocivil_arrendatario' => 'Estado civil',
			'profesion_arrendatario' => 'Profesión',
			'correo_arrendatario' => 'Correo electrónico',
			'telefonofijo_arrendatario' => 'Teléfono fijo',
			'telefonocelular_arrendatario' => 'Teléfono celular',
			'nrocuenta_arrendatario' => 'Número de cuenta',
			'banco_arrendatario' => 'Banco',
			'nacionalidad_arrendatario' => 'Nacionalidad',
			'empresa_arrendatario' => 'Empresa',
			'activo_arrendatario' => 'Activo Arrendatario',
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

		$criteria->compare('rut_arrendatario',$this->rut_arrendatario,true);
		$criteria->compare('nombres_arrendatario',$this->nombres_arrendatario,true);
		$criteria->compare('apellidos_arrendatario',$this->apellidos_arrendatario,true);
		$criteria->compare('estadocivil_arrendatario',$this->estadocivil_arrendatario,true);
		$criteria->compare('profesion_arrendatario',$this->profesion_arrendatario,true);
		$criteria->compare('correo_arrendatario',$this->correo_arrendatario,true);
		$criteria->compare('telefonofijo_arrendatario',$this->telefonofijo_arrendatario,true);
		$criteria->compare('telefonocelular_arrendatario',$this->telefonocelular_arrendatario,true);
		$criteria->compare('nrocuenta_arrendatario',$this->nrocuenta_arrendatario,true);
		$criteria->compare('banco_arrendatario',$this->banco_arrendatario,true);
		$criteria->compare('nacionalidad_arrendatario',$this->nacionalidad_arrendatario,true);
		$criteria->compare('empresa_arrendatario',$this->empresa_arrendatario);
		$criteria->compare('activo_arrendatario',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Arrendatario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
