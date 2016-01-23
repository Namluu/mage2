<?php

namespace TanDinh\Banner\Block\Adminhtml;

class Banners extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'banners';
        $this->_headerText = __('Banners');
        $this->_addButtonLabel = __('Add New Banners');
        parent::_construct();
    }
}
