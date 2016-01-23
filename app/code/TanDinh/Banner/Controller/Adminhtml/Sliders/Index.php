<?php

namespace TanDinh\Banner\Controller\Adminhtml\Sliders;

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
        $resultPage->getConfig()->getTitle()->prepend(__('TanDinh Sliders'));
        $resultPage->addBreadcrumb(__('TanDinh'), __('TanDinh'));
        $resultPage->addBreadcrumb(__('Sliders'), __('Sliders'));
        return $resultPage;
    }
}
