<?php
namespace Tomluu\E541TrainingRepository\Model;

use Magento\Framework\Api\Search\FilterGroup;
use Magento\Framework\Api\SearchCriteriaInterface;
use Tomluu\E541TrainingRepository\Api\Data\ExampleInterface;
use Tomluu\E541TrainingRepository\Api\Data\ExampleInterfaceFactory as ExampleDataFactory;
use Tomluu\E541TrainingRepository\Api\Data\ExampleSearchResultsInterface;
use Tomluu\E541TrainingRepository\Api\Data\ExampleSearchResultsInterfaceFactory;
use Tomluu\E541TrainingRepository\Api\ExampleRepositoryInterface;
use Tomluu\E541TrainingRepository\Model\Example as ExampleModel;
use Tomluu\E541TrainingRepository\Model\ExampleFactory as ExampleFactory;
use Tomluu\E541TrainingRepository\Model\ResourceModel\Example\Collection as ExampleCollection;

class ExampleRepository implements ExampleRepositoryInterface
{
    /**
    * @var ExampleSearchResultsInterfaceFactory
    */
    private $searchResultsFactory;

    /**
    * @var ExampleFactory
    */
    private $exampleFactory;

    /**
    * @var ExampleDataFactory
    */
    private $exampleDataFactory;

    public function __construct(
        ExampleSearchResultsInterfaceFactory $searchResultsFactory,
        ExampleFactory $exampleFactory,
        ExampleDataFactory $exampleDataFactory
    ) {
        $this->searchResultsFactory = $searchResultsFactory;
        $this->exampleFactory = $exampleFactory;
        $this->exampleDataFactory = $exampleDataFactory;
    }

    /**
    * {@inheritdoc}
    */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        /** @var ExampleCollection $collection */
        $collection = $this->exampleFactory->create()->getCollection();

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        $this->applySearchCriteriaToCollection($searchCriteria, $collection);
        $examples = $this->convertCollectionToDataItemsArray($collection);

        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($examples);

        return $searchResults;
    }

    private function addFilterGroupToCollection(FilterGroup $filterGroup,ExampleCollection $collection)
    {
        $fields = [];
        $conditions = [];
        foreach ($filterGroup->getFilters() as $filter) {
            $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
            $fields[] = $filter->getField();
            $conditions[] = [$condition => $filter->getValue()];
        }
        if ($fields) {
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    private function convertCollectionToDataItemsArray(ExampleCollection $collection)
    {
        $examples = array_map(function (ExampleModel $example) {
            /** @var ExampleInterface $dataObject */
            $dataObject = $this->exampleDataFactory->create();
            $dataObject->setId($example->getId());
            $dataObject->setName($example->getName());
            $dataObject->setCreatedAt($example->getCreatedAt());
            $dataObject->setModifiedAt($example->getModifiedAt());
            return $dataObject;
        }, $collection->getItems());

        return $examples;
    }

    private function applySearchCriteriaToCollection(
        SearchCriteriaInterface $searchCriteria,
        ExampleCollection $collection
    ) {
        $this->applySearchCriteriaFiltersToCollection($searchCriteria,$collection);
        $this->applySearchCriteriaSortOrdersToCollection($searchCriteria,$collection);
        $this->applySearchCriteriaPagingToCollection($searchCriteria,$collection);
    }

    private function applySearchCriteriaFiltersToCollection(
        SearchCriteriaInterface $searchCriteria,
        ExampleCollection $collection
    ) {
        foreach ($searchCriteria->getFilterGroups() as $group) {
            $this->addFilterGroupToCollection($group, $collection);
        }
    }

    private function applySearchCriteriaSortOrdersToCollection(
        SearchCriteriaInterface $searchCriteria,
        ExampleCollection $collection
    ) {
        $sortOrders = $searchCriteria->getSortOrders();
        if ($sortOrders) {
            $isAscending = $sortOrder->getDirection() == SearchCriteriaInterface::SORT_ASC;
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder($sortOrder->getField(),$isAscending ? 'ASC' : 'DESC');
            }
        }
    }

    private function applySearchCriteriaPagingToCollection(
        SearchCriteriaInterface $searchCriteria,
        ExampleCollection $collection
    ) {
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
    }
}