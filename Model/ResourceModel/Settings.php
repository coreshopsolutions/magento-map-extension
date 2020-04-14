<?php

namespace CoreshopSolutions\PimcoreConnector\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Settings extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('pimcore_settings', 'id');
    }
}
