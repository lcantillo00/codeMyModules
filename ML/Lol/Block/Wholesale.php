<?php
namespace ML\Lol\Block;
class Wholesale extends \Magento\Framework\View\Element\Template
{
    protected $_productCollectionFactory;
    protected $_productRepository;
    protected $_directoryBlock;

    protected $_countryCollectionFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Directory\Model\CountryFactory $countryCollectionFactory,
        \Magento\Directory\Block\Data $directoryBlock,




//        \Magento\Directory\Api\CountryInformationAcquirerInterface $countryInformationAcquirer,


        array $data = []
    )
    {
        $this->_countryCollectionFactory=$countryCollectionFactory;

        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_productRepository = $productRepository;
        $this->_countryCollectionFactory= $countryCollectionFactory;
        parent::__construct($context, $data);
        $this->_directoryBlock=$directoryBlock;
    }

//    public function getAvailableCountries()
//    {
//        $collection = $this->_countryCollectionFactory->create();
//
//        return $collection;
//    }


//    public function getCountryCollection()
//    {
//        $collection = $this->_countryCollectionFactory->create();
//        return $collection;
//    }


    public function getCountries()
    {
        $country = $this->_directoryBlock->getCountryHtmlSelect();
        return $country;
    }
    public function getRegion()
    {
        $region = $this->_directoryBlock->getRegionHtmlSelect();
        return $region;
    }
    /**
     * Retrieve form action
     *
     * @return string
     */
    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3); // fetching only 3 products
        return $collection;
    }
    public function getProductById($id)
    {
        return $this->_productRepository->getById($id);
    }

    public function getProductBySku($sku)
    {
        return $this->_productRepository->get($sku);
    }
    public function getFormAction()
    {
        // companymodule is given in routes.xml
        // controller_name is folder name inside controller folder
        // action is php file name inside above controller_name folder
        return $this->getUrl('wholesale/index/post',['_secure'=>true]);

    }
}