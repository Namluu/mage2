<?php
namespace Bluecom\Faq\Model\Faq\Source;

class CategoryList implements \Magento\Framework\Data\OptionSourceInterface
{
   
    protected $cate;

    public function __construct(\Bluecom\Faq\Model\ResourceModel\Cate\Collection $cateCollection)
    {
        $this->cate = $cateCollection;
    }

    public function toOptionArray()
    {
        return $this->cate->toOptionsCategoryList();
    }
}