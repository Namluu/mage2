<?php 
namespace Tomluu\E541TrainingRepository\Model\ResourceModel\Example;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'example_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Tomluu\E541TrainingRepository\Model\Example', 
            'Tomluu\E541TrainingRepository\Model\ResourceModel\Example'
            );
    }

}
