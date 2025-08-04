<?php namespace Beltechsoft\CompareShopaholic\Components;

use Beltechsoft\CompareShopaholic\Classes\Processing\CompareProcessing;
use Cms\Classes\ComponentBase;
use Lovata\Shopaholic\Classes\Collection\ProductCollection;
use October\Rain\Support\Facades\Input;

class Compare extends ComponentBase
{

    public function componentDetails(): array
    {
        return [
            'name' => 'beltechsoft.compareshopaholic::lang.component.test_data_name',
            'description' => 'beltechsoft.compareshopaholic::lang.component.test_data_description',
        ];
    }

    public function onAddCompare(): array
    {

        $productID = Input::get('product_id');
        $compareProcessing = app(CompareProcessing::class);

        $compareProcessing->add($productID);
        $arProductIDList = $compareProcessing->getList();

        $obProductItem = ProductCollection::make([$productID])->first();

        return ['items' => $arProductIDList, 'productItem' => $obProductItem->toArray()];

    }

    public function onRemoveCompare(): array
    {

        $productID = Input::get('product_id');
        $compareProcessing = app(CompareProcessing::class);

        $compareProcessing->remove($productID);
        $arProductIDList = $compareProcessing->getList();

        return ['items' => $arProductIDList];
    }

    public function clearCompare(): void
    {
        $compareProcessing = app(CompareProcessing::class);
        $compareProcessing->clear();
    }

    public function total(): int
    {
        $compareProcessing = app(CompareProcessing::class);
        return count($compareProcessing->getList());
    }
}
