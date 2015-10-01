<?php

/**
 * Created by PhpStorm.
 * User: Mario
 * Date: 20-08-2015
 * Time: 17:27
 */
class EBackButtonWidget extends CWidget {
    public function run() {

        echo CHtml::button('Volver', array(
                'name' => 'btnBack',
                'class' => 'boton',
                'onclick' => "history.go(-1)",
            )
        );
    }

}