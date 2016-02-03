<?php

namespace Bluecom\StoreLocator\Model\System\Config\Source;

class MapZoomOptions implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        $data = [];
        for($i = 8; $i<=20; $i++) {
            $data[] = ['value' => $i, 'label' => $i];
        }
        return $data;
    }
}