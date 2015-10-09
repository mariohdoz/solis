<?php

/**
 * This is the model class for table "propiedad".
 *
 * The followings are the available columns in table 'propiedad':
 * @property integer $id_propiedad
 * @property string $rut_cliente
 * @property string $direccion_propiedad
 * @property integer $habitacion_propiedad
 * @property integer $bano_propiedad
 * @property string $terreno_propiedad
 * @property string $construido_propiedad
 * @property string $tipo_propiedad
 * @property string $servicio_propiedad
 * @property integer $estado_propiedad
 * @property string $descripcion_propiedad
 * @property string $comuna_propiedad
 * @property integer $amoblado_propiedad
 * @property double $valor_propiedad
 * @property integer $activo_propiedad
 */
class Propiedad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'propiedad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('direccion_propiedad, tipo_propiedad, servicio_propiedad, comuna_propiedad, valor_propiedad', 'required'),
			array('habitacion_propiedad, bano_propiedad, estado_propiedad, amoblado_propiedad, activo_propiedad', 'numerical', 'integerOnly'=>true),
			array('valor_propiedad', 'numerical'),
			array('rut_cliente, servicio_propiedad', 'length', 'max'=>10),
			array('direccion_propiedad', 'length', 'max'=>255),
			array('terreno_propiedad, construido_propiedad', 'length', 'max'=>50),
			array('tipo_propiedad', 'length', 'max'=>25),
			array('comuna_propiedad', 'length', 'max'=>20),
			array('descripcion_propiedad', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_propiedad, rut_cliente, direccion_propiedad, habitacion_propiedad, bano_propiedad, terreno_propiedad, construido_propiedad, tipo_propiedad, servicio_propiedad, estado_propiedad, descripcion, comuna_propiedad, amoblado_propiedad, valor_propiedad, activo_propiedad', 'safe', 'on'=>'search'),
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
	public function getCliente(){
		return $this->direccion_propiedad.' Propietario '.$this->rut_cliente;
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_propiedad' => 'Id Propiedad',
			'rut_cliente' => 'RUT del propietario',
			'direccion_propiedad' => 'Dirección',
			'habitacion_propiedad' => 'Cantidad de piezas',
			'bano_propiedad' => 'Cantidad de baños',
			'terreno_propiedad' => 'Terreno',
			'construido_propiedad' => 'Terreno construido',
			'tipo_propiedad' => 'Tipo de propiedad',
			'servicio_propiedad' => 'Tipo de servicio prestado',
			'estado_propiedad' => 'Estado',
			'descripcion_propiedad' => 'Descripción',
			'comuna_propiedad' => 'Comuna donde se encuentra',
			'amoblado_propiedad' => 'Amoblado',
			'valor_propiedad' => 'Valor',
			'activo_propiedad' => 'Habilitado',
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

		$criteria->compare('id_propiedad',$this->id_propiedad);
		$criteria->compare('rut_cliente',$this->rut_cliente,true);
		$criteria->compare('direccion_propiedad',$this->direccion_propiedad,true);
		$criteria->compare('habitacion_propiedad',$this->habitacion_propiedad);
		$criteria->compare('bano_propiedad',$this->bano_propiedad);
		$criteria->compare('terreno_propiedad',$this->terreno_propiedad,true);
		$criteria->compare('construido_propiedad',$this->construido_propiedad,true);
		$criteria->compare('tipo_propiedad',$this->tipo_propiedad,true);
		$criteria->compare('servicio_propiedad',$this->servicio_propiedad,true);
		$criteria->compare('estado_propiedad',$this->estado_propiedad);
		$criteria->compare('descripcion_propiedad',$this->descripcion_propiedad,true);
		$criteria->compare('comuna_propiedad',$this->comuna_propiedad,true);
		$criteria->compare('amoblado_propiedad',$this->amoblado_propiedad);
		$criteria->compare('valor_propiedad',$this->valor_propiedad);
		$criteria->compare('activo_propiedad',$this->activo_propiedad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Propiedad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
