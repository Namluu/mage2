<?php

namespace TanDinh\Banner\Block\Adminhtml\Sliders\Edit\Tab;


use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;


class Main extends Generic implements TabInterface
{

    protected $_formFactory;
    protected $_coreRegistry;
    protected $_bannerModel;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \TanDinh\Banner\Model\Banners $bannerModel,
        array $data = []
    )
    {
        $this->_coreRegistry = $registry;
        $this->_formFactory = $formFactory;
        $this->_bannerModel = $bannerModel;
        parent::__construct($context, $registry, $formFactory, $data);
    }


    /**
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Slider Information');
    }

    /**
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Slider Information');
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
        $model = $this->_coreRegistry->registry('current_tandinh_banner_slider');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('item_');
        $fieldSet = $form->addFieldset('base_fieldset', ['legend' => __('Slider Information')]);


        if ($model->getId()) {
            $fieldSet->addField('id', 'hidden', ['name' => 'id']);
        }
        $fieldSet->addField(
            'title',
            'text',
            ['name' => 'title', 'label' => __('Title'), 'title' => __('Title'), 'required' => true]
        );

        $fieldSet->addField(
            'image',
            'image',
            [
                'name' => 'image',
                'label' => __('Image field Label'),
                'title' => __('Image field Label'),

            ]
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


        $options = $this->getBannersOption();

        $fieldSet->addField(
            'banner',
            'select',
            [
                'label' => __('Banner'),
                'title' => __('Banner'),
                'name' => 'banner',
                'required' => true,
                'options' => $options
            ]
        );

        if (!$model->getBanner()) {
            $model->setData('banner', '1');
        }


        $fieldSet->addField(
            'url',
            'text',
            ['name' => 'url', 'label' => __('Url'), 'title' => __('Url'), 'required' => true]
        );

        $fieldSet->addField(
            'alt',
            'text',
            ['name' => 'alt', 'label' => __('Alt'), 'title' => __('Alt'), 'required' => false]
        );


        $dateFormat = $this->_localeDate->getDateFormat(
            \IntlDateFormatter::SHORT
        );

        $fieldSet->addField(
            'start_date',
            'date',
            [
                'name' => 'start_date',
                'label' => __('Start Date'),
                'date_format' => $dateFormat,
                'title' => __('Start Date'),
                'required' => false
            ]
        );
        $fieldSet->addField(
            'end_date',
            'date',
            ['name' => 'end_date',
                'label' => __('End Date'),
                'title' => __('End Date'),
                'date_format' => $dateFormat,
                'required' => false,
                'class' => 'validate-date validate-date-range date-range-custom_theme-from']
        );


        $form->setValues($model->getData());

        $this->setForm($form);
        return parent::_prepareForm();
    }

    /**
     * Get Banners Option
     *
     * @return array
     */
    protected function getBannersOption()
    {
        $options = [];
        $items = $this->_bannerModel->getCollection()->getData();
        foreach ($items as $item) {
            $options[$item['id']] = $item['title'];
        }
        return $options;

    }
}
