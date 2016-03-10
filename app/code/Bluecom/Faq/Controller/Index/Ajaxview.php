<?php
namespace Bluecom\Faq\Controller\Index;

Class Ajaxview extends \Magento\Framework\App\Action\Action {

    protected $storeManager;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        parent::__construct($context);
        $this->storeManager = $storeManager;    
    }

    public function execute()
    {
        
        $cate_id  =  $this->getRequest()->getPost('cate_id');
        $storeId = $this->storeManager->getStore()->getId();
        $result = $this->_objectManager->get('Bluecom\Faq\Model\ResourceModel\Faq')->getFaqCate($storeId, $cate_id);
        $data = [];
        if( count($result) > 0 ){
            foreach ($result as $value) {
                $data['result'][] = array($value['faq_id'], $value['question'], htmlentities($value['answer']));
            }
        }
        else {
            $data['error'] = 'error';
        }
        $this->getResponse()->setBody(json_encode($data)); 
    }


}

?>