<?php
namespace Tomluu\E385RenderController\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\Page as ResultPage;

class Index extends Action
{

    protected $resultPage;

    public function __construct(Context $context, ResultPage $resultPage)
    {
        $this->resultPage = $resultPage;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->resultPage->initLayout();
        return $this->resultPage;
    }
}