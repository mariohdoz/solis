<?php

/**
 * This is the model class for table "funcionario".
 *
 * The followings are the available columns in table 'funcionario':
 * @property string $RUTFUNCIONARIO
 * @property string $NOMBRESFUNCIONARIOS
 * @property string $APELLIDOSFUCIONARIO
 * @property string $TELEFONOFUNCIONARIO
 * @property string $SECTORFUNCIONARIO
 * @property string $DIRECCIONFUNCIONARIO
 * @property string $CORREOFUNCIONARIO
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
			array('RUTFUNCIONARIO, NOMBRESFUNCIONARIOS, APELLIDOSFUCIONARIO, TELEFONOFUNCIONARIO, SECTORFUNCIONARIO, DIRECCIONFUNCIONARIO, CORREOFUNCIONARIO', 'required'),
			array('RUTFUNCIONARIO', 'length', 'max'=>10),
			array('NOMBRESFUNCIONARIOS, APELLIDOSFUCIONARIO, SECTORFUNCIONARIO, DIRECCIONFUNCIONARIO, CORREOFUNCIONARIO', 'length', 'max'=>50),
			array('TELEFONOFUNCIONARIO', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('RUTFUNCIONARIO, NOMBRESFUNCIONARIOS, APELLIDOSFUCIONARIO, TELEFONOFUNCIONARIO, SECTORFUNCIONARIO, DIRECCIONFUNCIONARIO, CORREOFUNCIONARIO', 'safe', 'on'=>'search'),
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
			'RUTFUNCIONARIO' => 'RUT de funcionario',
			'NOMBRESFUNCIONARIOS' => 'Nombres',
			'APELLIDOSFUCIONARIO' => 'Apellidos',
			'TELEFONOFUNCIONARIO' => 'Fono de contacto',
			'SECTORFUNCIONARIO' => 'Sector',
			'DIRECCIONFUNCIONARIO' => 'Dirección',
			'CORREOFUNCIONARIO' => 'Correo ',
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

		$criteria->compare('RUTFUNCIONARIO',$this->RUTFUNCIONARIO,true);
		$criteria->compare('NOMBRESFUNCIONARIOS',$this->NOMBRESFUNCIONARIOS,true);
		$criteria->compare('APELLIDOSFUCIONARIO',$this->APELLIDOSFUCIONARIO,true);
		$criteria->compare('TELEFONOFUNCIONARIO',$this->TELEFONOFUNCIONARIO,true);
		$criteria->compare('SECTORFUNCIONARIO',$this->SECTORFUNCIONARIO,true);
		$criteria->compare('DIRECCIONFUNCIONARIO',$this->DIRECCIONFUNCIONARIO,true);
		$criteria->compare('CORREOFUNCIONARIO',$this->CORREOFUNCIONARIO,true);

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
