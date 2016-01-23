<?php

namespace TanDinh\Banner\Model\Resource;

class Banners extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Model Initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('tandinh_banner', 'id');
    }
}
