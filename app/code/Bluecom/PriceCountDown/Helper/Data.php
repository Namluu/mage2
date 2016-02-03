<?php

namespace Bluecom\PriceCountDown\Helper;


class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const PCD_BLOCK_ENABLE = 'section_price_countdown/group_price_countdown/active_price_countdown';
    const PCD_BLOCK_WIDTH = 'section_price_countdown/group_price_countdown/pcd_block_width';
    const PCD_BLOCK_COLOR = 'section_price_countdown/group_price_countdown/pcd_block_color';


    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }


    public function isCustomBlockEnabled()
    {
        return $this->scopeConfig->getValue(
            self::PCD_BLOCK_ENABLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function BlockWidth()
    {
        return $this->scopeConfig->getValue(
            self::PCD_BLOCK_WIDTH,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function BlockColor()
    {
        return $this->scopeConfig->getValue(
            self::PCD_BLOCK_COLOR,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}