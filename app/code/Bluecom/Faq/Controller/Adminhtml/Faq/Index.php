<?php
namespace Bluecom\Faq\Controller\Adminhtml\Faq;

class Index extends \Magento\Backend\App\Action
{
  
  /**
  * @var \Magento\Framework\View\Result\PageFactory
  */
  protected $resultPageFactory;

  /**
  * @param \Magento\Backend\App\Action\Context $context
  * @param \Magento\Framework\Registry $coreRegistry
  * @param \Magento\Framework\view\Result\PageFactory $resultPageFactory
  * 
  */

  public function __construct(
  	\Magento\Backend\App\Action\Context $context,
  	\Magento\Framework\Registry $coreRegistry,
  	\Magento\Framework\View\Result\PageFactory $resultPageFactory
  ){
  	$this->resultPageFactory = $resultPageFactory;
  	parent::__construct($context,$coreRegistry);
  }

  /**
  * Index Action
  *
  * @return \Magento\Framework\Controller\ResultInterface
  */

  public function execute(){
  	/**
  	* @var \Magento\Backend\Model\View\Result\Page $resultPage
  	*/
  	$resultPage = $this->resultPageFactory->create();
    $resultPage->getConfig()->gettitle()->prepend(__('FAQS'));
  	return $resultPage;
  }

   /**
     * Is the user allowed to view the faq grid.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Bluecom_Faq::faq');
    }


}

?>