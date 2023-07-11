<?php

namespace app\modules\eshop\models;

use Yii;
use app\modules\eshop\models\Group;
use app\modules\eshop\models\Product;

/**
 * This is the model class for table "estore_product_group_ref".
 *
 * @property integer $group_id
 * @property integer $product_id
 */
class ProductGroupRef extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estore_product_group_ref';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'product_id'], 'required'],
            [['group_id', 'product_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'product_id' => 'Product ID',
        ];
    }

    public function getGroups()
    {
        return $this->hasMany(Group::class, ['id' => 'group_id']);
    }
    
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['id' => 'product_id']);
    }
}
