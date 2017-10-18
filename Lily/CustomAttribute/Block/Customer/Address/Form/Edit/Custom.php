<?php
/**
 * Created by PhpStorm.
 * User: liliannecantillo
 * Date: 10/17/17
 * Time: 2:41 PM
 */

namespace Lily\CustomAttribute\Block\Customer\Address\Form\Edit;


use Braintree\Address;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Sales\Model\Order\AddressRepository;
use Magento\Customer\Api\Data\AddressInterface;
use Magento\Framework\View\Element\Template;
use Magento\Customer\Api\Data\AddressInterfaceFactory;
use Magento\Customer\ModelSession;
class Custom extends Template
{
    private $address;
    private $addressRepository;
    private $addressFactory;
    private $customerSession;
    public function __construct(
                                Template\Context $context,
                                AddressRepositoryInterface $addressRepository,
                                AddressInterfaceFactory $addressFactory,
                                Session $session,
                                array $data=[]
){
        parent::__construct($context,$data);
        $this->addressRepository=$addressRepository;
        $this->addressFactory=$addressFactory;
        $this->customerSession=$session;

}
    protected function _prepareLayout()
{
    $addressId=$this->getRequest()->getParam('id');
    if($addressId){
        try {
            $this->address=$this->addressRepository->getById($addressId);
            if($this->address->getCustomerId() !=$this->customerSession->getCustomerId())
                {
                $this->address=null;
                }
        }catch(NoSuchEntityException $exception){
            $this->address=null;
        }
    }
    if(null===$this->address){
        $this->address=$this->addressFactory->create();
    }
    $this->address=$this->addressRepository->getById($addressId);
    return parent::_prepareLayout();
}
    protected function _toHtml()
{
        $customWidgetBlock=$this->getLayout()->createBlock(
            'Lily\CustomAttribute\Block\Customer\Widget\Custom'
        );
        $customWidgetBlock->setAddress($this->address);
        return $customWidgetBlock->toHtml();
}
}