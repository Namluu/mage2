<?php
namespace Tomluu\E251Helloworld\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        //$this->_redirect('catalog/category/view/id/20');
        $this->getResponse()->appendBody('Hello world');
    }
}