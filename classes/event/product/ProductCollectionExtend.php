<?php namespace Beltechsoft\CompareShopaholic\Classes\Event\Product;

use Beltechsoft\CompareShopaholic\Classes\Processing\CompareProcessing;
use Lovata\Shopaholic\Classes\Collection\ProductCollection;

class ProductCollectionExtend
{
    public function subscribe(): void
    {
        ProductCollection::extend(function($productCollection) {

            $productCollection->addDynamicMethod('compares', function () use ($productCollection) {

                $productIds = app(CompareProcessing::class)->getList();
                return $productCollection->intersect($productIds);
            });
        });
    }
}
