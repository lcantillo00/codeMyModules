<?php
/**
 * Created by PhpStorm.
 * User: liliannecantillo
 * Date: 10/17/17
 * Time: 12:22 PM
 */

namespace Lily\CustomAttribute\Plugin\Customer;


class AddressEditPlugin
{
    private $layout;
    public function __construct( LayoutInterface $layout)
    {
       $this->layout=$layout;
    }

    public function afterGetNameBlockHtml(\Magento\Customer\Block\Address\Edit $edit,$result)
    {
        $customBlock=$this->layout->createBlock('Lily\CustomAttribute\Block\Customer\Address\Form\Edit\Custom',
        'devchannel_custom_attribute');
        return $result . $customBlock->toHtml();

    }

}