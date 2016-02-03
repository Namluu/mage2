<?php
/**
 * Created by PhpStorm.
 * User: kietluu
 * Date: 01/02/2016
 * Time: 10:39
 */
namespace Bluecom\PriceCountDown\Block;

use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\View\Element\Template;

use Magento\Framework\Pricing\Amount\AmountInterface;
use Magento\Framework\Pricing\SaleableInterface;
use Magento\Framework\Pricing\Price\PriceInterface;

class BFinalPriceBox extends \Magento\Catalog\Pricing\Render\FinalPriceBox{
    protected $myModuleHelper;



    public function timeToCount()
    {
        $product = $this->getSaleableItem();
        /**
         * $this->localeDate->scopeDate($storeId);
         *
         * object(DateTime)[1388]
         * public 'date' => string '2016-01-30 00:00:00.000000' (length=26)
         * public 'timezone_type' => int 3
         * public 'timezone' => string 'Asia/Ho_Chi_Minh' (length=16)
         */

        /**
         * $this->localeDate->date()
         *
         * object(DateTime)[1394]
         * public 'date' => string '2016-01-30 17:07:24.000000' (length=26)
         * public 'timezone_type' => int 3
         * public 'timezone' => string 'Asia/Ho_Chi_Minh' (length=16)
         */
        $date = $this->_localeDate->date();
        /**
         * $this->localeDate->getConfigTimezone()
         *
         * string 'Asia/Ho_Chi_Minh' (length=16)
         */

        $currentTime = $date->format('Y-m-d H:i:s');

        $toDate = $product->getSpecialTODate();

        $diff = 0;

        if (strtotime($toDate) > strtotime($currentTime))
            $diff = strtotime($toDate) - strtotime($currentTime);

        return $diff;
    }
}