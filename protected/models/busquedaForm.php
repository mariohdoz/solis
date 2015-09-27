<?php
class busquedaForm extends CFormModel{
    public $SERVICIO;
    public $COMUNAPROPIEDAD;
    public $TIPO;
    public $DIRECCION;
    public $CANTPIEZA;
    public $CANTBANO;
    public $TERRENO;
    public $ESTADO;
    public $DESCRIPCION;
    public $PRECIOINICIAL;
    public $PRECIOFINAL;
    public $SUPERFICIE;
    public $BANOS;
    public $AMOBLADO;
    public $BUSCAR;



    public function rules(){
        return array(
            array("TIPO ,SERVICIO, COMUNAPROPIEDAD","required"),
            array('TIPO ,SERVICIO, COMUNAPROPIEDAD', 'safe', 'on'=>'search'),
        );
    }

    public function attributeLabels()
    {
        return array(
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
            'PRECIOINICIAL' => 'Precio',
            'PRECIOFINAL' => 'Hasta',
            'AMOBLADO' => 'Amoblado',
            'BUSCAR' => 'Filtrar'

        );
    }

}
