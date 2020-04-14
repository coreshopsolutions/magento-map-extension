<?php

namespace CoreshopSolutions\PimcoreConnector\Model\Api;

use Magento\Catalog\Api\ProductAttributeRepositoryInterface;
use Magento\Eav\Model\ResourceModel\Entity\Attribute\Set\CollectionFactory;
use Magento\Catalog\Api\ProductAttributeManagementInterface;
use CoreshopSolutions\PimcoreConnector\Model\Api\ServiceInterface;

class Service implements ServiceInterface
{

    /**
     * @var \Magento\Catalog\Api\ProductAttributeRepositoryInterface
     */
    protected $attributeRepository;

    /**
     * @var \Magento\Eav\Model\ResourceModel\Entity\Attribute\Set\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var \Magento\Catalog\Api\ProductAttributeManagementInterface
     */
    protected $productAttributeManager;

    public function __construct(
        ProductAttributeRepositoryInterface $attributeRepository,
        CollectionFactory $collectionFactory,
        ProductAttributeManagementInterface $productAttributeManager
    ) {
        $this->attributeRepository = $attributeRepository;
        $this->collectionFactory = $collectionFactory;
        $this->productAttributeManager = $productAttributeManager;
    }

    /**
     *
     * @param string $attributeId
     * @return mixed
     */
    public function getAttributeSets(string $attributeId)
    {
        $result = [];
        $attribute = $this->attributeRepository->get($attributeId);
        $collection = $this->collectionFactory->create();
        $sets = $collection->getItems();
        foreach ($sets as $set) {
            try {
                $attributes = $this->productAttributeManager->getAttributes($set->getId());
                $attributes = array_keys($attributes);
            } catch (\Exception $e) {
                $attributes = [];
            }
            if (in_array($attribute->getId(), $attributes)) {
                $result[] = $set->getData();
            }
        }
        return $result;
    }
}
