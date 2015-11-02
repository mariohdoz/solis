<?php

/**
 * This is the model class for table "arriendo".
 *
 * The followings are the available columns in table 'arriendo':
 * @property integer $id_arriendo
 * @property integer $id_propiedad
 * @property string $rut_admin
 * @property string $rut_arrendatario
 * @property string $inscripcion_arriendo
 * @property string $fechapago_arriendo
 * @property string $inicio_arriendo
 * @property string $termino_arriendo
 * @property integer $valor_arriendo
 */
class Arriendo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'arriendo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_propiedad, rut_admin, inscripcion_arriendo, fechapago_arriendo, inicio_arriendo, termino_arriendo, valor_arriendo', 'required'),
			array('id_propiedad, valor_arriendo', 'numerical', 'integerOnly'=>true),
			array('rut_admin, rut_arrendatario', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_arriendo, id_propiedad, rut_admin, rut_arrendatario, inscripcion_arriendo, fechapago_arriendo, inicio_arriendo, termino_arriendo, valor_arriendo', 'safe', 'on'=>'search'),
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
			'id_arriendo' => 'Id Arriendo',
			'id_propiedad' => 'Id Propiedad',
			'rut_admin' => 'Rut Admin',
			'rut_arrendatario' => 'RUT del arrendatario',
			'inscripcion_arriendo' => 'Inscripcion Arriendo',
			'fechapago_arriendo' => 'Fecha de pago',
			'inicio_arriendo' => 'Inicio del arriendo',
			'termino_arriendo' => 'Término del arriendo',
			'valor_arriendo' => 'Valor pactado de arriendo',
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

		$criteria->compare('id_arriendo',$this->id_arriendo);
		$criteria->compare('id_propiedad',$this->id_propiedad);
		$criteria->compare('rut_admin',$this->rut_admin,true);
		$criteria->compare('rut_arrendatario',$this->rut_arrendatario,true);
		$criteria->compare('inscripcion_arriendo',$this->inscripcion_arriendo,true);
		$criteria->compare('fechapago_arriendo',$this->fechapago_arriendo,true);
		$criteria->compare('inicio_arriendo',$this->inicio_arriendo,true);
		$criteria->compare('termino_arriendo',$this->termino_arriendo,true);
		$criteria->compare('valor_arriendo',$this->valor_arriendo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Arriendo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}