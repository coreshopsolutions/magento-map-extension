<?php

namespace CoreshopSolutions\Pimcore\Block\Adminhtml\Category\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Backend\Block\Widget\Button;

/**
 * Class ClearCacheButton
 */
class DownloadButton extends Button implements ButtonProviderInterface
{
    const URL = 'https://coreshopsolutions.com/mme';

    /**
     * Clear Cache button
     *
     * @return array
     */
    public function getButtonData()
    {
        $category = $this->getCategory();
        $categoryId = (int)$category->getId();

        if ($categoryId) {
            return [
                'id' => 'download_connector',
                'label' => __('Download Connector'),
                'title' => __('Download Connector'),
                'on_click' => "window.open('".static::URL."','_blank')",
                'class' => 'actions-default',
                'sort_order' => 10
            ];
        }

        return [];
    }
}