<?php

namespace app\modules\cart;

use Yii;

/**
 * admin module definition class
 */
class Module extends \luya\base\Module
{
    /**
     * @inheritdoc
     */
   // public $controllerNamespace = 'app\modules\cart\controllers';
    public $useAppViewPath = false;
    /**
     * @inheritdoc
     */
    public function init()
    {
       // $this->layout = '@app/views/layouts/base';	
        parent::init();
    }
}
