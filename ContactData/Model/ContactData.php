<?php

namespace Kitchen365\ContactData\Model;

class ContactData extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Kitchen365\ContactData\Model\ResourceModel\ContactData::class);
    }
}
