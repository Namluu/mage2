<?php
namespace Bluecom\Faq\Model;

use Magento\Framework\Model\AbstractModel;
use Bluecom\Faq\Api\Data;
use Bluecom\Faq\Api\Data\FaqInterface;

class Faq extends AbstractModel implements FaqInterface
{
    const CACHE_TAG = 'bluecom_faq';
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    protected function _construct()
    {
        $this->_init('Bluecom\Faq\Model\ResourceModel\Faq');
    }
    
    /**
     * Retrieve faq id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::FAQ_ID);
    }
    /**
     * Retrieve faq id
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->getData(self::CATEGORY_ID);
    }

    /**
     * Retrieve faq question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->getData(self::QUESTION);
    }

    /**
     * Retrieve faq answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

     /**
     * Retrieve faq answer html
     *
     * @return string
     */
    public function getAnswerHtml()
    {
        return $this->getData(self::ANSWER_HTML);
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
     * @return FaqInterface
     */
    public function setId($id)
    {
        return $this->setData(self::FAQ_ID, $id);
    }
    
    public function setCategoryId($categoryid)
    {
        return $this->setData(self::CATEGORY_ID, $categoryid);
    }

    /**
     * Set question
     *
     * @param string $question
     * @return FaqInterface
     */
    public function setQuestion($question)
    {
        return $this->setData(self::QUESTION, $question);
    }

    /**
     * Set content
     *
     * @param string $content
     * @return FaqInterface
     */
    public function setAnswer($answer)
    {
        return $this->setData(self::ANSWER, $answer);
    }

	/**
     * Set answer html
     *
     * @param bool|int $isActive
     * @return FaqInterface
     */
    public function setAnswerHtml($answerhtml)
    {
        return $this->setData(self::ANSWER_HTML, $answerhtml);
    }

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return FaqInterface
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return FaqInterface
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * Set is active
     *
     * @param bool|int $isActive
     * @return FaqInterface
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
