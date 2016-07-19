<?php
namespace Tomluu\E541TrainingRepository\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
/**
 * @api
 */
interface ExampleRepositoryInterface
{
    /**
    * @return \Tomluu\E541TrainingRepository\Api\Data\ExampleSearchResultsInterface
    */
    public function getList(SearchCriteriaInterface $searchCriteria);
}