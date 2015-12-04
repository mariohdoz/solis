<?php

/**
 * This is the model class for table "integra".
 *
 * The followings are the available columns in table 'integra':
 * @property integer $id_integra
 * @property string $rut_funcionario
 * @property integer $id_ot
 */
class Integra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'integra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut_funcionario, id_ot', 'required'),
			array('id_ot', 'numerical', 'integerOnly'=>true),
			array('rut_funcionario', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_integra, rut_funcionario, id_ot', 'safe', 'on'=>'search'),
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
			'id_integra' => 'Id Integra',
			'rut_funcionario' => 'Rut Funcionario',
			'id_ot' => 'Id Ot',
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

		$criteria->compare('id_integra',$this->id_integra);
		$criteria->compare('rut_funcionario',$this->rut_funcionario,true);
		$criteria->compare('id_ot',$this->id_ot);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Integra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
