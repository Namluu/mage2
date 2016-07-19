<?php
namespace Tomluu\E541TrainingRepository\Controller\Repository;

use Tomluu\E541TrainingRepository\Api\ExampleRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
    * @var ExampleRepositoryInterface
    */ 
    private $exampleRepository;

    /**
    * @var SearchCriteriaBuilder
    */
    private $searchCriteriaBuilder;

    public function __construct(
        Context $context,
        ExampleRepositoryInterface $exampleRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->exampleRepository = $exampleRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;

        parent::__construct($context);
    }

    public function execute()
    {
        $this->getResponse()->setHeader('Content-Type', 'text/plain');
        $examples = $this->getExamplesFromRepository();

        foreach ($examples as $example) {
            $this->output($example);
        }
    }

    private function getExamplesFromRepository()
    {
        $criteria = $this->searchCriteriaBuilder->create();
        $examples = $this->exampleRepository->getList($criteria);
        return $examples->getItems();
    }

    private function output($example)
    {
        $this->getResponse()->appendBody(sprintf("%s (%d)\n",$example->getName(),$example->getId()));
    }
}