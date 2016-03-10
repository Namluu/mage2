<?php
namespace Bluecom\Faq\Model;

use Magento\Framework\Model\AbstractModel;
use Bluecom\Faq\Api\Data;
use Bluecom\Faq\Api\Data\FaqCateInterface;

class Cate extends AbstractModel implements FaqCateInterface
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    protected function _construct()
    {
        $this->_init('Bluecom\Faq\Model\ResourceModel\Cate');
    }
    
    /**
     * Retrieve category id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::CATEGORY_ID);
    }

    /**
     * Retrieve category naem
     *
     * @return string
     */
    public function getCategoryName()
    {
        return $this->getData(self::CATEGORY_NAME);
    }

    /**
     * Retrieve faq creation time
     *
     * @return string
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * Retrieve faq update time
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Retrieve order category
     *
     * @return string
     */
    public function getOrderCate()
    {
        return $this->getData(self::ORDER_CATE);
    }

    /**
     * Is active
     *
     * @return bool
     */
    public function isActive()
    {
        return (bool)$this->getData(self::IS_ACTIVE);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return CateInterface
     */
    public function setId($id)
    {
        return $this->setData(self::CATEGORY_ID, $id);
    }

    /**
     * Set category name
     *
     * @param string $categoryname
     * @return CateInterface
     */
    public function setCategoryName($categoryname)
    {
        return $this->setData(self::CATEGORY_NAME, $categoryname);
    }

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return CateInterface
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return CateInterface
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }
    
    /**
     * Set order Category
     *
     * @param int $orderCate
     * @return CateInterface
     */
    public function setOrderCate($orderCate)
    {
        return $this->setData(self::ORDER_CATE, $orderCate);
    }


    /**
     * Set is active
     *
     * @param bool|int $isActive
     * @return CateInterface
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }

    /**
     * Receive page store ids
     *
     * @return int[]
     */
    public function getStores()
    {
        return $this->hasData('stores') ? $this->getData('stores') : $this->getData('store_id');
    }

}
