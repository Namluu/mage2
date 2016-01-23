<?php
namespace TanDinh\Banner\Model\Widget;

class Banners extends \TanDinh\Banner\Model\Banners implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];
        $items = $this->getCollection()->addFieldToFilter('status', array('eq' => '1'))->getData();
        foreach($items as $item){
            $options[] = ['value' => $item['id'], 'label' => __($item['title'])];
        }
        return $options;
    }
}