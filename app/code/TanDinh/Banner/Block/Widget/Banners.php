<?php
namespace TanDinh\Banner\Block\Widget;

use Magento\Framework\View\Element\Template\Context;

class Banners extends \Magento\Framework\View\Element\Template implements \Magento\Widget\Block\BlockInterface
{


    protected $_data;
    protected $_slidersModel;

    /**
     * @param Context $context
     * @param array $data
     */
    public function __construct(Context $context, \TanDinh\Banner\Model\Sliders $slidersModel, array $data = [])
    {
        $this->_data = $data;
        $this->_slidersModel = $slidersModel;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function _toHtml()
    {
        $this->setTemplate('widget/banner.phtml');
        return parent::_toHtml();
    }

    /**
     * @param $bannerId
     * @return mixed
     */
    public function getSlider($bannerId)
    {
        $itemsCollection = $this->_slidersModel->getCollection()
            ->addFieldToFilter('banner', array('eq' => $bannerId))
            ->addFieldToFilter('status', array('eq' => 1));
            //->addAttributeToFilter('end_date', array('gteq' =>$todate))
            //->addAttributeToFilter('start_date', array('lteq' => $todate));
        return $itemsCollection->getData();
    }

    /**
     * @param string $name
     * @return string
     */
    public function getImageSrc($name = '')
    {
        if ($name != '') {
            return $this->getUrl('pub/media/', ['_secure' => $this->getRequest()->isSecure()]) . $name;
        } else {
            /**
             * Get default image
             */
            return '';
        }
    }
}