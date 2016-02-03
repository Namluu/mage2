<?php

namespace Bluecom\PriceCountDown\Model\System\Config\Source;

class ColorBlockOption implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 'white', 'label' => __('white')),
            array('value' => 'red', 'label' => __('red')),
            array('value' => 'yellow', 'label' => __('yellow')),
            array('value' => 'blue', 'label' => __('blue')),
            array('value' => 'gray', 'label' => __('gray')),
        );
    }
}