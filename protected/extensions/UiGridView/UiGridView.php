<?php

Yii::import('zii.widgets.grid.CGridView');

class UiGridView extends CGridView
{

    public $uiFile = "";

    public function __construct($owner = null)
    {
        parent::__construct($owner);

        $this->cssFile = false;
        $this->afterAjaxUpdate = 'js:function(id, data){$("#"+id).styleTable();}';
    }

    public function registerClientScript()
    {
        parent::registerClientScript();

        $assetsDir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
        $assetsDir = Yii::app()->getAssetManager()->publish($assetsDir);

        $cs = Yii::app()->clientScript;
        $cs->registerScriptFile(Yii::app()->getClientScript()->getCoreScriptUrl() . '/jui/js/jquery-ui-i18n.min.js');

        if (strlen($this->uiFile)) {
            $cs->registerCssFile($this->uiFile);
        } else {
            $cs->registerCssFile($cs->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');
        };

        $cs->registerScriptFile($assetsDir . '/js/uichange.js', CClientScript::POS_HEAD);
        $cs->registerCssFile($assetsDir . '/css/uichange.css');

        $cs->registerScript(
                'uigridviewreg' . uniqid(), '$("#' . $this->id . '").styleTable();', CClientScript::POS_END);
    }

}

