<?php
namespace Bluecom\StoreLocator\Model\Location\Source;

class IsActive implements \Magento\Framework\Data\OptionSourceInterface
{
    protected $location;

    public function __construct(\Bluecom\StoreLocator\Model\Location $location)
    {
        $this->_location = $location;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->_location->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}