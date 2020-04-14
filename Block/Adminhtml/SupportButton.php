<?php

namespace CoreshopSolutions\Pimcore\Block\Adminhtml\Category\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Backend\Block\Widget\Button;

/**
 * Class ClearCacheButton
 */
class SupportButton extends Button implements ButtonProviderInterface
{
    const URL = 'https://coreshopsolutions.com/support.php';

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
                'id' => 'connector_support',
                'label' => __('Support'),
                'title' => __('Support'),
                'on_click' => "window.open('".static::URL."','_blank')",
                'class' => 'actions-default',
                'sort_order' => 10
            ];
        }

        return [];
    }
}