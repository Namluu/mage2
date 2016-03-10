<?php
namespace Bluecom\Faq\Helper;

class Faq extends \Magento\Framework\App\Helper\AbstractHelper {
	
	const XML_PATH_ENABLE_FAQ = 'faq/default/enable_faq';
	const XML_PATH_NUMBER_QUESTION_FAQ = 'faq/default/faq_number_page';

	protected $_scopeConfig;

	public function __construct(
		\Magento\Framework\App\Helper\Context $context,
		\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
	){
      parent::__construct($context);
      $this->_scopeConfig = $scopeConfig;
	}

	public function getNumberQuestion(){
		return $this->_scopeConfig->getValue(self::XML_PATH_NUMBER_QUESTION_FAQ);
	}

}