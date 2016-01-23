<?php
namespace TanDinh\Banner\Model\Resource;

class Sliders extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Model Initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('tandinh_banner_items', 'id');
    }
}
