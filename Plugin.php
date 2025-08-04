<?php namespace Beltechsoft\CompareShopaholic;


use Beltechsoft\CompareShopaholic\Classes\Event\Product\ProductCollectionExtend;
use Beltechsoft\CompareShopaholic\Classes\Event\Product\ProductItemExtend;
use Beltechsoft\CompareShopaholic\Classes\Event\Product\ProductModelExtend;
use Beltechsoft\CompareShopaholic\Classes\Event\Settings\SettingBackendExtend;
use Beltechsoft\CompareShopaholic\Components\Compare;
use System\Classes\PluginBase;

/**
 * Class Plugin
 * @package Beltechsoft\CompareShopaholic
 */
class Plugin extends PluginBase
{
    public function registerComponents(): array
    {
        return [
            Compare::class => 'Compare',
        ];
    }

    public function register(): void
    {
        \Event::subscribe(ProductCollectionExtend::class);
        \Event::subscribe(ProductItemExtend::class);
        \Event::subscribe(ProductModelExtend::class);
        \Event::subscribe(SettingBackendExtend::class);
    }
}
