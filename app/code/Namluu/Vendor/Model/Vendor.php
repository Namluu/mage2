<?php
namespace Namluu\Vendor\Model;

use Magento\Framework\Model\AbstractModel;
use Namluu\Vendor\Api\Data;

class Vendor extends AbstractModel implements \Namluu\Vendor\Api\Data\VendorInterface
{
    protected function _construct()
    {
        $this->_init('Namluu\Vendor\Model\Resource\Vendor');
    }

    public function getName()
    {
        return $this->_getData(self::NAME);
    }

    public function setName($name)
    {
        $this->setData(self::NAME, $name);
        return $this;
    }

    public function getAssignedProductIds($id = null)
    {
        if (is_null($id) && $this->getId()) {
            $id = $this->getId();
        }
        return $this->getResource()->getAssignedProductIds($id);
    }
}
