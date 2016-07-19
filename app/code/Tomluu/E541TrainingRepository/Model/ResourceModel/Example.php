<?php
namespace Tomluu\E541TrainingRepository\Model\ResourceModel;

class Example extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('training_repository_example', 'example_id');
    }
}
