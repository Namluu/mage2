<?php

namespace TanDinh\Banner\Model\Resource\Banners;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {

        $this->_init('TanDinh\Banner\Model\Banners', 'TanDinh\Banner\Model\Resource\Banners');
    }
}
