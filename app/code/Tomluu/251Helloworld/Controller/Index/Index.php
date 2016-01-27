<?php
namespace Tomluu\251Helloworld\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $this->getResponse()->appendBody('Hello world');
    }
}