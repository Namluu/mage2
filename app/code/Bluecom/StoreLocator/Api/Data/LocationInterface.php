<?php
namespace Bluecom\StoreLocator\Api\Data;
interface LocationInterface
{
    const LOCATION_ID       = 'location_id';
    const TITLE             = 'title';
    const ADDRESS           = 'address';
    const URL               = 'url';
    const EMAIL             = 'email';
    const PHONE             = 'phone';
    const NOTE              = 'note';
    const LONGITUDE         = 'longitude';
    const LATITUDE          = 'latitude';
    const CREATION_TIME     = 'creation_time';
    const UPDATE_TIME       = 'update_time';
    const IS_ACTIVE         = 'is_active';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress();

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl();

    /**
     * Get email
     *
     * @return string|null
     */
    public function getEmail();

    /**
     * Get phone
     *
     * @return string|null
     */
    public function getPhone();

    /**
     * Get note
     *
     * @return string|null
     */
    public function getNote();

    /**
     * Get longitude
     *
     * @return string|null
     */
    public function getLongitude();

    /**
     * Get latitude
     *
     * @return string|null
     */
    public function getLatitude();

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime();

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive();

    /**
     * Set url
     *
     * @param string $url
     * @return \Bluecom\StoreLocator\Api\Data\LocationInterface
     */
    public function setUrl($url);

    /**
     * Set title
     *
     * @param string $title
     * @return \Bluecom\StoreLocator\Api\Data\LocationInterface
     */
    public function setTitle($title);

    /**
     * Set content
     *
     * @param string $content
     * @return \Bluecom\StoreLocator\Api\Data\LocationInterface
     */
    public function setNote($content);

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return \Bluecom\StoreLocator\Api\Data\LocationInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return \Bluecom\StoreLocator\Api\Data\LocationInterface
     */
    public function setUpdateTime($updateTime);

    /**
     * Set is active
     *
     * @param int|bool $isActive
     * @return \Bluecom\StoreLocator\Api\Data\LocationInterface
     */
    public function setIsActive($isActive);

}