<?php
namespace Bluecom\Faq\Controller\Adminhtml\Faq;

class Delete extends \Bluecom\Faq\Controller\Adminhtml\Faq {
   /**
   * Delete Action
   */
   public function execute() {
   	 	$id = $this->getRequest()->getParam('faq_id');
   	 	$resultRedirect = $this->resultRedirectFactory->create();
   	 	if($id) {
   	 		try {
   	 			// init model and delete
   	 			$model = $this->_objectManager->create('Bluecom\Faq\Model\Faq');
   	 			$model->load($id);
   	 			$model->delete();
   	 			// display success message
   	 			$this->messageManager->addSuccess(__('You deleted the faq'));
   	 			// fo to grid
   	 			return $resultRedirect->setPath('*/*/');

   	 		}catch(\Exception $e){
   	 			// display error message
   	 			$this->messageManager->addError($e->getMessage());
   	 			// go to edit form
   	 			return $resultRedirect->setPath('*/*/edit', ['faq_id'=>$id]);
   	 		}
   	 	
   	 	}
   	 	// display error message
   	 	$this->messageManager->addError(__('We can\'t find a faq to delete.'));
   	 	// go to grid
   	 	return $resultRedirect->setPath('*/*/');
   }
}