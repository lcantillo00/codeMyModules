<?php
namespace NewMod\CustomAttr\Block;

use Magento\Catalog\Block\Product\View;

class Features extends View
{
    public function getFeatures()
    {
        return $this->getProduct()->getExtensionAttributes()->getFeatures();
    }
}