<?php 
namespace Bluecom\StoreLocator\Model;

use Bluecom\StoreLocator\Api\Data\LocationInterface;
use Magento\Framework\DataObject\IdentityInterface;

class Location extends \Magento\Framework\Model\AbstractModel implements LocationInterface, IdentityInterface
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    const CACHE_TAG = 'location';

    protected $_cacheTag = 'location';

    protected $_eventPrefix = 'location';

    protected function _construct()
    {
        $this->_init('Bluecom\StoreLocator\Model\ResourceModel\Location');
    }

    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::LOCATION_ID);
    }

    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive()
    {
        return (bool) $this->getData(self::IS_ACTIVE);
    }

    /**
     * Set creation time
     *
     * @param string $creation_time
     * @return \Bluecom\StoreLocator\Api\Data\LocationInterface
     */
    public function setCreationTime($creation_time)
    {
        return $this->setData(self::CREATION_TIME, $creation_time);
    }

    /**
     * Set update time
     *
     * @param string $update_time
     * @return \Bluecom\StoreLocator\Api\Data\LocationInterface
     */
    public function setUpdateTime($update_time)
    {
        return $this->setData(self::UPDATE_TIME, $update_time);
    }

}