<?php

namespace Bluecom\PriceCountDown\Model\System\Config\Source;

class WidthBlockOptions implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => '1', 'label' => __('1')),
            array('value' => '0.75', 'label' => __('0.75')),
            array('value' => '0.5', 'label' => __('0.50')),
            array('value' => '0.45', 'label' => __('0.45')),
            array('value' => '0.25', 'label' => __('0.25')),
        );
    }
}