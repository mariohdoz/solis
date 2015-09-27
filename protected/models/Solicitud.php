<?php

/**
 * This is the model class for table "solicitud".
 *
 * The followings are the available columns in table 'solicitud':
 * @property integer $IDSOLICITUD
 * @property string $RUTCLIENTE
 * @property string $NOMBRESSOLICITANTE
 * @property string $APELLIDOSSOLICITANTE
 * @property string $SERVICIOSOLICITADO
 * @property string $FECHASOLICITUD
 * @property string $FECHASOLICITADA
 * @property integer $NUMTELEFONO
 * @property integer $ESTADOSOLICITUD
 * @property string $DESCRIPCIONSOLICITUD
 * @property string $TIPOPROPIEDAD
 * @property string $CORREOCONTACTO
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
			array('NOMBRESSOLICITANTE, APELLIDOSSOLICITANTE, SERVICIOSOLICITADO, NUMTELEFONO, DESCRIPCIONSOLICITUD, CORREOCONTACTO', 'required'),
			array('NUMTELEFONO, ESTADOSOLICITUD', 'numerical', 'integerOnly'=>true),
			array('RUTCLIENTE', 'length', 'max'=>10),
			array('NOMBRESSOLICITANTE, APELLIDOSSOLICITANTE, TIPOPROPIEDAD', 'length', 'max'=>50),
			array('SERVICIOSOLICITADO', 'length', 'max'=>25),
			array('DESCRIPCIONSOLICITUD', 'length', 'max'=>254),
			array('CORREOCONTACTO', 'length', 'max'=>100),
			array('FECHASOLICITUD, FECHASOLICITADA', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IDSOLICITUD, RUTCLIENTE, NOMBRESSOLICITANTE, APELLIDOSSOLICITANTE, SERVICIOSOLICITADO, FECHASOLICITUD, FECHASOLICITADA, NUMTELEFONO, ESTADOSOLICITUD, DESCRIPCIONSOLICITUD, TIPOPROPIEDAD, CORREOCONTACTO', 'safe', 'on'=>'search'),
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
			'IDSOLICITUD' => 'Código ',
			'RUTCLIENTE' => 'RUT de cliente',
			'NOMBRESSOLICITANTE' => 'Nombres',
			'APELLIDOSSOLICITANTE' => 'Apellidos',
			'SERVICIOSOLICITADO' => 'Servicio prestado',
			'FECHASOLICITUD' => 'Fecha de solicitud',
			'FECHASOLICITADA' => 'Fecha de ejecución',
			'NUMTELEFONO' => 'Fono de contacto',
			'ESTADOSOLICITUD' => 'Estado de solicitud',
			'DESCRIPCIONSOLICITUD' => 'Descripción',
			'TIPOPROPIEDAD' => 'Tipo de propiedad',
			'CORREOCONTACTO' => 'Correo de contacto',
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

		$criteria->compare('IDSOLICITUD',$this->IDSOLICITUD);
		$criteria->compare('RUTCLIENTE',$this->RUTCLIENTE,true);
		$criteria->compare('NOMBRESSOLICITANTE',$this->NOMBRESSOLICITANTE,true);
		$criteria->compare('APELLIDOSSOLICITANTE',$this->APELLIDOSSOLICITANTE,true);
		$criteria->compare('SERVICIOSOLICITADO',$this->SERVICIOSOLICITADO,true);
		$criteria->compare('FECHASOLICITUD',$this->FECHASOLICITUD,true);
		$criteria->compare('FECHASOLICITADA',$this->FECHASOLICITADA,true);
		$criteria->compare('NUMTELEFONO',$this->NUMTELEFONO);
		$criteria->compare('ESTADOSOLICITUD',$this->ESTADOSOLICITUD);
		$criteria->compare('DESCRIPCIONSOLICITUD',$this->DESCRIPCIONSOLICITUD,true);
		$criteria->compare('TIPOPROPIEDAD',$this->TIPOPROPIEDAD,true);
		$criteria->compare('CORREOCONTACTO',$this->CORREOCONTACTO,true);

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
