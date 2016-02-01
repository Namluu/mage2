<?php
namespace Foggyline\Office\Controller\Test;

class Crud extends \Foggyline\Office\Controller\Test
{
    protected $employeeFactory;
    protected $departmentFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Foggyline\Office\Model\EmployeeFactory $employeeFactory,
        \Foggyline\Office\Model\DepartmentFactory $departmentFactory
        )
    {
        $this->employeeFactory = $employeeFactory;
        $this->departmentFactory = $departmentFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        //Simple model, creating new entities, flavour #1
        $department1 = $this->departmentFactory->create();
        $department1->setName('Finance');
        $department1->save();

        $department2 = $this->departmentFactory->create();
        $department2->setName('Research');
        $department2->save();

        $department3 = $this->departmentFactory->create();
        $department3->setName('Support');
        $department3->save();

        //EAV model
        $employee1 = $this->employeeFactory->create();
        $employee1->setDepartment_id($department1->getId());
        $employee1->setEmail('goran@mail.loc');
        $employee1->setFirstName('Goran');
        $employee1->setLastName('Gorvat');
        $employee1->setServiceYears(3);
        $employee1->setDob('1984-04-18');
        $employee1->setSalary(3800.00);
        $employee1->setVatNumber('GB123451234');
        $employee1->setNote('Note #1');
        $employee1->save();

        $employee2 = $this->employeeFactory->create();
        $employee2->setDepartment_id($department2->getId());
        $employee2->setEmail('marko@mail.loc');
        $employee2->setFirstName('marko');
        $employee2->setLastName('marko');
        $employee2->setServiceYears(3);
        $employee2->setDob('1984-04-18');
        $employee2->setSalary(3800.00);
        $employee2->setVatNumber('GB123451234');
        $employee2->setNote('Note #2');
        $employee2->save();

        
    }
}