<?php
namespace Bluecom\Faq\Model\Faq\Source;

class IsActive implements \Magento\Framework\Data\OptionSourceInterface
{
   
    protected $faq;

    public function __construct(\Bluecom\Faq\Model\Faq $faq)
    {
        $this->faq = $faq;
    }

    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->faq->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}