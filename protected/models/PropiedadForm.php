<?php

class PropiedadForm extends CFormModel{

    public $id_propiedad;
    public $direccion_propiedad;
    public $habitacion_propiedad;
    public $bano_propiedad;
    public $terreno_propiedad;
    public $tipo_propiedad;
    public $servicio_propiedad;
    public $descripcion_propiedad;
    public $comuna_propiedad;

    public function rules(){
        return array(
            array("id_propiedad","required"),
            array('id_propiedad, rut_cliente, direccion_propiedad, habitacion_propiedad, bano_propiedad, terreno_propiedad, construido_propiedad, tipo_propiedad, servicio_propiedad, descripcion_propiedad, comuna_propiedad, valor_propiedad, amoblado_propiedad', 'safe', 'on'=>'search'),        );
    }

    public function attributeLabels()
    {
        return array(
            'id_propiedad'=>'Id',
            'rut_cliente' => 'RUT del propietario',
            'direccion_propiedad' => 'Dirección',
            'habitacion_propiedad' => 'Número de habitaciones.',
            'bano_propiedad' => 'Número de baños',
            'terreno_propiedad' => 'Terreno',
            'construido_propiedad' => 'Terreno construido',
            'tipo_propiedad' => 'Tipo',
            'servicio_propiedad' => 'Servicio',
            'descripcion_propiedad' => 'Breve descripción',
            'comuna_propiedad' => 'Comuna donde se ubica',

        );
    }
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
  		$criteria->compare('descripcion_propiedad',$this->descripcion_propiedad,true);
  		$criteria->compare('comuna_propiedad',$this->comuna_propiedad,true);
  		$criteria->compare('valor_propiedad',$this->valor_propiedad);
  		$criteria->compare('amoblado_propiedad',$this->amoblado_propiedad);

  		return new CActiveDataProvider($this, array(
  			'criteria'=>$criteria,
  		));
  	}

}
