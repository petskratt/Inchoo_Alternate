<?php

class Inchoo_Alternate_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function rewrittenProductUrl($productId, $categoryId, $storeId)
    {
        $coreUrl = Mage::getModel('core/url_rewrite');
        $idPath = sprintf('product/%d', $productId);
        if ($categoryId) {
            $idPath = sprintf('%s/%d', $idPath, $categoryId);
        }
        $coreUrl->setStoreId($storeId);
        $coreUrl->loadByIdPath($idPath);
        return $coreUrl->getRequestPath();
    }


}
