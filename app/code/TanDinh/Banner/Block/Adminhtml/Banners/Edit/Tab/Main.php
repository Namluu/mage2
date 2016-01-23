<?php

namespace TanDinh\Banner\Block\Adminhtml\Banners\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Main extends Generic implements TabInterface
{

    /**
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Banner Information');
    }

    /**
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Banner Information');
    }

    /**
     * @return bool
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * _prepareForm
     */
    protected function _prepareForm()
    {

        $model = $this->_coreRegistry->registry('current_tandinh_banner_banners');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('item_');
        $fieldSet = $form->addFieldset('base_fieldset', ['legend' => __('Banner Information')]);
        if ($model->getId()) {
            $fieldSet->addField('id', 'hidden', ['name' => 'id']);
        }
        $fieldSet->addField(
            'title',
            'text',
            ['name' => 'title', 'label' => __('Title'), 'title' => __('Title'), 'required' => true]
        );

        $fieldSet->addField(
            'status',
            'select',
            [
                'label' => __('Status'),
                'title' => __('Status'),
                'name' => 'status',
                'required' => true,
                'options' => ['1' => __('Enabled'), '0' => __('Disabled')]
            ]
        );
        if (!$model->getStatus()) {
            $model->setData('status', '1');
        }
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
