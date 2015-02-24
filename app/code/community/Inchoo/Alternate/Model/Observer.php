<?php

class Inchoo_Alternate_Model_Observer
{

    public function alternateLinks()
    {
        $headBlock = Mage::app()->getLayout()->getBlock('head');

        $stores = Mage::app()->getStores();
        $product = Mage::registry('current_product');
        $category = Mage::registry('current_category');

        if ($headBlock) {
            foreach ($stores as $store) {
                if ($product) {
                    $category ? $categoryId = $category->getId() : $categoryId = null;
                    $url = $store->getBaseUrl() . Mage::helper('inchoo_alternate')->rewrittenProductUrl($product->getId(), $categoryId, $store->getId());
                } else {
                    $store->getCurrentUrl();
                }
                $storeCode = substr(Mage::getStoreConfig('general/locale/code', $store->getId()), 0, 2);
                $headBlock->addLinkRel('alternate"' . ' hreflang="' . $storeCode, $url);
            }
        }
        return $this;
    }

}
