<?php
namespace Tomluu\Logpathinfo\Model;

use Magento\Framework\Event\ObserverInterface;

class Observer implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $info = $observer->getRequest()->getPathInfo();
        //var_dump($info);
        //die('aaaa');
    }
}