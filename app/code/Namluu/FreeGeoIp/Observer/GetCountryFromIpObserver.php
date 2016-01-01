<?php
namespace Namluu\FreeGeoIp\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Logger\Monolog as Logger;
use Magento\Customer\Model\Session;

class GetCountryFromIpObserver implements ObserverInterface
{
    protected $_request;
    protected $_customerSession;
    protected $_logger;

    /**
     * Observer construct method
     *
     * @param Http $request
     * @param Session $session
     * @param Logger $logger
     */
    public function __construct(
        Http $request,
        Session $session,
        Logger $logger
    )
    {
        $this->_customerSession = $session;
        $this->_logger = $logger;
        $this->_request = $request;
    }

    /**
     * Make a remote call to freegeoip.net to detect country of current customer session and store it into session
     *
     * @param EventObserver $observer
     *
     * @return void
     */
    public function execute(EventObserver $observer)
    {
        if (!$this->_customerSession->getLocated()) {

            $clientIP = $this->_request->getClientIp();

            $httpClient = new \Zend\Http\Client();

            $uri = 'http://freegeoip.net/json/' . $clientIP;

            $httpClient->setUri($uri);
            $httpClient->setOptions(array(
                'timeout' => 30
            ));

            try {
                $response = \Zend\Json\Decoder::decode($httpClient->send()->getBody());
                $this->_customerSession->setLocationData($response);
                $this->_customerSession->setLocated(true);
            } catch (\Exception $e) {
                $this->_logger->critical($e);
            }
        }
    }
}