<?php
namespace Bluecom\Faq\Controller\Adminhtml\Cate;

class Delete extends \Bluecom\Faq\Controller\Adminhtml\Cate {
   /**
   * Delete Action
   */
   public function execute() {
   	 	$id = $this->getRequest()->getParam('category_id');
   	 	$resultRedirect = $this->resultRedirectFactory->create();
   	 	if($id) {
   	 		try {
   	 			// init model and delete
   	 			$model = $this->_objectManager->create('Bluecom\Faq\Model\Cate');
   	 			$model->load($id);
   	 			$model->delete();
   	 			// display success message
   	 			$this->messageManager->addSuccess(__('You deleted the category'));
   	 			// fo to grid
   	 			return $resultRedirect->setPath('*/*/');

   	 		}catch(\Exception $e){
   	 			// display error message
   	 			$this->messageManager->addError($e->getMessage());
   	 			// go to edit form
   	 			return $resultRedirect->setPath('*/*/edit', ['category_id'=>$id]);
   	 		}
   	 	
   	 	}
   	 	// display error message
   	 	$this->messageManager->addError(__('We can\'t find a this category.'));
   	 	// go to grid
   	 	return $resultRedirect->setPath('*/*/');
   }
}