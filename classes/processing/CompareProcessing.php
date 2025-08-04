<?php namespace Beltechsoft\CompareShopaholic\Classes\Processing;

use Lovata\Toolbox\Classes\Storage\UserStorage;
use Lovata\Toolbox\Classes\Storage\SessionUserStorage;
class CompareProcessing
{
    const FIELD = 'product_compare';

    public function add($productID): void
    {
        if (empty($productID)) {
            return;
        }

        $obUserStorage = $this->getStorage();
        $obUserStorage->addToList(self::FIELD, $productID);
    }

    public function remove($productID): void
    {
        if (empty($productID)) {
            return;
        }

        $obUserStorage = $this->getStorage();
        $obUserStorage->removeFromList(self::FIELD, $productID);
    }

    public function getList(): array
    {
        $obUserStorage = $this->getStorage();

        return $obUserStorage->getList(self::FIELD);
    }

    public function clear(): void
    {
        $obUserStorage = $this->getStorage();
        $obUserStorage->clear(self::FIELD);
    }

    protected function getStorage(): UserStorage
    {
        $obUserStorage = app(UserStorage::class);
        $obUserStorage->setDefaultStorage(SessionUserStorage::class);

        return $obUserStorage;
    }
}
