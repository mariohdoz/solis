<?php

/**
 * This is the model class for table "pago".
 *
 * The followings are the available columns in table 'pago':
 * @property integer $id_pago
 * @property integer $id_arriendo
 * @property string $fecha_pago
 * @property string $mes_pago
 * @property integer $totalpagar_pago
 * @property integer $totalpagado_pago
 * @property integer $activo_pago
 */
class Pago extends CActiveRecord
{
	public $ano;
	public $mes;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pago';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_pago, mes_pago, totalpagar_pago, totalpagado_pago', 'required'),
			array('id_arriendo, totalpagar_pago, totalpagado_pago, activo_pago, ano, mes', 'numerical', 'integerOnly'=>true),
			array('ano,mes', 'required', 'message'=>'Debe escoger el año y el mes del pago'),
			array('mes_pago', 'length', 'max'=>7),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pago, id_arriendo, fecha_pago, mes_pago, totalpagar_pago, totalpagado_pago, activo_pago', 'safe', 'on'=>'search'),
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
			'pago'=>array(self::BELONGS_TO, 'Arriendo', 'id_ariendo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pago' => 'Id Pago',
			'id_arriendo' => 'Id Arriendo',
			'fecha_pago' => 'Fecha Pago',
			'mes_pago' => 'Mes de pago',
			'totalpagar_pago' => 'Total a pagar',
			'totalpagado_pago' => 'Total pagado',
			'activo_pago' => 'Pago concluido',
			'mes'=>'Mes correspondiente al pago',
			'ano'=>'Año correspondiente al pago',
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

		$criteria->compare('id_pago',$this->id_pago);
		$criteria->compare('id_arriendo',$this->id_arriendo);
		$criteria->compare('fecha_pago',$this->fecha_pago,true);
		$criteria->compare('mes_pago',$this->mes_pago,true);
		$criteria->compare('totalpagar_pago',$this->totalpagar_pago);
		$criteria->compare('totalpagado_pago',$this->totalpagado_pago);
		$criteria->compare('activo_pago',$this->activo_pago);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pago the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
