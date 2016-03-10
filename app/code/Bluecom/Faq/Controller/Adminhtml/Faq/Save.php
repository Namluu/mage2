<?php
namespace Bluecom\Faq\Controller\Adminhtml\Faq;

class Save extends \Bluecom\Faq\Controller\Adminhtml\Faq {

	public function execute(){
		// @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect
		$resultRedirect = $this->resultRedirectFactory->create();
		//check if dat sent
		$data = $this->getRequest()->getPostValue();
		if($data){
			$id = $this->getRequest()->getParam('faq_id');
			$model = $this->_objectManager->create('Bluecom\Faq\Model\Faq')->load($id);
			if(!$model->getId() && $id){
				$this->messageManager->addError(__('This faq no longer exists'));
				return $resultRedirect->setPath('*/*/');
			}

			// init model and set data
			$model->setData($data);
			
			// try to save it
			try {
				// save data
				$model->save();
				// display success message
				$this->messageManager->addSuccess(__('You Saved the Faq'));
				// clear previously saved data from session
				$this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);

				// check if 'Save and continue'
				if($this->getRequest()->getParam('back')){
					return $resultRedirect->setPath('*/*/edit', ['faq_id'=>$model->getId()]);
				}

				// go to grid
				return $resultRedirect->setPath('*/*/');

			} catch(\Exception $e){
				// display error message
				$this->messageManager->addError($e->getMessage());
				// save data in session
				$this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
				// redirect to edit form
				return $redirect->setPath('*/*/edit',['faq_id'=>$this->getRequest()->getParam('faq_id')]);
			}
		}
		return $resultRedirect->setPath('*/*/');

	}
}
?>