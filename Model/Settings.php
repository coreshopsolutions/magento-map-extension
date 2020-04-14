<?php

namespace CoreshopSolutions\PimcoreConnector\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

class Settings extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'coreshopsolutions_pimcoreconnector_settings';
    protected $_cacheTag = 'coreshopsolutions_pimcoreconnector_settings';
    protected $_eventPrefix = 'coreshopsolutions_pimcoreconnector_settings';

    protected function _construct()
    {
        $this->_init(\CoreshopSolutions\PimcoreConnector\Model\ResourceModel\Settings::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG.'_'.$this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }
}
