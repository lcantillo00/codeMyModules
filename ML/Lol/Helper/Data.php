<?php
///**
// * Created by PhpStorm.
// * User: liliannecantillo
// * Date: 11/5/17
// * Time: 10:28 PM
// */
//
//namespace ML\Lol\Helper;
//
//
//
//class Data extends \Magento\Framework\App\Helper\AbstractHelper
//{
//    const XML_PATH_ENABLED   = 'wholesale/wholesale/enabled';
//    protected $_customerSession;
//    public function __construct(
//        \Magento\Framework\App\Helper\Context $context, \Magento\Framework\ObjectManagerInterface $objectManager,
//        \Magento\Customer\Model\Session $customerSession
//    ) {
//        $this->_objectManager = $objectManager;
//        $this->_customerSession = $customerSession;
//        parent::__construct($context);
//    }
//    public function isEnabled() {
//        return $this->scopeConfig->getValue(self::XML_PATH_ENABLED, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
//
//    }
//    public function isLoggedIn()
//    {
//        return $this->_customerSession->isLoggedIn();
//    }
//  public function  getUserName()
//  {
//
//      $customer = $this->_customerSession->getCustomer();
//      return $customer;
//  }

//
//    public function getUserName()
//    {
//        if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
//            return '';
//        }
//        $customer = Mage::getSingleton('customer/session')->getCustomer();
//        return trim($customer->getName());
//    }
//
//    public function getUserEmail()
//    {
//        if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
//            return '';
//        }
//        $customer = Mage::getSingleton('customer/session')->getCustomer();
//        return $customer->getEmail();
//    }
//}