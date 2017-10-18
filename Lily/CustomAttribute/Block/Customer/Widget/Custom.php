<?php
/**
 * Created by PhpStorm.
 * User: liliannecantillo
 * Date: 10/17/17
 * Time: 3:23 PM
 */

namespace Lily\Devchannel\CustomAttribute\Block\Customer\Widget;


use Magento\Customer\Api\Data\AddressInterface;
use Magento\Customer\Model\Metadata\AddressMetadata;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;

class Custom extends Template
{
    private $addressMetadata;

    /**
     * Custom constructor.
     * @param Template\Context $context
     * @param AddressMetadataInterface $addressMetadata
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        AddressMetadataInterface $addressMetadata,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->addressMetadata=$addressMetadata;
    }

    protected function _contruct(){
        parent::_construct();
        $this->setTemplate('widget/custom.phtml');
    }
    public function isRequired(){
        return $this->getAttribute()
            ?
            $this->getAttribute()->isRequired()
            : false;
    }
    public function getFieldId(){
        return 'custom';
    }
    public function getFieldLabel(){
        return $this->getAttribute()
            ? $this->getAttribute()->getFrontendLabel()
            : __('Custom');
    }
    public function getFieldName(){
        return 'custom';
    }
    public function getValue(){
        $address=$this->getAddress();
        if($address instanceof AddressInterface){
            return $address->getCustomAttributes('custom')
                  ? $address->getCustomAttributes('custom')->getValue():null;
        }
        return null;
    }
    private  function getAttribute(){
        try{
            $attribute=$this->addressMetadata->getAttributeMetadata('custom');
        }catch (NoSuchEntityException $exception){
            return null;
        }
        return $attribute[0];
    }
}