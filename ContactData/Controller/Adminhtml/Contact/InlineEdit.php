<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Kitchen365\ContactData\Controller\Adminhtml\Contact;


use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Kitchen365\ContactData\Model\ContactDataFactory;
use Kitchen365\ContactData\Model\ResourceModel\ContactData as GalleryResourceModel;

class InlineEdit extends \Magento\Backend\App\Action
{
    protected $jsonFactory;
    private $galleryFactory;
    private $galleryResourceModel;

    public function __construct(
        Context $context,
        ContactDataFactory $galleryFactory,
        JsonFactory $jsonFactory,
        GalleryResourceModel $galleryResourceModel
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->galleryFactory = $galleryFactory;
        $this->galleryResourceModel = $galleryResourceModel;
    }

    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        if($this->getRequest()->getParam('isAjax')){
            $postItems = $this->getRequest()->getParam('items', []);
            if(!count($postItems)){
                $messages[] = __('Please correct the data sent.');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $contactUsId) {
                $varInlineEdit = $this->galleryFactory->create();
                $this->galleryResourceModel->load($varInlineEdit, $contactUsId);
                $varInlineEdit->setData(array_merge($varInlineEdit->getData(), $postItems[$contactUsId]));
                $this->galleryResourceModel->save($varInlineEdit);
                }
            }
        }

        return $resultJson->setData(
            [
                'messages' => $messages,
                'error' => $error
            ]
        );
    }
}