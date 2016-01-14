<?php
namespace Bluecom\StoreLocator\Model\Location\Source;

class IsActive implements \Magento\Framework\Data\OptionSourceInterface
{
    protected $post;

    /*public function __construct(\Bluecom\StoreLocator\Model\Location $post)
    {
        $this->post = $post;
    }*/

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        /*$availableOptions = $this->post->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }*/
        return $options;
    }
}