<?php
namespace Bluecom\Faq\Block\Adminhtml;

class Cate extends \Magento\Backend\Block\Widget\Grid\Container {
  /**
  * @return void
  */

  protected function _construct(){
  	$this->_blockGroup = 'Bluecom_Cate';
  	$this->_controller = 'adminhtml_faq';
  	$this->_headerText = __('Faqs');
  	$this->_addButtonLabel = __('Add New Cate');
  	parent::_construct();
  }

}
?>