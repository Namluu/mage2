<?php
namespace Namluu\VendorRepository\Api;

interface VendorRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return \Namluu\Vendor\Api\Data\VendorInterface
     */
    public function load($id) ;

    /**
     * @param \Namluu\Vendor\Api\Data\VendorInterface $vendor
     *
     * @return \Namluu\Vendor\Api\Data\VendorInterface
     */
    public function save(\Namluu\Vendor\Api\Data\VendorInterface $vendor);

    /**
     * @param \Magento\Framework\Api\SortOrder $searchCriteria
     *
     * @return \Namluu\Vendor\Api\Data\VendorSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SortOrder $searchCriteria);

    /**
     * @param int $id
     *
     * @return int[]
     */
    public function getAssociatedProductIds($id) ;
}