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
 * @property string $CORREOCLIENTE$correo_cliente
 * @property string $estadoCivil_cliente
 * @property integer $profesion_cliente
 * @property string $telefonoCelular_cliente
 * @property string $nroCuenta_cliente
 * @property string $banco_cliente
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
			array('RUTCLIENTE, NOMBRESCLIENTE, APELLIDOSCLIENTE, TELEFONOCLIENTE, correo_cliente, estadoCivil_cliente, profesion_cliente, telefonoCelular_cliente, nroCuenta_cliente, banco_cliente', 'required'),
			array('RUTCLIENTE', 'length', 'max'=>10),
			array('NOMBRESCLIENTE, APELLIDOSCLIENTE, DIRECCIONCLIENTE', 'length', 'max'=>50),
			array('TELEFONOCLIENTE', 'length', 'max'=>12),
			array('correo_cliente, banco_cliente', 'length','max'=>100),
			array('estadoCivil_cliente', 'length', 'max'=>8),
			array('nroCuenta_cliente', 'length', 'max'=>25),
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
						'correo_cliente' => 'Correo del propietario',
						'estadoCivil_cliente' => 'Estado civil',
						'profesion_cliente' => 'Profesión',
						'telefonoCelular_cliente' => 'Teléfono celular',
						'nroCuenta_cliente' => 'Número de cuenta',
						'banco_cliente' => 'Banco',
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
		$criteria->compare('correo_cliente',$this->correo_cliente,true);
		$criteria->compare('estadoCivil_cliente',$this->estadoCivil_cliente,true);
		$criteria->compare('profesion_cliente',$this->profesion_cliente);
		$criteria->compare('telefonoCelular_cliente',$this->telefonoCelular_cliente,true);
		$criteria->compare('nroCuenta_cliente',$this->nroCuenta_cliente,true);
		$criteria->compare('banco_cliente',$this->banco_cliente,true);

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
