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
 * @property integer $comisioncomprador_venta
 * @property integer $comisioncliente_venta
 * @property string $ganancia_venta
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
			array('id_propiedad, rut_admin, nombrescomprador_venta, apellidoscomprador_venta, rutcomprador_venta, ganancia_venta', 'required'),
			array('id_propiedad, comisioncomprador_venta, comisioncliente_venta', 'numerical', 'integerOnly'=>true),
			array('rut_admin, rutcomprador_venta', 'length', 'max'=>10),
			array('nombrescomprador_venta, apellidoscomprador_venta', 'length', 'max'=>100),
			array('ganancia_venta', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_venta, id_propiedad, rut_admin, nombrescomprador_venta, apellidoscomprador_venta, rutcomprador_venta, comisioncomprador_venta, comisioncliente_venta, ganancia_venta', 'safe', 'on'=>'search'),
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
	public function getRut(){
		$data = explode('-', $this->rutcomprador_venta);
		return $data[0];
	}
 	public function ValidateRut($attribute, $param){
 		$data = explode('-', $this->rutcomprador_venta);
 		$evaluate = strrev($data[0]);
 		$multiply = 2;
 		$store = 0;
 		for ($i = 0; $i < strlen($evaluate); $i++) {
 			 $store += $evaluate[$i] * $multiply;
 			 $multiply++;
 			 if ($multiply > 7)
 					 $multiply = 2;
 		}
 		isset($data[1]) ? $verifyCode = strtolower($data[1]) : $verifyCode = '';
 		$result = 11 - ($store % 11);
 		if ($result == 10)
 			 $result = 'k';
 		if ($result == 11)
 			 $result = 0;
 		if ($verifyCode != $result)
 			 $this->addError('rut', 'Rut inválido.');
 	}
	function getFormato() {
		return number_format( substr ( $this->rutcomprador_venta, 0 , -1 ) , 0, "", ".") . '-' . substr ( $this->rutcomprador_venta, strlen($this->rutcomprador_venta) -1 , 1 );
	}
	function getAdmin() {
		return number_format( substr ( $this->rut_admin, 0 , -1 ) , 0, "", ".") . '-' . substr ( $this->rut_admin, strlen($this->rut_admin) -1 , 1 );
	}
	public function getRu(){
		$data = explode('-', $this->rutcomprador_venta);
		return $data[0];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_venta' => 'Id Venta',
			'id_propiedad' => 'Número de ficha de la propiedad',
			'rut_admin' => 'RUT del administrador',
			'nombrescomprador_venta' => 'Nombres de comprador',
			'apellidoscomprador_venta' => 'Apellidos del comprador',
			'rutcomprador_venta' => 'RUT del comprador',
			'comisioncomprador_venta' => 'Comisión a comprador',
			'comisioncliente_venta' => 'Comisión a vendedor',
			'ganancia_venta' => 'Ganancia de la venta',
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
		$criteria->compare('comisioncomprador_venta',$this->comisioncomprador_venta);
		$criteria->compare('comisioncliente_venta',$this->comisioncliente_venta);
		$criteria->compare('ganancia_venta',$this->ganancia_venta,true);

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
