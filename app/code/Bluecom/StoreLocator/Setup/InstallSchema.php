<?php 
namespace Bluecom\StoreLocator\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable('bluecom_storelocator_location'))
            ->addColumn(
                'location_id',
                Table::TYPE_SMALLINT,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'Location ID'
            )
            ->addColumn('title', Table::TYPE_TEXT, 255, ['nullable' => false])
            ->addColumn('address', Table::TYPE_TEXT, 255, ['nullable' => false])
            ->addColumn('url', Table::TYPE_TEXT, 100, ['nullable' => true, 'default' => null])
            ->addColumn('email', Table::TYPE_TEXT, 100, ['nullable' => true, 'default' => null])
            ->addColumn('phone', Table::TYPE_TEXT, 100, ['nullable' => false])
            ->addColumn('note', Table::TYPE_TEXT, '2M', [])
            ->addColumn('longitude', Table::TYPE_TEXT, 100, ['nullable' => false])
            ->addColumn('latitude', Table::TYPE_TEXT, 100, ['nullable' => false])
            ->addColumn('is_active', Table::TYPE_SMALLINT, null, ['nullable' => false, 'default' => '1'], 'Is Post Active?')
            ->addColumn('creation_time', Table::TYPE_DATETIME, null, ['nullable' => false])
            ->addColumn('update_time', Table::TYPE_DATETIME, null, ['nullable' => false])
            //->addIndex($installer->getIdxName('blog_post', ['url_key']), ['url_key'])
            ->setComment('Bluecom StoreLocator Location');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }

}