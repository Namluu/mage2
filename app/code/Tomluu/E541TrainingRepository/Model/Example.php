<?php

namespace Tomluu\E541TrainingRepository\Model;

use Magento\Framework\Model\AbstractModel;
use Tomluu\E541TrainingRepository\Api\Data\ExampleInterface;

class Example extends AbstractModel implements ExampleInterface
{
    protected function _construct()
    {
        $this->_init('Tomluu\E541TrainingRepository\Model\ResourceModel\Example');
    }

    public function getName()
    {
        return $this->_getData('name');
    }

    public function setName($name)
    {
        $this->setData('name', $name);
    }

    public function getCreatedAt()
    {
        return $this->_getData('created_at');
    }

    public function setCreatedAt($name)
    {
        $this->setData('created_at', $name);
    }

    public function getModifiedAt()
    {
        return $this->_getData('updated_at');
    }

    public function setModifiedAt($name)
    {
        $this->setData('updated_at', $name);
    }
}