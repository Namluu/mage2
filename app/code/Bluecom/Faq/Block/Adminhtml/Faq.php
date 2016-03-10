<?php
namespace Bluecom\Faq\Block\Adminhtml;

class Faq extends \Magento\Backend\Block\Widget\Grid\Container {
  /**
  * @return void
  */

  protected function _construct(){
  	$this->_blockGroup = 'Bluecom_Faq';
  	$this->_controller = 'adminhtml_faq';
  	$this->_headerText = __('Faqs');
  	$this->_addButtonLabel = __('Add New Faq');
  	parent::_construct();
  }

}
?>