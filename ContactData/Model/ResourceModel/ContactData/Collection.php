<?php

namespace Kitchen365\ContactData\Model\ResourceModel\ContactData;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Kitchen365\ContactData\Model\ContactData::class, 
            \Kitchen365\ContactData\Model\ResourceModel\ContactData::class);
    }
}
