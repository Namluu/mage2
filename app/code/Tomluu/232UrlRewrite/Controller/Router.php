<?php
namespace Tomluu\232UrlRewrite\Controller;

class Router implements \Magento\Framework\App\RouterInterface
{
    public function __construct(\Magento\Framework\App\ActionFactory $actionFactory) 
    { 
        $this->actionFactory = $actionFactory;
    } 

    public function match(\Magento\Framework\App\RequestInterface $request) {
        $info = $request->getPathInfo();
        $m = explode('-', $info);var_dump($m);
        //if (preg_match("%^/(test)-(.*?)-(.*?)$%", $info, $m)) {
            $request->setPathInfo(sprintf("/%s/%s/%s", $m[0], $m[1], $m[2]));
            return $this->actionFactory->create('Magento\Framework\App\Action\Forward', ['request' => $request]);
        //} 
        return null;
    } 
}