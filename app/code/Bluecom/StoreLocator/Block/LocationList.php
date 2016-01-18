<?php
namespace Bluecom\StoreLocator\Block;

use Bluecom\StoreLocator\Api\Data\LocationInterface;
use Bluecom\StoreLocator\Model\ResourceModel\Location\Collection as LocationCollection;

class LocationList extends \Magento\Framework\View\Element\Template implements
    \Magento\Framework\DataObject\IdentityInterface
{
    protected $_locationCollectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Bluecom\StoreLocator\Model\ResourceModel\Location\CollectionFactory $locationCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_locationCollectionFactory = $locationCollectionFactory;
    }

    public function getLocations()
    {
        if (!$this->hasData('locations')) {
            $locations = $this->_locationCollectionFactory
                ->create()
                ->addFilter('is_active', 1)
                ->addOrder(
                    LocationInterface::CREATION_TIME,
                    LocationCollection::SORT_ORDER_DESC
                );
            $this->setData('locations', $locations);
        }
        return $this->getData('locations');
    }

    public function getIdentities()
    {
        return [\Bluecom\StoreLocator\Model\Location::CACHE_TAG . '_' . 'list'];
    }
}