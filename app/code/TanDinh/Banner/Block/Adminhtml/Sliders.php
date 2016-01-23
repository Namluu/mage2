<?php

namespace TanDinh\Banner\Block\Adminhtml;

class Sliders extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'sliders';
        $this->_headerText = __('Sliders');
        $this->_addButtonLabel = __('Add New Sliders');
        parent::_construct();
    }
}
