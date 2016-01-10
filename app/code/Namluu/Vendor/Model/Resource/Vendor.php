<?php
namespace Namluu\Vendor\Model\Resource;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Vendor extends AbstractDb
{
    protected function _construct()
    {
        $this->_init(
            'training4_vendor',
            'vendor_id'
        );
    }

    public function getAssignedProductIds($vendorId)
    {
        if (!$vendorId) {
            return [];
        }

        $select = $this->getReadConnection()->select()
            ->from($this->getTable('training4_vendor2product'), ['product_id'])
            ->where('vendor_id = ?', $vendorId);

        return $this->getReadConnection()->fetchCol($select);
    }
}
