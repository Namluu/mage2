<?php

namespace TanDinh\Banner\Block;

use Magento\Framework\View\Element\Template\Context;

class Sliders extends \Magento\Framework\View\Element\Template
{

    protected $_data;
    protected $_slidersModel;

    /**
     * @param Context $context
     * @param array $data
     */
    public function __construct(Context $context, \TanDinh\Banner\Model\Sliders $slidersModel,  array $data = [])
    {
        $this->_slidersModel = $slidersModel;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getSlider()
    {
        $bannerId = $this->_data['banner_id'];
        $itemsCollection = $this->_slidersModel->getCollection()
            ->addFieldToFilter('banner', array('eq' => $bannerId))
            ->addFieldToFilter('status', array('eq' => 1));
        return $itemsCollection->getData();
    }

    /**
     * @param string $name
     * @return string
     */
    public function getImageSrc($name = ''){
        if($name != ''){
            return $this->getUrl('pub/media/', ['_secure' => $this->getRequest()->isSecure()]).$name;
        }else{
            /**
             * Get default image
             */
            return '';
        }
    }
}
