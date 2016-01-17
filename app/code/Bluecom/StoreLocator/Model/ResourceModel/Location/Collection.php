<?php 
namespace Bluecom\StoreLocator\Model\ResourceModel\Location;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'location_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Bluecom\StoreLocator\Model\Location', 'Bluecom\StoreLocator\Model\ResourceModel\Location');
    }

}
