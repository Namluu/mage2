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
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
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
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->getData(self::URL);
    }

    /**
     * Get email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Get phone
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->getData(self::PHONE);
    }

    /**
     * Get note
     *
     * @return string|null
     */
    public function getNote()
    {
        return $this->getData(self::NOTE);
    }

    /**
     * Get longitude
     *
     * @return string|null
     */
    public function getLongitude()
    {
        return $this->getData(self::LONGITUDE);
    }

    /**
     * Get latitude
     *
     * @return string|null
     */
    public function getLatitude()
    {
        return $this->getData(self::LATITUDE);
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
     * Set url
     *
     * @param string $url
     * @return \Bluecom\StoreLocator\Api\Data\LocationInterface
     */
    public function setUrl($url)
    {
        return $this->setData(self::URL, $url);
    }

    /**
     * Set title
     *
     * @param string $title
     * @return \Bluecom\StoreLocator\Api\Data\LocationInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Set content
     *
     * @param string $content
     * @return \Bluecom\StoreLocator\Api\Data\LocationInterface
     */
    public function setNote($content)
    {
        return $this->setData(self::NOTE, $content);
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

    /**
     * Set is active
     *
     * @param int|bool $isActive
     * @return \Bluecom\StoreLocator\Api\Data\LocationInterface
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

}