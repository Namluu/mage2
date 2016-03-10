<?php

namespace Bluecom\Faq\Api\Data;

/**
 * Bluecom Cate interface.
 * @api
 */
interface FaqCateInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const CATEGORY_ID     = 'category_id';
    const CATEGORY_NAME   = 'category_name';
    const CREATION_TIME   = 'creation_time';
    const UPDATE_TIME     = 'update_time';
    const ORDER_CATE      = 'order_cate';
    const IS_ACTIVE       = 'is_active';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get Question
     *
     * @return string|null
     */
    public function getCategoryName();

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
     * Get Order Cate
     *
     * @return int|null
     */
    public function getOrderCate();

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive();

    /**
     * Set ID
     *
     * @param int $id
     * @return FaqInterface
     */
    public function setId($id);

    /**
     * Set question
     *
     * @param string $question
     * @return FaqInterface
     */
    public function setCategoryName($categoryname);

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return FaqInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return FaqInterface
     */
    public function setUpdateTime($updateTime);

    /**
     * Set order Category
     *
     * @param int $ordercate
     * @return FaqInterface
     */
    public function setOrderCate($ordercate);
    /**
     * Set is active
     *
     * @param bool|int $isActive
     * @return FaqInterface
     */
    public function setIsActive($isActive);
}
