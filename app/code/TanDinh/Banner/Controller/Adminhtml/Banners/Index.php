<?php

namespace TanDinh\Banner\Controller\Adminhtml\Banners;

class Index extends \TanDinh\Banner\Controller\Adminhtml\Banners
{
    /**
     * Banners list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('TanDinh Banners'));
        $resultPage->addBreadcrumb(__('TanDinh'), __('TanDinh'));
        $resultPage->addBreadcrumb(__('Banners'), __('Banners'));
        return $resultPage;
    }
}