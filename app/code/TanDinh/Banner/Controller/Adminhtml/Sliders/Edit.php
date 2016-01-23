<?php
namespace TanDinh\Banner\Controller\Adminhtml\Sliders;

class Edit extends \TanDinh\Banner\Controller\Adminhtml\Banners
{

    public function execute()
    {

        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create('TanDinh\Banner\Model\Sliders');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
                $this->_redirect('tandinh_banner/*');
                return;
            }
        }

        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getPageData(true);

        if (!empty($data)) {
            $model->addData($data);
        }

        $this->_coreRegistry->register('current_tandinh_banner_slider', $model);
        $this->_initAction();
        $this->_view->getLayout()->getBlock('banner_sliders_edit');
        $this->_view->renderLayout();
    }
}
