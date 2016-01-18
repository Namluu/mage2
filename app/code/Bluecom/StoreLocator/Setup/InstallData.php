<?php
namespace Bluecom\StoreLocator\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\InstallDataInterface;

class InstallData implements InstallDataInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $tableName = $setup->getTable('bluecom_storelocator_location');

        if ($setup->getConnection()->isTableExists($tableName) == true) {

            $data = [
                [
                    'title' => 'Bluecom',
                    'address' => '20 Cộng Hòa HCM VietNam',
                    'email' => 'conghoa@yahoo.com',
                    'phone' => '098-234-1234',
                    'creation_time' => date('Y-m-d H:i:s'),
                    'longitude' => 10.800827,
                    'latitude' => 106.6503639,
                    'is_active' => 1
                ],
                [
                    'title' => 'Đần Sen',
                    'address' => '3 Hòa Bình, phường 3, Hồ Chí Minh, Vietnam',
                    'email' => 'var@yahoo.com',
                    'phone' => '098-234-1234',
                    'creation_time' => date('Y-m-d H:i:s'),
                    'longitude' => 10.7647141,
                    'latitude' => 106.6387046,
                    'is_active' => 1
                ]
            ];
 
            // Insert data to table
            foreach ($data as $item) {
                $setup->getConnection()->insert($tableName, $item);
            }
        }

        $installer->endSetup();
    }
}
