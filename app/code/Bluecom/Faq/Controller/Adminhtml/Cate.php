<?php
namespace Bluecom\Faq\Controller\Adminhtml;

abstract class Cate extends \Magento\Backend\App\Action {
	
	protected $_coreRegistry = null;

	public function __construct( 
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\Registry $registry
	) {
		$this->_coreRegistry = $registry;
		parent::__construct($context);
	}

	public function initPage($resultPage){
		$resultPage->setActiveMenu('Bluecom_Faq::cate');
        return $resultPage;
	}

	 /**
     * Check the permission to run it
     *
     * @return boolean
     */
	public function _isAllowed(){
		return $this->_authorization->isAllowed('Bluecom_Faq::cate');
	}



}
?>