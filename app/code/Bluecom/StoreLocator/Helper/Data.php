<?php

namespace Bluecom\StoreLocator\Helper;


class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const SL_BLOCK_ENABLE = 'section_store_location/group_store_locator/active_store_locator';
    const SL_MAP_ZOOM = 'section_store_location/group_store_locator/sl_map_zoom';


    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }


    public function isEnabled()
    {
        return $this->scopeConfig->getValue(
            self::SL_BLOCK_ENABLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getMapZoom()
    {
        return $this->scopeConfig->getValue(
            self::SL_MAP_ZOOM,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}