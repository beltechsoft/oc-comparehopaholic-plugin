<?php namespace Beltechsoft\CompareShopaholic\Classes\Event\Settings;

use Lovata\Shopaholic\Models\Settings;
use Lovata\Toolbox\Classes\Event\AbstractBackendFieldHandler;

class SettingBackendExtend extends AbstractBackendFieldHandler
{

    protected function extendFields($obWidget)
    {
        $obWidget->addTabField('default_compare_page_id', [
            'label' => 'beltechsoft.compareshopaholic::lang.settings.name',
            'tab' => 'lovata.shopaholic::lang.tab.page_settings',
            'type' => 'dropdown',
            'span' => 'left',
            'emptyOption' => 'lovata.toolbox::lang.field.empty',
            'options' => 'getPageIdListOptions'
        ]);
    }

    protected function getModelClass(): string
    {
        return Settings::class;
    }

    protected function getControllerClass(): string
    {
        return \System\Controllers\Settings::class;
    }
}
