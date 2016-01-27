<?php
namespace Tomluu\Helloworld2\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $this->getResponse()->appendBody('Hello world');
    }
}