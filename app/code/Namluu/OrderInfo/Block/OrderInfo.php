<?php
namespace Namluu\OrderInfo\Block;

use Magento\Framework\View\Element\Template;

class OrderInfo extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        Template\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    )
    {
        $this->_registry = $registry;
        parent::__construct($context, $data);
    }

    public function getOrder()
    {
        return $this->_registry->registry('order');
    }
}
