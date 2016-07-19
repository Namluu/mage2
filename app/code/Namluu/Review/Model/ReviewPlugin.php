<?php

namespace Namluu\Review\Model;

class ReviewPlugin
{
    /**
     * Validate review summary fields
     *
     * @return array|bool|\string[]
     */
    public function afterValidate(\Magento\Review\Model\Review $review, $result)
    {
        if ($result === true) {
            $result = [];
        }

        /*$validator = new \Zend\Validator\Regex(array('pattern' => '/^[a-zA-Z0-9]*-[-a-zA-Z0-9]*$/'));

        if ($validator->isValid($this->getNickname())) {
            $errors[] = __('Nickname should not contain dashes');
        }*/
        if (\Zend_Validate::is($review->getNickname(), 'Regex', array('pattern' => '/-/'))) {
            $result[] = __('Nickname should not contain dashes.');
        }

        if (empty($result)) {
            return true;
        }
        return $result;
    }
}