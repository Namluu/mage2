<?php
namespace Bluecom\StoreLocator\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class LocationActions extends Column
{
    const LOCATION_URL_PATH_VIEW = 'store/location/view';
    const LOCATION_URL_PATH_EDIT = 'store/location/edit';
    const LOCATION_URL_PATH_DELETE = 'store/location/delete';

    protected $urlBuilder;

    private $editUrl;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $editUrl = self::LOCATION_URL_PATH_EDIT
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['location_id'])) {
                    $item[$name]['view'] = [
                        'href' => $this->urlBuilder->getUrl(self::LOCATION_URL_PATH_VIEW, ['location_id' => $item['location_id']]),
                        'label' => __('View')
                    ];
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl($this->editUrl, ['location_id' => $item['location_id']]),
                        'label' => __('Edit')
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(self::LOCATION_URL_PATH_DELETE, ['location_id' => $item['location_id']]),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete "${ $.$data.title }"'),
                            'message' => __('Are you sure you wan\'t to delete a "${ $.$data.title }" record?')
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}