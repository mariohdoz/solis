<?php

/**
 * This is the model class for table "administrador".
 *
 * The followings are the available columns in table 'administrador':
 * @property string $rut_admin
 * @property string $nombres_admin
 * @property string $apellidos_admin
 * @property string $contrasena_admin
 * @property string $correo_admin
 * @property string $telefono_admin
 * @property string $perfil_admin
 * @property integer $super_admin
 * @property integer $activo_admin
 */
class Administrador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'administrador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut_admin, nombres_admin, apellidos_admin, contrasena_admin, correo_admin, telefono_admin, perfil_admin', 'required'),
			array('super_admin, activo_admin', 'numerical', 'integerOnly'=>true),
			array('rut_admin', 'length', 'max'=>10),
			array('nombres_admin, apellidos_admin, contrasena_admin, correo_admin', 'length', 'max'=>100),
			array('telefono_admin', 'length', 'max'=>12),
			array('perfil_admin', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut_admin, nombres_admin, apellidos_admin, contrasena_admin, correo_admin, telefono_admin, perfil_admin', 'safe', 'on'=>'search'),
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
			'rut_admin' => 'RUT del administrador',
			'nombres_admin' => 'Nombres',
			'apellidos_admin' => 'Apellidos',
			'contrasena_admin' => 'Contraseña',
			'correo_admin' => 'Correo',
			'telefono_admin' => 'Telefono',
			'perfil_admin' => 'Foto',
			'super_admin' => 'Super Admin',
			'activo_admin' => 'administrador activo',
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

		$criteria->compare('rut_admin',$this->rut_admin,true);
		$criteria->compare('nombres_admin',$this->nombres_admin,true);
		$criteria->compare('apellidos_admin',$this->apellidos_admin,true);
		$criteria->compare('contrasena_admin',$this->contrasena_admin,true);
		$criteria->compare('correo_admin',$this->correo_admin,true);
		$criteria->compare('telefono_admin',$this->telefono_admin,true);
		$criteria->compare('perfil_admin',$this->perfil_admin,true);
		$criteria->compare('super_admin',$this->super_admin);
		$criteria->compare('activo_admin',$this->activo_admin);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Administrador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
