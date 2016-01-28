<?php

namespace Tomluu\E253CustomAdmin\Controller\Adminhtml\Action;

class Index extends \Magento\Backend\App\Action
{
    public function execute()
    { 
        $this->getResponse()->appendBody("Hello world in admin");
    }

    protected function _isAllowed() {
        $secret = $this->getRequest()->getParam('secret');
        return isset($secret) && (int)$secret==1;
    }
}