<?php

namespace Kitchen365\ContactData\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Kitchen365\ContactData\Model\ContactDataFactory;

class SaveContactData implements ObserverInterface
{
    protected $contactDataFactory;

    public function __construct(ContactDataFactory $contactDataFactory)
    {
        $this->contactDataFactory = $contactDataFactory;
    }

    public function execute(Observer $observer)
    {
        $request = $observer->getRequest();
        
        $contact = $this->contactDataFactory->create();
        $contact->setName($request->getParam('name'));
        $contact->setEmail($request->getParam('email'));
        $contact->setTelephone($request->getParam('telephone'));
        $contact->setComment($request->getParam('comment'));
        $contact->save();
    }
}
