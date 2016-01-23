<?php

namespace TanDinh\Banner\Controller\Adminhtml\Sliders;

class Save extends \TanDinh\Banner\Controller\Adminhtml\Banners
{
    public function execute()
    {
        if ($this->getRequest()->getPostValue()) {
            try {
                $model = $this->_objectManager->create('\TanDinh\Banner\Model\Sliders');
                $data = $this->getRequest()->getPostValue();
                $inputFilter = new \Zend_Filter_Input(
                    [],
                    [],
                    $data
                );

                $data = $inputFilter->getUnescaped();

                $id = $this->getRequest()->getParam('id');
                if ($id) {
                    $model->load($id);
                    if ($id != $model->getId()) {
                        throw new \Magento\Framework\Exception\LocalizedException(__('The wrong slider is specified.'));
                    }
                }
                $model->setData($data);

                if (isset($data['image'])) {
                    $imageData = $data['image'];
                    unset($data['image']);
                } else {
                    $imageData = array();
                }

                $imageHelper = $this->_objectManager->get('TanDinh\Banner\Helper\Data');

                if (isset($imageData['delete']) && $model->getImage()) {
                    $imageHelper->removeImage($imageData['value']);
                    $model->setImage(null);
                } else {
                    $imageFile = $imageHelper->uploadImage('image');

                    if ($imageFile != false) {
                        $model->setImage($imageFile);
                    }else{
                        $model->setImage($imageData['value']);
                    }
                }


                $session = $this->_objectManager->get('Magento\Backend\Model\Session');
                $session->setPageData($model->getData());
                $model->save();

                $this->messageManager->addSuccess(__('You saved the slider.'));
                $session->setPageData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('tandinh_banner/sliders/edit', ['id' => $model->getId()]);
                    return;
                }
                $this->_redirect('tandinh_banner/sliders/');
                return;

            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
                $id = (int)$this->getRequest()->getParam('id');
                if (!empty($id)) {
                    $this->_redirect('tandinh_banner/*/edit', ['id' => $id]);
                } else {
                    $this->_redirect('tandinh_banner/*/new');
                }
                return;
            } catch (\Exception $e) {

                echo "<pre>";
                print_r($e);
                die;

                $this->messageManager->addError(
                    __('Something went wrong while saving the item data. Please review the error log.')
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_objectManager->get('Magento\Backend\Model\Session')->setPageData($data);
                $this->_redirect('tandinh_banner/*/edit', ['id' => $this->getRequest()->getParam('id')]);
                return;
            }
        }
        $this->_redirect('tandinh_banner/*/');
    }
}
