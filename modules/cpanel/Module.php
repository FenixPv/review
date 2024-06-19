<?php

namespace app\modules\cpanel;

/**
 * cpanel module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\cpanel\controllers';
    public $layout = '@app/modules/cpanel/views/layouts/main.php';
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
