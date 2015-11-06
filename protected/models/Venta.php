<?php

/**
 * This is the model class for table "venta".
 *
 * The followings are the available columns in table 'venta':
 * @property integer $id_venta
 * @property integer $id_propiedad
 * @property string $rut_admin
 * @property string $nombrescomprador_venta
 * @property string $apellidoscomprador_venta
 * @property string $rutcomprador_venta
 */
class Venta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'venta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_propiedad, nombrescomprador_venta, apellidoscomprador_venta, rutcomprador_venta', 'required'),
			array('id_propiedad', 'numerical', 'integerOnly'=>true),
			array('rut_admin', 'length', 'max'=>10),
			array('nombrescomprador_venta, apellidoscomprador_venta', 'length', 'max'=>100),
			array('rutcomprador_venta', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_venta, id_propiedad, rut_admin, nombrescomprador_venta, apellidoscomprador_venta, rutcomprador_venta', 'safe', 'on'=>'search'),
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
			'id_venta' => 'Id Venta',
			'id_propiedad' => 'Número de ficha',
			'rut_admin' => 'RUT del administrador',
			'nombrescomprador_venta' => 'Nombres de comprador',
			'apellidoscomprador_venta' => 'Apellidos del comprador',
			'rutcomprador_venta' => 'RUT del comprador',
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

		$criteria->compare('id_venta',$this->id_venta);
		$criteria->compare('id_propiedad',$this->id_propiedad);
		$criteria->compare('rut_admin',$this->rut_admin,true);
		$criteria->compare('nombrescomprador_venta',$this->nombrescomprador_venta,true);
		$criteria->compare('apellidoscomprador_venta',$this->apellidoscomprador_venta,true);
		$criteria->compare('rutcomprador_venta',$this->rutcomprador_venta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Venta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
