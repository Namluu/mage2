<?php
namespace Tomluu\E351AbstractBlock\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $layout = $this->_view->getLayout();
        $block = $layout->createBlock('Tomluu\E351AbstractBlock\Block\Test');
        $this->getResponse()->appendBody($block->toHtml());
    }
}