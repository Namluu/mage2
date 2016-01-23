<?php

namespace TanDinh\Banner\Block\Adminhtml\Sliders\Widget\Grid;
use Magento\Store\Model\Store;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{

    protected $_sliderFactory;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \TanDinh\Banner\Model\Sliders $sliderFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \TanDinh\Banner\Model\Sliders $sliderFactory,
        array $data = []
    )
    {
        $this->_sliderFactory = $sliderFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('slidersGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setVarNameFilter('tandinh_banner_filter');
    }


    /**
     * @return $this
     */
    protected function _prepareCollection()
    {
        parent::_prepareCollection();
        $collection = $this->_sliderFactory->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }


    /**
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'id',
            [
                'header' => __('ID'),
                'type' => 'number',
                'index' => 'id',
                'column_css_class' => 'col-id'
            ]
        );


        $this->addColumn(
            'image',
            [
                'header' => __('Image'),
                'index' => 'image',
                'class' => 'image',
                'filter' => false,
                'sortable' => false,
                'renderer' => 'TanDinh\Banner\Block\Adminhtml\Sliders\Widget\Grid\Renderer\Image'
            ]
        );

        $this->addColumn(
            'title',
            [
                'header' => __('Title'),
                'index' => 'title',
                'class' => 'title'
            ]
        );

        $this->addColumn(
            'banner',
            [
                'header' => __('Banner'),
                'index' => 'banner',
                'class' => 'banner',
                'filter' => false,
                'renderer' => 'TanDinh\Banner\Block\Adminhtml\Sliders\Widget\Grid\Renderer\Banner'
            ]
        );


        $this->addColumn(
            'status',
            [
                'header' => __('Status'),
                'index' => 'status',
                'type' => 'options',
                'options' => $this->getOptionArray()
            ]
        );

        $this->addColumn(
            'edit',
            [
                'header' => __('Edit'),
                'type' => 'action',
                'getter' => 'getId',
                'actions' => [
                    [
                        'caption' => __('Edit'),
                        'url' => [
                            'base' => '*/*/edit'
                        ],
                        'field' => 'id'
                    ]
                ],
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action'
            ]
        );


        return parent::_prepareColumns();
    }

    /**
     * Retrieve option array
     *
     * @return string[]
     */
    public static function getOptionArray()
    {
        return [1 => __('Enabled'), 0 => __('Disabled')];
    }

    /**
     * Add store filter
     *
     * @param \Magento\Backend\Block\Widget\Grid\Column $column
     * @return $this
     */
    protected function _addColumnFilterToCollection($column)
    {
        parent::_addColumnFilterToCollection($column);
        return $this;
    }
}
