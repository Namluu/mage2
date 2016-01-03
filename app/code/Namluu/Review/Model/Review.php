<?php

namespace Namluu\Review\Model;

class Review extends \Magento\Review\Model\Review
{
    /**
     * Validate review summary fields
     *
     * @return array|bool|\string[]
     */
    public function validate()
    {
        $errors = [];

        /*$validator = new \Zend\Validator\Regex(array('pattern' => '/^[a-zA-Z0-9]*-[-a-zA-Z0-9]*$/'));

        if ($validator->isValid($this->getNickname())) {
            $errors[] = __('Nickname should not contain dashes');
        }*/
        if (\Zend_Validate::is($this->getNickname(), 'Regex', array('pattern' => '/-/'))) {
            $errors[] = __('Nickname should not contain dashes');
        }

        if (!empty($errors)) {
            return $errors;
        }

        return parent::validate();
    }
}