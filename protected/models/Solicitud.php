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
			array('servicio_solicitud, fecha_solicitud, fechaejecucion_solicitud, descripcion_solicitud, tipopropiedad_solicitud', 'required'),
			array('estado_solicitud', 'numerical', 'integerOnly'=>true),
			array('rut_cliente', 'length', 'max'=>10),
			array('rut_funcionario, servicio_solicitud', 'length', 'max'=>25),
			array('nombres_solicitud, apellidos_solicitud, correo_solicitud', 'length', 'max'=>100),
			array('telefono_solicitud', 'length', 'max'=>12),
			array('tipopropiedad_solicitud', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_solicitud, rut_cliente, rut_funcionario, nombres_solicitud, apellidos_solicitud, servicio_solicitud, fecha_solicitud, fechaejecucion_solicitud, telefono_solicitud, estado_solicitud, descripcion_solicitud, tipopropiedad_solicitud, correo_solicitud', 'safe', 'on'=>'search'),
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
			'nombres_solicitud' => 'Nombres',
			'apellidos_solicitud' => 'Apellidos',
			'servicio_solicitud' => 'Servicio',
			'fecha_solicitud' => 'Fecha',
			'fechaejecucion_solicitud' => 'Fecha solicitada',
			'telefono_solicitud' => 'Teléfono de contacto',
			'estado_solicitud' => 'Estado de solicitud',
			'descripcion_solicitud' => 'Descripción',
			'tipopropiedad_solicitud' => 'Tipo de propiedad',
			'correo_solicitud' => 'Correo electrónico',
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
