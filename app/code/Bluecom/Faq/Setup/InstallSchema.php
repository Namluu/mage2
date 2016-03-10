<?php
namespace Bluecom\Faq\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface {
	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
		$installer = $setup;
		$installer->startSetup();
		$table = $installer->getConnection()->newTable(
			$installer->getTable('bluecom_faq'))
					  ->addColumn(
					  	'faq_id',
					  	\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					  	null,
					  	['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
					  	'Faq Id'
					  	)
					  ->addColumn(
					  	'question',
					  	\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					  	255,
					  	['nullable' => false],
					  	'Question'
					  	)
					  ->addColumn(
					  	'answer',
					  	\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					  	'64k',
					  	['nullable'=>false, 'default'=> ''],
					  	'Answer'
					  	)
					  ->addColumn(
					  	'answer_html',
			            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
			            null,
			            ['unsigned' => true, 'nullable' => false, 'default' => '1'],
			            'Answer Html'
					  	)
					  ->addColumn(
					  	'creation_time',
			            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
			            null,
			            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
			            'Create date'
					  	)
					  ->addColumn(
					  	'update_time',
			            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
			            null,
			            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
			            'Update date'
					  	)
					  ->addColumn(
					  	'is_active',
			            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
			            null,
			            ['unsigned' => true, 'nullable' => false, 'default' => '1'],
			            'Active'
					  	)
					->addColumn(
					  	'category_id',
			            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			            null,
			            ['unsigned' => true, 'nullable' => false, 'default' => '0'],
			            'Category Id'
					  	)
					->addForeignKey(
			                $installer->getFkName('bluecom_faq', 'category_id', 'bluecom_faq_category', 'category_id'),
			                'category_id',
			                $installer->getTable('bluecom_faq_category'),
			                'category_id',
			                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
			            )
					  ->setComment(
				            'Admin System Faq'
				        );
		$installer->getConnection()->createTable($table);

		$table = $installer->getConnection()->newTable(
            $installer->getTable('bluecom_faq_store'))
            			 ->addColumn(
				                'faq_id',
				                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
				                null,
				                ['unsigned' => true, 'nullable' => false, 'primary' => true, 'default' => '0'],
				                'Faq ID'
				            )
				        ->addColumn(
				                'store_id',
				                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
				                null,
				                ['unsigned' => true, 'nullable' => false, 'primary' => true, 'default' => '0'],
				                'Store ID'
				            )
				        ->addIndex(
							$installer->getIdxName('bluecom_faq_store', ['faq_id']),
		            		['faq_id']
						)
						->addForeignKey(
			                $installer->getFkName('bluecom_faq_store', 'store_id', 'store', 'store_id'),
			                'store_id',
			                $installer->getTable('store'),
			                'store_id',
			                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
			            );
		$installer->getConnection()->createTable($table);

		$table = $installer->getConnection()->newTable(
            $installer->getTable('bluecom_faq_category'))
            			->addColumn(
					  	'category_id',
					  	\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					  	null,
					  	['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
					  	'Category Id'
					  	)
					  	->addColumn(
					  	'category_name',
					  	\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					  	255,
					  	['nullable' => false],
					  	'Category Name'
					  	)
					  ->addColumn(
					  	'creation_time',
			            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
			            null,
			            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
			            'Create date'
					  	)
					  ->addColumn(
					  	'update_time',
			            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
			            null,
			            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
			            'Update date'
					  	)
					  ->addColumn(
					  	'order_cate',
			            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
			            null,
			            ['unsigned' => true, 'nullable' => false, 'default' => '1'],
			            'Active'
					  	)
					  ->addColumn(
					  	'is_active',
			            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
			            null,
			            ['unsigned' => true, 'nullable' => false, 'default' => '1'],
			            'Active'
					  	)
					  ->setComment(
				            'Admin System Faq Category'
				        );		            				        
		$installer->getConnection()->createTable($table);

		$table = $installer->getConnection()->newTable(
            $installer->getTable('bluecom_faq_category_store'))
             			 ->addColumn(
				                'category_id',
				                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
				                null,
				                ['unsigned' => true, 'nullable' => false, 'primary' => true, 'default' => '0'],
				                'Category ID'
				            )
				        ->addColumn(
				                'store_id',
								\Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
				                null,
				                ['unsigned' => true, 'nullable' => false, 'primary' => true, 'default' => '0'],
				                'Store ID'
				            )
				        ->addIndex(
							$installer->getIdxName('bluecom_faq_category_store', ['category_id']),
		            		['category_id']
						)
						->addForeignKey(
			                $installer->getFkName('bluecom_faq_category_store', 'store_id', 'store', 'store_id'),
			                'store_id',
			                $installer->getTable('store'),
			                'store_id',
			                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
			            );		            
				        
		$installer->getConnection()->createTable($table);		
		$installer->endSetup();
	}
}

?>
