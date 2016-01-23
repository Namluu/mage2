<?php

namespace TanDinh\Banner\Block\Adminhtml\Sliders\Widget\Grid\Renderer;

use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;

class Banner extends AbstractRenderer
{

    protected $_bannerModel;

    public function __construct(\Magento\Backend\Block\Context $context, \TanDinh\Banner\Model\Banners $bannerModel, array $data = [])
    {
        $this->_bannerModel = $bannerModel;
        parent::__construct($context, $data);
        $this->_authorization = $context->getAuthorization();
    }


    /**
     * @param \Magento\Framework\DataObject $row
     * @return string
     */
    public function render(\Magento\Framework\DataObject $row)
    {
        return $this->_bannerModel->load($this->_getValue($row))->getData('title');
    }
}