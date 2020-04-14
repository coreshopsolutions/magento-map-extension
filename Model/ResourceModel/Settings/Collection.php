<?php

namespace CoreshopSolutions\PimcoreConnector\Model\ResourceModel\Settings;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $idFieldName = 'id';
    protected $eventPrefix = 'coreshopsolutions_pimcoreconnector_settings_collection';
    protected $eventModel = 'settings_collection';

    protected function _construct()
    {
        $this->_init(
            \CoreshopSolutions\PimcoreConnector\Model\Settings::class,
            \CoreshopSolutions\PimcoreConnector\Model\ResourceModel\Settings::class
        );
    }
}
