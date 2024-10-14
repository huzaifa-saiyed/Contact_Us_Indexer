<?php

namespace Kitchen365\ContactData\Model\ResourceModel;

class ContactData extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('kitchen365_contact_data', 'entity_id');
    }
}
