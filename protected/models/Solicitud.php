<?php

/**
 * This is the model class for table "solicitud".
 *
 * The followings are the available columns in table 'solicitud':
 * @property integer $id_solicitud
 * @property string $rut_cliente
 * @property string $rut_funcionario
 * @property string $nombres_solicitud
 * @property string $apellidos_solicitud
 * @property string $servicio_solicitud
 * @property string $fecha_solicitud
 * @property string $fechaejecucion_solicitud
 * @property string $telefono_solicitud
 * @property integer $estado_solicitud
 * @property string $descripcion_solicitud
 * @property string $tipopropiedad_solicitud
 * @property string $correo_solicitud
 */
class Solicitud extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solicitud';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('servicio_solicitud, descripcion_solicitud', 'required'),
			array('estado_solicitud', 'numerical', 'integerOnly'=>true),
			array('rut_cliente, rut_funcionario', 'length', 'max'=>10),
			array('rut_cliente, rut_funcionario', 'ValidateRut'),
			array('fecha_solicitud, fechaejecucion_solicitud', 'safe'),

			array('nombres_solicitud, apellidos_solicitud, correo_solicitud', 'length', 'max'=>100),
			array('servicio_solicitud', 'length', 'max'=>25),
			array('telefono_solicitud', 'length', 'max'=>12),
			array('tipopropiedad_solicitud', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_solicitud, rut_cliente, rut_funcionario, nombres_solicitud, apellidos_solicitud, servicio_solicitud, fecha_solicitud, fechaejecucion_solicitud, telefono_solicitud, estado_solicitud, descripcion_solicitud, tipopropiedad_solicitud, correo_solicitud', 'safe', 'on'=>'search'),
		);
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
	public function getRutFuncionario(){
		$data = explode('-', $this->rut_funcionario);
		return $data[0];
	}
 	public function ValidateRutFuncionario($attribute, $param){
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
			'id_solicitud' => 'Id Solicitud',
			'rut_cliente' => 'Rut Cliente',
			'rut_funcionario' => 'Rut Funcionario',
			'nombres_solicitud' => 'Nombres Solicitud',
			'apellidos_solicitud' => 'Apellidos Solicitud',
			'servicio_solicitud' => 'Servicio Solicitud',
			'fecha_solicitud' => 'Fecha Solicitud',
			'fechaejecucion_solicitud' => 'Fechaejecucion Solicitud',
			'telefono_solicitud' => 'Telefono Solicitud',
			'estado_solicitud' => 'Estado Solicitud',
			'descripcion_solicitud' => 'Descripcion Solicitud',
			'tipopropiedad_solicitud' => 'Tipopropiedad Solicitud',
			'correo_solicitud' => 'Correo Solicitud',
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

		$criteria->compare('id_solicitud',$this->id_solicitud);
		$criteria->compare('rut_cliente',$this->rut_cliente,true);
		$criteria->compare('rut_funcionario',$this->rut_funcionario,true);
		$criteria->compare('nombres_solicitud',$this->nombres_solicitud,true);
		$criteria->compare('apellidos_solicitud',$this->apellidos_solicitud,true);
		$criteria->compare('servicio_solicitud',$this->servicio_solicitud,true);
		$criteria->compare('fecha_solicitud',$this->fecha_solicitud,true);
		$criteria->compare('fechaejecucion_solicitud',$this->fechaejecucion_solicitud,true);
		$criteria->compare('telefono_solicitud',$this->telefono_solicitud,true);
		$criteria->compare('estado_solicitud',$this->estado_solicitud);
		$criteria->compare('descripcion_solicitud',$this->descripcion_solicitud,true);
		$criteria->compare('tipopropiedad_solicitud',$this->tipopropiedad_solicitud,true);
		$criteria->compare('correo_solicitud',$this->correo_solicitud,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Solicitud the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
