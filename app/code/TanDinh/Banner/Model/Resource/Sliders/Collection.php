<?php

namespace TanDinh\Banner\Model\Resource\Sliders;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('TanDinh\Banner\Model\Sliders', 'TanDinh\Banner\Model\Resource\Sliders');
    }

}
