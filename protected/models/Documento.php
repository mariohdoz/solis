<?php

/**
 * This is the model class for table "documento".
 *
 * The followings are the available columns in table 'documento':
 * @property integer $id_documento
 * @property integer $id_arriendo
 * @property string $rut_arrendatario
 * @property integer $id_propiedad
 * @property string $rut_cliente
 * @property string $url_documento
 * @property string $tipo_documento
 */
class Documento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'documento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url_documento', 'required'),
			array('id_arriendo, id_propiedad', 'numerical', 'integerOnly'=>true),
			array('rut_arrendatario, rut_cliente', 'length', 'max'=>10),
			array('url_documento', 'length', 'max'=>250),
			array('tipo_documento', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_documento, id_arriendo, rut_arrendatario, id_propiedad, rut_cliente, url_documento, tipo_documento', 'safe', 'on'=>'search'),
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
			'id_documento' => 'Id del documento',
			'id_arriendo' => 'Id del arriendo ',
			'rut_arrendatario' => 'Id del arrendatario',
			'id_propiedad' => 'Id de la propiedad',
			'rut_cliente' => 'RUT del cliente',
			'url_documento' => 'ubicación del documento',
			'tipo_documento' => 'Tipo de documento',
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

		$criteria->compare('id_documento',$this->id_documento);
		$criteria->compare('id_arriendo',$this->id_arriendo);
		$criteria->compare('rut_arrendatario',$this->rut_arrendatario,true);
		$criteria->compare('id_propiedad',$this->id_propiedad);
		$criteria->compare('rut_cliente',$this->rut_cliente,true);
		$criteria->compare('url_documento',$this->url_documento,true);
		$criteria->compare('tipo_documento',$this->tipo_documento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Documento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
