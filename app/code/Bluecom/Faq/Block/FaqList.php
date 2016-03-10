<?php
namespace Bluecom\Faq\Block;
use Bluecom\Faq\Api\Data\FaqInterface;
use Bluecom\Faq\Model\ResourceModel\Faq\Collection as FaqCollection;

class FaqList extends \Magento\Framework\View\Element\Template implements \Magento\Framework\DataObject\IdentityInterface
{
	/**
	*	@var \Bluecom\Faq\Model\ResourceModel\Faq\CollectionFactory
	*/
	protected $_faqCollectionFactory;
	protected $_helperFaq;
	protected $_cateCollectionFactory;

	/**
	* Construct
	*
	* @param \Magento\Framework\View\Element\Template\Context $context
	* @param \Bluecom\Faq\Model\ResourceModel\Faq\CollectionFactory as $faqCollectionFactory
	* @param array data
	*/
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Bluecom\Faq\Model\ResourceModel\Faq\CollectionFactory $faqCollectionFactory,
		\Magento\Store\Model\StoreManagerInterface $storeManager,
		\Bluecom\Faq\Helper\Faq $helperFaq,
		\Bluecom\Faq\Model\ResourceModel\Cate\CollectionFactory $cateCollectionFactory,
		array $data = []
	){
      $this->_faqCollectionFactory = $faqCollectionFactory;
      $this->_cateCollectionFactory = $cateCollectionFactory;
      $this->_storeManager = $storeManager;
      $this->_helperFaq = $helperFaq;
      parent::__construct($context,$data);
	}

	/**
	* Init faq collection
	*/
	public function _construct(){
       parent::_construct();
       $collection = $this->_faqCollectionFactory->create();
       $collection->setOrder(FaqInterface::CREATION_TIME, FaqCollection::SORT_ORDER_DESC);
       $collection->addFieldToFilter('is_active', 1);
       $collection->addFieldToFilter('store_id', array($this->getStoreCurrent(), 0));
       $collection->addFieldToFilter('category_id', ['in'=> $this->getStringCates($this->getCollectionCates()->getData())] );
       $this->setCollection($collection);
	}

    public function getStoreCurrent() {
      return $this->_storeManager->getStore()->getId();
    }

	protected function _prepareLayout() {
		parent::_prepareLayout();
		$storeId = $this->getStoreCurrent();
		/* @var \Magento\them\Block\Html\Pager */
		$pager = $this->getLayout()->createBlock(
			'Magento\Theme\Block\Html\Pager',
			'bluecom.faq.list.pager'
		);
		$pager->setLimit($this->_helperFaq->getNumberQuestion())
			  ->setShowAmounts(false)->setCollection($this->getCollection());
		$this->setChild('pager', $pager);
		$this->getCollection()->load();
		return $this;
	}

	/**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities() {
        return [\Bluecom\Faq\Model\Faq::CACHE_TAG . '_' . 'list'];
    }

    /**
    * @return Block pagging
    */

    public function getPagerHtml() {
    	return $this->getChildHtml('pager');
    }

    public function getStringCates($arr_cate){
      $data = [];
       if(is_array($arr_cate)){
       		foreach ($arr_cate as $key => $value) {
       			$data[] = $value['category_id'];
       		}
       		return $data;
       }
    }

    public function getCollectionCates(){
    	
        if(!$this->hasData('cates_faq')){
        	$cates = $this->_cateCollectionFactory->create()
        			//->addFilter('is_active', 1)
        			->addFieldToFilter('is_active', 1)
       				->addFieldToFilter('store_id', array($this->getStoreCurrent(), 0));
       		$this->setData('cates_faq', $cates);
        }
        return $this->getData('cates_faq');
    }
}	
