<?php

class PropiedadForm extends CFormModel{

    public $id_propiedad;
    public $direccion_propiedad;
    public $habitacion_propiedad;
    public $bano_propiedad;
    public $terreno_propiedad;
    public $tipo_propiedad;
    public $servicio_propiedad;
    public $estado_propiedad;
    public $descripcion;
    public $comuna_propiedad;

    public function rules(){
        return array(
            array("id_propiedad","required"),
            array('id_propiedad, RUTCLIENTE, direccion_propiedad, habitacion_propiedad, bano_propiedad, terreno_propiedad_propiedad, TERRENOCONSTRUIDO, tipo_propiedad, servicio_propiedad, estado_propiedad, descripcion, comuna_propiedadPROPIEDAD, VALORPROPIEDAD, AMOBLADO', 'safe', 'on'=>'search'),        );
    }

    public function attributeLabels()
    {
        return array(
            'id_propiedad'=>'Id',
            'RUTCLIENTE' => 'RUT del propietario',
            'direccion_propiedad' => 'Direcci&oacute;n',
            'habitacion_propiedad' => 'N&uacute;mero de habitaciones.',
            'bano_propiedad' => 'N&uacute;mero de baños',
            'terreno_propiedad' => 'Terreno',
            'TERRENOCONSTRUIDO' => 'Terreno construido',
            'tipo_propiedad' => 'tipo_propiedad',
            'servicio_propiedad' => 'servicio_propiedad',
            'estado_propiedad' => 'estado_propiedad',
            'descripcion' => 'Breve descripci&oacute;n',
            'comuna_propiedadPROPIEDAD' => 'Comuna donde se ubica',

        );
    }
    public function search()
  	{
  		// @todo Please modify the following code to remove attributes that should not be searched.

  		$criteria=new CDbCriteria;

  		$criteria->compare('id_propiedad',$this->id_propiedad);
  		$criteria->compare('RUTCLIENTE',$this->RUTCLIENTE,true);
  		$criteria->compare('direccion_propiedad',$this->direccion_propiedad,true);
  		$criteria->compare('habitacion_propiedad',$this->habitacion_propiedad);
  		$criteria->compare('bano_propiedad',$this->bano_propiedad);
  		$criteria->compare('terreno_propiedad',$this->terreno_propiedad,true);
  		$criteria->compare('TERRENOCONSTRUIDO',$this->TERRENOCONSTRUIDO,true);
  		$criteria->compare('tipo_propiedad',$this->tipo_propiedad,true);
  		$criteria->compare('servicio_propiedad',$this->servicio_propiedad,true);
  		$criteria->compare('estado_propiedad',$this->estado_propiedad);
  		$criteria->compare('descripcion',$this->descripcion,true);
  		$criteria->compare('comuna_propiedadPROPIEDAD',$this->comuna_propiedadPROPIEDAD,true);
  		$criteria->compare('VALORPROPIEDAD',$this->VALORPROPIEDAD);
  		$criteria->compare('AMOBLADO',$this->AMOBLADO);

  		return new CActiveDataProvider($this, array(
  			'criteria'=>$criteria,
  		));
  	}

}
