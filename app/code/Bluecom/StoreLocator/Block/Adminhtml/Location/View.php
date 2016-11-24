<?php
namespace Bluecom\StoreLocator\Block\Adminhtml\Location;

class View extends \Magento\Backend\Block\Template
{
    private $_extensibleDataObjectConverter;
    /**
     * @return void
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Api\ExtensibleDataObjectConverter $extensibleDataObjectConverter,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Locale\FormatInterface $localeFormat,
        \Magento\Customer\Model\AddressRegistry $addressRegistry,
        \Magento\Customer\Model\ResourceModel\Address\CollectionFactory $customerAddressCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->pageConfig->getTitle()->set(__('Subscription View'));
        $this->_extensibleDataObjectConverter = $extensibleDataObjectConverter;
        $this->_registry = $registry;
        $this->_localeFormat = $localeFormat;
        $this->_addressRegistry = $addressRegistry;
        $this->customerAddressCollectionFactory = $customerAddressCollectionFactory;
    }

    public function getSubscriptionConfig()
    {
        $flatBillingAddress = [];
        $billingAddress = $this->getBillingAddressCustomer();
        if($billingAddress && $billingAddress->getId()){
            $flatBillingAddress = $this->_extensibleDataObjectConverter->toNestedArray(
                $billingAddress->getDataModel(),
                [],
                '\Magento\Customer\Api\Data\AddressInterface'
            );
            $flatBillingAddress["inline_address"] = $this->getBillingAddressText($billingAddress);
        }

        $returnedData = [
            'profileData' => [
                'name' => 'Nam Luu',
                'status' => 1,
                'selected_payment' => 'paygent',
                'frequency_unit' => 'month',
                'frequency_interval' => 1
            ],
            'frequency_options' => [
                1 => '1 week',
                2 => '1 month',
                3 => '1 year'
            ],
            'payment_method' => [
                ['value' => 'cod', 'label' => 'Charge on delivery', 'params' => ['price' => 35]],
                ['value' => 'paygent', 'label' => 'Paygent credit card', 'params' => ['price' => 10]]
            ],
            'price_format' => $this->_localeFormat->getPriceFormat(null, 'JPY'),
            'has_billing_address' => true,
            'billing_information' => $flatBillingAddress,
            'delivery_info' => [
                4 => [
                    'cool' => [
                        'name' => 'Cool',
                        'info' => [
                            'name' => 'abc'
                        ],
                        'product' => [
                            [
                                'name' => 'Product 1'
                            ]
                        ]
                    ]
                ],
                6 => [
                    'warm' => [
                        'name' => 'Warm',
                        'info' => [
                            'name' => 'def'
                        ],
                        'product' => [
                            [
                                'name' => 'Product 2'
                            ]
                        ]
                    ]
                ]
            ],
            'addresses_data' => $this->getAllAddress(),
            'order_data' => [
                'grand_total' => 1010,
                'payment_fee' => 10
            ]
        ];

        $returnedData['profileData']['selected_frequency'] = $this->getIdFrequency(
            $returnedData['frequency_options'],
            $returnedData['profileData']['frequency_interval'],
            $returnedData['profileData']['frequency_unit']
        );

        return \Zend_Json::encode($returnedData);
    }

    public function getIdFrequency($frequencies, $interval, $unit)
    {
        $result = 0;
        foreach ($frequencies as $key => $value) {
            $option = explode(' ', $value);
            if ($option[0] == $interval && $option[1] == $unit) {
                $result = $key;
            }
        }
        return $result;
    }

    public function getLocationConfig()
    {
        $nestedArray = [];
        $location = $this->_registry->registry('store_location');
        /*if(\Zend_Validate::is( $location->getId() , 'NotEmpty')){
            $nestedArray = $this->_extensibleDataObjectConverter->toNestedArray(
                $location,
                [],
                '\Bluecom\StoreLocator\Api\Data\LocationInterface'
            );
        }*/
        $returnedData = ['locationData' =>  $location->getData()];

        return \Zend_Json::encode($returnedData);
    }

    public function getBillingAddressCustomer()
    {
        $addressId = 1;
        $address = $this->_addressRegistry->retrieve($addressId);
        if ($address->getId()) {
            return $address;
        }

        return false;
    }

    public function getBillingAddressText($address)
    {
        $customer = $address->getCustomer();
        $data = [
            $customer->getEmail(),
            $address->getPostcode(),
            $address->getRegion(),
            $address->getCity(),
            $address->getStreetFull(),
            $address->getTelephone()
        ];
        return implode('<br>', $data);
    }

    public function getAllAddress()
    {
        // Get all Address of current customer
        $customerId = 1;
        $objCollection = $this->customerAddressCollectionFactory->create()->addAttributeToFilter("parent_id", $customerId);
        $objCollection->load();
        $arrReturn = [];
        foreach($objCollection as $objAddress) {
            $arrAddr = [
                $objAddress->getStreetLine(1),
                $objAddress->getCity(),
                $objAddress->getPostcode(),
                $objAddress->getRegion(),
                $objAddress->getRegionId(),
            ];
            $arrReturn[] = array(
                "name" => $objAddress->getStreetLine(1),
                "address_data" => implode(", ", $arrAddr),
                "address_id" => $objAddress->getId()
            );
        }
        return $arrReturn;
    }

    public function getAddressNameByAddressId($addressId){
        $customerAddress = $this->customerAddress->create()->load($addressId);
        $rikiNickName = $customerAddress->getCustomAttribute('riki_nickname');
        if($rikiNickName){
            return $rikiNickName->getValue();
        }
        return null;
    }
}