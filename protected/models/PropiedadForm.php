<?php

class PropiedadForm extends CFormModel{

    public $IDPROP;
    public $DIRECCION;
    public $CANTPIEZA;
    public $CANTBANO;
    public $TERRENO;
    public $TIPO;
    public $SERVICIO;
    public $ESTADO;
    public $DESCRIPCION;
    public $COMUNAPROPIEDAD;

    public function rules(){
        return array(
            array("IDPROP","required"),
            array('IDPROP, RUTCLIENTE, DIRECCION, CANTPIEZA, CANTBANO, TERRENO, TERRENOCONSTRUIDO, TIPO, SERVICIO, ESTADO, DESCRIPCION, COMUNAPROPIEDAD, VALORPROPIEDAD, AMOBLADO', 'safe', 'on'=>'search'),        );
    }

    public function attributeLabels()
    {
        return array(
            'IDPROP'=>'Id',
            'RUTCLIENTE' => 'RUT del propietario',
            'DIRECCION' => 'Direcci&oacute;n',
            'CANTPIEZA' => 'N&uacute;mero de habitaciones.',
            'CANTBANO' => 'N&uacute;mero de baños',
            'TERRENO' => 'Terreno',
            'TERRENOCONSTRUIDO' => 'Terreno construido',
            'TIPO' => 'Tipo',
            'SERVICIO' => 'Servicio',
            'ESTADO' => 'Estado',
            'DESCRIPCION' => 'Breve descripci&oacute;n',
            'COMUNAPROPIEDAD' => 'Comuna donde se ubica',

        );
    }
    public function search()
  	{
  		// @todo Please modify the following code to remove attributes that should not be searched.

  		$criteria=new CDbCriteria;

  		$criteria->compare('IDPROP',$this->IDPROP);
  		$criteria->compare('RUTCLIENTE',$this->RUTCLIENTE,true);
  		$criteria->compare('DIRECCION',$this->DIRECCION,true);
  		$criteria->compare('CANTPIEZA',$this->CANTPIEZA);
  		$criteria->compare('CANTBANO',$this->CANTBANO);
  		$criteria->compare('TERRENO',$this->TERRENO,true);
  		$criteria->compare('TERRENOCONSTRUIDO',$this->TERRENOCONSTRUIDO,true);
  		$criteria->compare('TIPO',$this->TIPO,true);
  		$criteria->compare('SERVICIO',$this->SERVICIO,true);
  		$criteria->compare('ESTADO',$this->ESTADO);
  		$criteria->compare('DESCRIPCION',$this->DESCRIPCION,true);
  		$criteria->compare('COMUNAPROPIEDAD',$this->COMUNAPROPIEDAD,true);
  		$criteria->compare('VALORPROPIEDAD',$this->VALORPROPIEDAD);
  		$criteria->compare('AMOBLADO',$this->AMOBLADO);

  		return new CActiveDataProvider($this, array(
  			'criteria'=>$criteria,
  		));
  	}

}
