<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property string $RUTCLIENTE
 * @property string $NOMBRESCLIENTE
 * @property string $APELLIDOSCLIENTE
 * @property string $TELEFONOCLIENTE
 * @property string $DIRECCIONCLIENTE
 * @property string $CORREOCLIENTE
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
			array('RUTCLIENTE, NOMBRESCLIENTE, APELLIDOSCLIENTE, TELEFONOCLIENTE', 'required'),
			array('RUTCLIENTE', 'length', 'max'=>10),
			array('NOMBRESCLIENTE, APELLIDOSCLIENTE, DIRECCIONCLIENTE', 'length', 'max'=>50),
			array('TELEFONOCLIENTE', 'length', 'max'=>12),
			array('CORREOCLIENTE', 'length', 'max'=>75),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('RUTCLIENTE, NOMBRESCLIENTE, APELLIDOSCLIENTE, TELEFONOCLIENTE, DIRECCIONCLIENTE, CORREOCLIENTE', 'safe', 'on'=>'search'),
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

    public function getFullName(){
        return $this->RUTCLIENTE.'  '.$this->NOMBRESCLIENTE.' '.$this->APELLIDOSCLIENTE;
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
    public function attributeLabels()
    {
        return array(
            'RUTCLIENTE' => 'RUT del propietario',
            'NOMBRESCLIENTE' => 'Nombres del propietario',
            'APELLIDOSCLIENTE' => 'Apellidos del propietario',
            'TELEFONOCLIENTE' => 'Telefono del propietario',
            'DIRECCIONCLIENTE' => 'Direcci&oacuten del propietario',
            'CORREOCLIENTE' => 'Correo del propietario',
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

		$criteria->compare('RUTCLIENTE',$this->RUTCLIENTE,true);
		$criteria->compare('NOMBRESCLIENTE',$this->NOMBRESCLIENTE,true);
		$criteria->compare('APELLIDOSCLIENTE',$this->APELLIDOSCLIENTE,true);
		$criteria->compare('TELEFONOCLIENTE',$this->TELEFONOCLIENTE,true);
		$criteria->compare('DIRECCIONCLIENTE',$this->DIRECCIONCLIENTE,true);
		$criteria->compare('CORREOCLIENTE',$this->CORREOCLIENTE,true);

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
