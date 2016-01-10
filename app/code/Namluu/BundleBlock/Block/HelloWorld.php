<?php
namespace Namluu\BundleBlock\Block;

class HelloWorld extends \Magento\Framework\View\Element\AbstractBlock
{
    protected function _toHtml()
    {
        return '<div>Hello World</div>';
    }
}
