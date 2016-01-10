<?php
namespace Namluu\Vendor\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface VendorSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Namluu\Vendor\Api\Data\VendorInterface[]
     */
    public function getItems();

    /**
     * @param \Namluu\Vendor\Api\Data\VendorInterface[] $items
     *
     * @return $this
     */
    public function setItems(array $items);
}