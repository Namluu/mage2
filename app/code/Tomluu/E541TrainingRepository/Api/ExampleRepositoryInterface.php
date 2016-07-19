<?php
namespace Tomluu\E541TrainingRepository\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ExampleRepositoryInterface
{
    /**
    * @return Data\ExampleSearchResultsInterface
    */
    public function getList(SearchCriteriaInterface $searchCriteria);
}