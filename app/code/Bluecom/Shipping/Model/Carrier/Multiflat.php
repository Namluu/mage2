<?php
namespace Bluecom\Shipping\Model\Carrier;
use Magento\Quote\Model\Quote\Address\RateRequest;

/**
 * Multiflat shipping model
 */
class Multiflat extends \Magento\Shipping\Model\Carrier\AbstractCarrier implements
    \Magento\Shipping\Model\Carrier\CarrierInterface
{
    /**
     * @var string
     */
    protected $_code = 'msmultiflat';
    /**
     * @var \Magento\Shipping\Model\Rate\ResultFactory
     */
    protected $_rateResultFactory;
    /**
     * @var \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory
     */
    protected $_rateMethodFactory;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory
     * @param \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory,
        \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory,
        array $data = []
    ) {
        $this->_rateResultFactory = $rateResultFactory;
        $this->_rateMethodFactory = $rateMethodFactory;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }

    /**
     * @param RateRequest $request
     * @return \Magento\Shipping\Model\Rate\Result
     */
    public function collectRates(RateRequest $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }
        /** @var Result $result */
        $result = $this->_rateResultFactory->create();
		$packageValue = $request->getBaseCurrency()->convert($request->getPackageValue(), $request->getPackageCurrency());
        for($i = 0; $i <= 5; $i++)
        {
            if ($this->getConfigData('type'.$i) == 'O') { // per order
                $shippingPrice = $this->getConfigData('price'.$i);
            } elseif ($this->getConfigData('type'.$i) == 'I') { // per item
                $shippingPrice = ($request->getPackageQty() * $this->getConfigData('price'.$i)) - ($this->getFreeBoxes() * $this->getConfigData('price'.$i));
            } else {
                $shippingPrice = $this->getConfigData('price'.$i);
            }
		
			$shippingName = $this->getConfigData('name'.$i);
            if($shippingName != "" && ($packageValue >= $this->getConfigData('min_shipping'.$i) && $packageValue <= $this->getConfigData('max_shipping'.$i)) or $shippingName != "" && $this->getConfigData('max_shipping'.$i) == "")
            {
                /** @var \Magento\Quote\Model\Quote\Address\RateResult\Method $method */
                $method = $this->_rateMethodFactory->create();
                $method->setCarrier('msmultiflat');
                $method->setCarrierTitle($this->getConfigData('title'));
                $method->setMethod($this->getConfigData('name'.$i)); 
                $method->setMethodTitle($this->getConfigData('name'.$i));
				$method->setMethodDetails($this->getConfigData('details'.$i));
				$method->setMethodDescription($this->getConfigData('details'.$i));
                $method->setPrice($shippingPrice);
                $method->setCost($shippingPrice);
                $result->append($method);
            }
        }
        return $result; 
    }

    /**
     * @return array
     */
    public function getAllowedMethods()
    {
        return ['msmultiflat' => $this->getConfigData('name')];
    }
}