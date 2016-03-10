<?php
namespace Bluecom\Faq\Model\ResourceModel;
class Cate extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
	
	/**
	* Strore manager
	* @var \Magento\Store\Model\StoreManagerInterface
	*/
	protected $_storemanager;

	public function _construct(){
		$this->_init('bluecom_faq_category','category_id');
	}
	
	/**
	* Construct
	*
	* @param \Magnto\Framework\Model\ResourceModel\Db\Context $context
	* @param \Magento\Store\Model\StoreManagerInterface $storeManager
	* @param string $connectionName
	*/
    public function __construct(
    	\Magento\Framework\Model\ResourceModel\Db\Context $context,
    	\Magento\Store\Model\StoreManagerInterface $storeManager,
    	$connectionName = null
    	)
    {
    	parent::__construct($context, $connectionName);
    	$this->_storemanager = $storeManager;

    }

    /**
    * Perform operations after object load
    * 
    * @param \Magento\Framework\Model\AbstractModel $object 
    * @return $this
    */
    protected function _afterLoad(\Magento\Framework\Model\AbstractModel $object) {
    	if($object->getId()){
    		$stores = $this->lookupStoreIds($object->getId());
    		$object->setData('store_id', $stores);
    		$object->setData('stores', $stores);
    	}
    	return parent::_afterLoad($object);
    }

    /**
    * Retrieve select object for load object data
    *
    * @param string $field
    * @param mixed #value
    * @param \Bluecom\Faq\Model\Nlock $object
    * @return \Magento\Framework\DB\Select
    */
    protected function _getLoadSelect($field, $value, $object) {
    	$select = parent::_getLoadSelect($field, $value, $object);
    	if($object->getStoreId()){
    		$stores = [(int)$object->getStoreId(), \Magento\Store\Model\Store::DEFAULT_STORE_ID];
    		$select->join(
    			['bfcs' => $this->getTable('bluecom_faq_category_store')],
    			$this->getMainTable() . '.category_id = bfcs.category_id',
    			['store_id']
    		)
    		->where('is_active = ?', 1)
    		->where('bfcs.store_id IN (?)', $stores)
    		->order('store_id DESC')
    		->limit(1);
    	}
    	return $select;
    }

	/**
	* Perform operations after object save
	* @param \Magento\Framework\Model\AbstractModel $object
	* @return $this
	*/
	public function _afterSave(\Magento\Framework\Model\AbstractModel $object){
		$oldStores = $this->lookupStoreIds($object->getId());
		$newStores = (array)$object->getStores();

		$table = $this->getTable('bluecom_faq_category_store');
		$insert = array_diff($newStores, $oldStores);
		$delete =  array_diff($oldStores, $newStores);

		if($delete){
			$where = ['category_id = ? ' => (int)$object->getId(), 'store_id IN (?)' => $delete];
			$this->getConnection()->delete($table, $where);
		}

		if($insert){
			$data = [];
			foreach ($insert as $storeId) {
				$data[] = ['category_id' => (int)$object->getId(), 'store_id' => (int)$storeId];
			}
			$this->getConnection()->insertMultiple($table,$data);
		}
		return parent::_afterSave($object);
	}

    /**
    * Process faq data before deleting
    * @param \Magento\Framework\Model\AbstractModel $object
    * @return $this
    */
    public function _beforeDelete(\Magento\Framework\Model\AbstractModel $object) {
        $where = ['category_id = ?' => (int)$object->getId()];
        $table = $this->getTable('bluecom_faq_category_store');
        $this->getConnection()->delete($table, $where);
        return parent::_beforeDelete($object);
    }

	/**
	* Get store ids to which specified item is assigned
	*
	* @param int $id
	* @return array
	*/
	public function lookupStoreIds($id){
		$connection = $this->getConnection();

        $select = $connection->select()->from(
            $this->getTable('bluecom_faq_category_store'),
            'store_id'
        )->where(
            'category_id = :category_id'
        );

        $binds = [':category_id' => (int)$id];

        return $connection->fetchCol($select, $binds);
	}
}


?>