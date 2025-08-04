<?php namespace Beltechsoft\CompareShopaholic\Classes\Event\Product;

use Lovata\Toolbox\Classes\Helper\UserHelper;

class ProductModelExtend
{
    public function subscribe(): void
    {
        UserHelper::instance()->getUserModel()::extend(function ($user) {
            $user->addJsonable('product_compare');
        });
    }
}
