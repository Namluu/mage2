<?php

namespace TanDinh\Banner\Model;

class Sliders extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('TanDinh\Banner\Model\Resource\Sliders');
    }
}
