<?php
namespace Tomluu\E541TrainingRepository\Controller\Customer;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
    * @var CustomerRepositoryInterface
    */ 
    private $customerRepository;

    /**
    * @var SearchCriteriaBuilder
    */
    private $searchCriteriaBuilder;

    public function __construct(
        Context $context,
        CustomerRepositoryInterface $customerRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->customerRepository = $customerRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;

        parent::__construct($context);
    }

    public function execute()
    {
        $this->getResponse()->setHeader('Content-Type', 'text/plain');
        $customers = $this->getCustomersFromRepository();
        $this->getResponse()->appendBody(sprintf("Class %s\n",get_class($customers[0])));

        foreach ($customers as $customer) {
            $this->output($customer);
        }
    }

    private function getCustomersFromRepository()
    {
        $criteria = $this->searchCriteriaBuilder->create();
        $customers = $this->customerRepository->getList($criteria);
        return $customers->getItems();
    }

    private function output($customer)
    {
        $this->getResponse()->appendBody(sprintf("%s (%d)\n",$customer->getEmail(),$customer->getId()));
    }
}