<?php
namespace Tomluu\E353CustomBlock\Block\Product\View;

class Description extends \Magento\Framework\View\Element\Template
{
    public function beforeToHtml(\Magento\Catalog\Block\Product\View\Description $originalBlock) {
        //$originalBlock->getProduct()->setDescription('Test description');
        $originalBlock->setTemplate('Tomluu_E362TemplateBlock::test.phtml');
    }
}