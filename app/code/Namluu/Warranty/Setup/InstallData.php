<?php

namespace Namluu\Warranty\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Catalog\Setup\CategorySetupFactory;

class InstallData implements InstallDataInterface
{
    protected $_categorySetupFactory;

    public function __construct
    (
        \Magento\Catalog\Setup\CategorySetupFactory $categorySetupFactory
    )
    {
        $this->_categorySetupFactory = $categorySetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /* @var $catalogInstaller \Magento\Catalog\Setup\CategorySetup */
        $catalogInstaller = $this->_categorySetupFactory->create(['resourceName' => 'catalog_setup']);

        $catalogInstaller->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'warranty',
            [
                'name'      => 'Warranty',
                'label'     => 'Warranty',
                'visible_on_front' => true,
                'is_html_allowed_on_front' => true,
                'user_defined' => true,
                'backend'   => 'Namluu\Warranty\Model\Product\Attribute\Backend\Warranty',
                'frontend'  => 'Namluu\Warranty\Model\Product\Attribute\Frontend\Warranty',
                'required'  => false,
            ]
        );

        $catalogInstaller->addAttributeToSet(
            \Magento\Catalog\Model\Product::ENTITY,
            'Gear',
            'Product Details',
            'warranty'
        );

        $installer->endSetup();
    }
}