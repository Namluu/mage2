<?php
namespace Namluu\VendorList\Controller\Vendor;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;

class View extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    protected $_coreRegistry;

    protected $_vendorFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Registry $registry,
        \Namluu\Vendor\Model\VendorFactory $vendorFactory
    )
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->_vendorFactory = $vendorFactory;

        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();

        $vendorId = $this->getRequest()->getParam('vendor_id');
        $vendor = $this->_vendorFactory->create()->load($vendorId);
        $this->_coreRegistry->register('vendor', $vendor);

        $resultPage->getConfig()->getTitle()->set(__($vendor->getName()));

        return $resultPage;
    }
}