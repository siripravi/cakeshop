<?php

namespace app\modules\eshop\admin\apis;

/**
 * Set Attribute Controller.
 *
 * File has been created with `crud/create` command on LUYA version 1.0.0-dev.
 */
class SetAttributeController extends \luya\admin\ngrest\base\Api
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'app\modules\eshop\models\SetAttribute';
}
