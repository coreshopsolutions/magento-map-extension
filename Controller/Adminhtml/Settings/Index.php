<?php

namespace CoreshopSolutions\PimcoreConnector\Controller\Adminhtml\Settings;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use CoreshopSolutions\PimcoreConnector\Model\SettingsFactory;

/**
 * Class Index - display PIM Connector settings page
 */
class Index extends Action implements HttpGetActionInterface
{
    const MENU_ID = 'CoreshopSolutions_PimcoreConnector::settings_panel';

    /**
     * @var string
     */
    private $formKey = '';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Index constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        SettingsFactory $settingsFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->settingsFactory = $settingsFactory;
        parent::__construct($context);
    }

    /**
     * Load the page defined in xml
     *
     * @return Page
     */
    public function execute()
    {
        $submitted = ($this->getRequest()->getParam('pimcore_url', false) !== false);
        $post = $this->getRequest()->getParams();
        $settings = $this->settingsFactory->create();
        $collection = $settings->getCollection();
        foreach ($collection as $item) {
            $name = $item->getName();
            if ($submitted) {
                $item->setValue($post[$name]);
                $item->save();
            }
        }

        if ($submitted) {
            $this->messageManager->addSuccess(__('Your configuration has been saved successfully'));
        }
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
