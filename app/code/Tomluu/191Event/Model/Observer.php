<?php
namespace Tomluu\191Event\Model;

use Magento\Framework\Event\ObserverInterface;

class Observer implements ObserverInterface
{
    protected $logger;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $info = $observer->getRequest()->getPathInfo();
        //$this->logger->addDebug($info);
        //var_dump($info);
        //die('aaaa');
    }
}