<?php namespace Beltechsoft\CompareShopaholic\Classes\Event\Product;

use Lovata\Shopaholic\Classes\Collection\ProductCollection;
use Lovata\Shopaholic\Classes\Item\ProductItem;

class ProductItemExtend
{
    public function subscribe(): void
    {
        ProductItem::extend(function($productItem) {

            $productItem->addDynamicMethod('inCompare', function () use ($productItem) {
                $productCollection = ProductCollection::make()->compares();
                return $productCollection->has($productItem->id);
            });
        });
    }
}
