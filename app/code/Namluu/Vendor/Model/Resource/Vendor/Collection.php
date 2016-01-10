<?php
namespace Namluu\Vendor\Model\Resource\Vendor;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Namluu\Vendor\Model\Vendor',
            'Namluu\Vendor\Model\Resource\Vendor'
        );
    }

    protected function _joinLinkTable()
    {
        if (!$this->getFlag('join_link_table')) {
            $this->getSelect()
                ->joinLeft(
                    ['v2p' => $this->getTable('training4_vendor2product')],
                    'v2p.vendor_id = main_table.vendor_id',
                    ['product_id']
                );

            $this->setFlag('join_link_table', true);
        }
        return $this;
    }

    public function setProductFilter($productId)
    {
        $this->_joinLinkTable();

        if (is_object($productId)) {
            $productId = $productId->getId();
        }

        $this->getSelect()->where('v2p.product_id = ?', $productId);
        return $this;
    }
}
