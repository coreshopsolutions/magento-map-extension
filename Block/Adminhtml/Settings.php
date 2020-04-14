<?php

namespace CoreshopSolutions\PimcoreConnector\Block\Adminhtml;

use Magento\Framework\View\Element\Template;

class Settings extends Template
{
    private $settings = [];

    public function __construct(
        \CoreshopSolutions\PimcoreConnector\Model\Settings $settingsModel,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    )
    {
        // $this->_controller = 'adminhtml_settings';
        $this->_blockGroup = 'CoreshopSolutions_PimcoreConnector';
        // $this->_headerText = __('Settings');
        // $this->_addButtonLabel = __('Add New Setting');
        $collection = $settingsModel->getCollection();
        foreach ($collection as $item) {
            $this->settings[$item->getName()] = $item->getValue();
        }
        parent::__construct($context, $data);
    }

    /**
     * @param string $name 
     * @return void 
     */
    public function getSetting(string $name)
    {
        return isset($this->settings[$name]) ? $this->settings[$name] :  null;
    }
}
