<?php
namespace Bluecom\StoreLocator\Controller\Adminhtml\Location;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Bluecom_StoreLocator::store_location');
        $resultPage->addBreadcrumb(__('Store Location'), __('Store Location'));
        $resultPage->addBreadcrumb(__('Manage Store Location'), __('Manage Store Location'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Store Location'));

        return $resultPage;
    }

    /**
     * Is the user allowed to view the blog post grid.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Bluecom_StoreLocator::location');
    }
}