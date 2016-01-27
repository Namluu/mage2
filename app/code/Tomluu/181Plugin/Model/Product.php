<?php
namespace Tomluu\181Plugin\Model;

class Product
{
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        /*if ($subject->getTypeId() == 'simple')
            return '|' . $result . '|';*/
        return 5;
    }
}