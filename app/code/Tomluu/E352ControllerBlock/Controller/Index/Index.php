<?php
namespace Tomluu\E352ControllerBlock\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $layout = $this->_view->getLayout();
        $block = $layout->createBlock('Magento\Framework\View\Element\Text');
        $block->setText('Hello world from text block !');
        $this->getResponse()->appendBody($block->toHtml());
    }
}