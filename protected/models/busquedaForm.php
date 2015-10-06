<?php
class busquedaForm extends CFormModel{
    public $servicio_propiedad;
    public $comuna_propiedad;
    public $tipo_propiedad;
    public $direccion_propiedad;
    public $habitacion_propiedad;
    public $bano_propiedad;
    public $terreno_propiedad;
    public $estado_propiedad;
    public $descripcion_propiedad;
    public $construido_propiedad;
    public $PRECIOINICIAL;
    public $PRECIOFINAL;
    public $SUPERFICIE;
    public $amoblado_propiedad;



    public function rules(){
        return array(
            array("tipo_propiedad ,servicio_propiedad, comuna_propiedad","required"),
            array('tipo_propiedad , servicio_propiedad, comuna_propiedad', 'safe', 'on'=>'search'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'direccion_propiedad' => 'Direcci&oacute;n',
            'habitacion_propiedad' => 'N&uacute;mero de habitaciones.',
            'bano_propiedad' => 'N&uacute;mero de baños',
            'terreno_propiedad' => 'Terreno',
            'construido_propiedad' => 'Terreno construido',
            'tipo_propiedad' => 'Tipo',
            'servicio_propiedad' => 'Servicio',
            'estado_propiedad' => 'Estado',
            'descripcion_propiedad' => 'Breve descripci&oacute;n',
            'comuna_propiedad' => 'Comuna donde se ubica',
            'PRECIOINICIAL' => 'Precio',
            'PRECIOFINAL' => 'Hasta',
            'amoblado_propiedad' => 'Amoblado',
        );
    }

}
