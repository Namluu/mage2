<?php
namespace Tomluu\E181Plugin\Model;

class TestProduct extends \Magento\Catalog\Model\Product
{
    public function getPrice() {
        return 3;
    } 
}