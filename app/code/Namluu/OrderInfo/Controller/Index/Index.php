<?php
namespace Namluu\OrderInfo\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Sales\Model\OrderFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;

class Index extends \Namluu\OrderController\Controller\Index\Index
{
    /**
     * @var \Magento\Sales\Model\OrderFactory
     */
    protected $_orderFactory;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $_registry;

    public function __construct(
        Context $context,
        OrderFactory $orderFactory,
        PageFactory $resultPageFactory,
        Registry $registry
    )
    {
        $this->_orderFactory = $orderFactory;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_registry = $registry;

        // call contructor of Namluu_OrderController
        parent::__construct($context, $orderFactory);
    }

    public function execute()
    {
        $orderId = (int) $this->getRequest()->getParam('id');
        $isJson = (int) $this->getRequest()->getParam('json');

        if ($isJson == 1) {
            return parent::execute();
        } else {
            $orderId = $this->getRequest()->getParam('id');
            $order = $this->_orderFactory->create();
            $order->load($orderId);

            if (!$order->getId()) {
                $this->_registry->register('order', null);
            } else {
                $this->_registry->register('order', $order);
            }

            return $this->_resultPageFactory->create();
        }
    }
}