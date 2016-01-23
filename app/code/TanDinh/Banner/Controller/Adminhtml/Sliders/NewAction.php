<?php
namespace TanDinh\Banner\Controller\Adminhtml\Sliders;

class NewAction extends \TanDinh\Banner\Controller\Adminhtml\Banners
{

    /**
     * executews
     */
    public function execute()
    {
        $this->_forward('edit');
    }
}
