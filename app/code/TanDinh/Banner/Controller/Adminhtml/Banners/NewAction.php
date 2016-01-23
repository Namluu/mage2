<?php
namespace TanDinh\Banner\Controller\Adminhtml\Banners;

class NewAction extends \TanDinh\Banner\Controller\Adminhtml\Banners
{

    /**
     * execute
     */
    public function execute()
    {
        $this->_forward('edit');
    }
}
