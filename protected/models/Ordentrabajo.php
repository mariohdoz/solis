<?php

/**
 * This is the model class for table "ordentrabajo".
 *
 * The followings are the available columns in table 'ordentrabajo':
 * @property integer $id_ot
 * @property string $rut_admin
 * @property string $descripcion_ot
 * @property string $fechaemision_ot
 * @property string $fechaejecucion_ot
 * @property integer $estado_ot
 * @property string $inicio_ot
 * @property string $servicio_ot
 * @property string $observacion_ot
 * @property integer $totalpagar_ot
 * @property integer $formapago_ot
 */
class Ordentrabajo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ordentrabajo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut_admin, descripcion_ot, fechaemision_ot, fechaejecucion_ot, inicio_ot, servicio_ot, observacion_ot, totalpagar_ot, formapago_ot', 'required'),
			array('estado_ot, totalpagar_ot, formapago_ot', 'numerical', 'integerOnly'=>true),
			array('rut_admin', 'length', 'max'=>10),
			array('servicio_ot', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ot, rut_admin, descripcion_ot, fechaemision_ot, fechaejecucion_ot, estado_ot, inicio_ot, servicio_ot, observacion_ot, totalpagar_ot, formapago_ot', 'safe', 'on'=>'search'),
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
			'id_ot' => 'Id Ot',
			'rut_admin' => 'Rut Admin',
			'descripcion_ot' => 'Descripcion Ot',
			'fechaemision_ot' => 'Fechaemision Ot',
			'fechaejecucion_ot' => 'Fechaejecucion Ot',
			'estado_ot' => 'Estado Ot',
			'inicio_ot' => 'Fecha de inicio',
			'servicio_ot' => 'Servicio a realizar',
			'observacion_ot' => 'Observaciones',
			'totalpagar_ot' => 'Total a pagar',
			'formapago_ot' => 'Forma de pago',
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

		$criteria->compare('id_ot',$this->id_ot);
		$criteria->compare('rut_admin',$this->rut_admin,true);
		$criteria->compare('descripcion_ot',$this->descripcion_ot,true);
		$criteria->compare('fechaemision_ot',$this->fechaemision_ot,true);
		$criteria->compare('fechaejecucion_ot',$this->fechaejecucion_ot,true);
		$criteria->compare('estado_ot',$this->estado_ot);
		$criteria->compare('inicio_ot',$this->inicio_ot,true);
		$criteria->compare('servicio_ot',$this->servicio_ot,true);
		$criteria->compare('observacion_ot',$this->observacion_ot,true);
		$criteria->compare('totalpagar_ot',$this->totalpagar_ot);
		$criteria->compare('formapago_ot',$this->formapago_ot);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ordentrabajo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
