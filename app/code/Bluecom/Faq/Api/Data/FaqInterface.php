<?php

namespace Bluecom\Faq\Api\Data;

/**
 * Bluecom Faq interface.
 * @api
 */
interface FaqInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const FAQ_ID        = 'faq_id';
    const QUESTION      = 'question';
    const CATEGORY_ID   = 'category_id';
    const ANSWER        = 'answer';
    const ANSWER_HTML   = 'answer_html';
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME   = 'update_time';
    const IS_ACTIVE     = 'is_active';
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
    public function getQuestion();

    /**
     * Get Answer
     *
     * @return string|null
     */
    public function getAnswer();
    
    /**
     * answer Html
     *
     * @return bool|null
     */
    public function getAnswerHtml();
    
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
     * Get Category Id
     *
     * @return int|null
     */
    public function getCategoryId();
    
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
    public function setQuestion($question);
    
    public function setCategoryId($categoryId);
    /**
     * Set answer
     *
     * @param string $answer
     * @return FaqInterface
     */
    public function setAnswer($answer);

    /**
     * Set answer html
     *
     * @param string $answerhtml
     * @return FaqInterface
     */
    public function setAnswerHtml($answerhtml);

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
     * Set is active
     *
     * @param bool|int $isActive
     * @return FaqInterface
     */
    public function setIsActive($isActive);
}
