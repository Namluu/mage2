<?php
namespace Tomluu\E541TrainingRepository\Controller\Index;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Api\FilterBuilder;
use Magento\ConfigurableProduct\Model\Product\Type\Configurable;

class ConfigurablePro extends \Magento\Framework\App\Action\Action
{
    /**
    * @var ProductRepositoryInterface
    */ 
    private $productRepository;

    /**
    * @var SearchCriteriaBuilder
    */
    private $searchCriteriaBuilder;

    /**
    * @var FilterBuilder
    */
    private $filterBuilder;

    public function __construct(
        Context $context,
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder
    ) {
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;

        parent::__construct($context);
    }

    public function execute()
    {
        $this->getResponse()->setHeader('Content-Type', 'text/plain');
        $products = $this->getProductsFromRepository();
        foreach ($products as $product) {
            $this->outputProduct($product);
        }
    }

    private function getProductsFromRepository()
    {
        $this->setProductTypeFilter();
        $this->setProductNameFilter();

        $criteria = $this->searchCriteriaBuilder->create();
        $products = $this->productRepository->getList($criteria);
        return $products->getItems();
    }

    private function outputProduct($product)
    {
        $this->getResponse()->appendBody(sprintf("%s - %s (%d)\n",$product->getName(),$product->getSku(),$product->getId()));
    }

    private function setProductTypeFilter()
    {
        $configurableProductFilter = $this->filterBuilder
            ->setField('type_id')
            ->setValue(Configurable::TYPE_CODE)
            ->setConditionType('eq')
            ->create();
        $this->searchCriteriaBuilder->addFilters([$configurableProductFilter]);
    }

    private function setProductNameFilter()
    {
        $nameFilter = $this->filterBuilder
            ->setField('name')
            ->setValue('M%')
            ->setConditionType('like')
            ->create();
        $this->searchCriteriaBuilder->addFilters([$nameFilter]);
    }
}