<?php

namespace TanDinh\Banner\Block\Adminhtml\Sliders\Widget\Grid\Renderer;
use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;

class Image extends AbstractRenderer
{

    /**
     * @param \Magento\Framework\DataObject $row
     * @return string
     */
    public function render(\Magento\Framework\DataObject $row)
    {
        $imageUrl = '/pub/media/'.$this->_getValue($row);
        return '<img src="'.$imageUrl.'" height="70"/>';
    }
}