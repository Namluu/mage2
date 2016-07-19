<?php
namespace Tomluu\E541TrainingRepository\Api\Data;

/**
 * @api
 */
interface ExampleSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * @api
     * @return \Tomluu\E541TrainingRepository\Api\Data\ExampleInterface[]
     */
    public function getItems();

    /**
     * @api
     * @param \Tomluu\E541TrainingRepository\Api\Data\ExampleInterface[] $items
     * @return $this
     */
    public function setItems(array $items = null);
}