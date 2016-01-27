<?php
namespace Tomluu\233NotFound\Controller;

class NoRouteHandler implements \Magento\Framework\App\Router\NoRouteHandlerInterface
{
    /**
     * Check and process no route request
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return bool
     */
    public function process(\Magento\Framework\App\RequestInterface $request)
    {

        $moduleName = 'cms';
        $controllerName = 'index';
        $actionName = 'index';

        $request
        ->setModuleName($moduleName)
        ->setControllerName($controllerName)
        ->setActionName($actionName);
        
        return true;
    }
}