<?php

namespace app\modules\eshop\admin;

/**
 * Estore Admin Module.
 *
 * File has been created with `module/create` command on LUYA version 1.0.0-dev.
 */
class Module extends \luya\admin\base\Module
{
    public $apis = [
        'api-eshop-group' => 'app\modules\eshop\admin\apis\GroupController',
        'api-eshop-product' => 'app\modules\eshop\admin\apis\ProductController',
        'api-eshop-set' => 'app\modules\eshop\admin\apis\SetController',
        'api-eshop-setattribute' => 'app\modules\eshop\admin\apis\SetAttributeController',
        'api-eshop-article' => 'app\modules\eshop\admin\apis\ArticleController',
        'api-eshop-articleprice' => 'app\modules\eshop\admin\apis\ArticlePriceController',
        'api-eshop-currency' => 'app\modules\eshop\admin\apis\CurrencyController',
        'api-eshop-producer' => 'app\modules\eshop\admin\apis\ProducerController',
        
    ];
    
    public function getMenu()
    {
        return (new \luya\admin\components\AdminMenuBuilder($this))
        ->node('E-Store', 'store_mall_directory')
            ->group('Products')
                ->itemApi('Groups', 'eshopadmin/group/index', 'folder', 'api-eshop-group')
                ->itemApi('Products', 'eshopadmin/product/index', 'library_books', 'api-eshop-product')
                ->itemApi('Articles', 'eshopadmin/article/index', 'list', 'api-eshop-article')
                ->itemApi('Prices', 'eshopadmin/article-price/index', 'adjust', 'api-eshop-articleprice')
            ->group('Settings')
                ->itemApi('Currencies', 'eshopadmin/currency/index', 'attach_money', 'api-eshop-currency')
                ->itemApi('Producers', 'eshopadmin/producer/index', 'domain', 'api-eshop-producer')
            ->group('Sets')
                ->itemApi('Sets', 'eshopadmin/set/index', 'web_asset', 'api-eshop-set')
                ->itemApi('Attributes', 'eshopadmin/set-attribute/index', 'check_box', 'api-eshop-setattribute');
    }
    
    public function getAdminAssets()
    {
        return [
            'app\modules\eshop\admin\assets\EshopAdminAsset',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public static function onLoad()
    {
        self::registerTranslation('eshopadmin*', static::staticBasePath() . '/messages', [
            'eshopadmin' => 'eshopadmin.php',
        ]);
    }
    
    /**
     * {@inheritDoc}
     */
    public static function t($message, array $params = [])
    {
        return parent::baseT('eshopadmin', $message, $params);
    }
}