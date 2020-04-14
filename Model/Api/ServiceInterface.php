<?php

namespace CoreshopSolutions\PimcoreConnector\Model\Api;

interface ServiceInterface
{
    /**
     *
     * @param string $attributeId
     * @return mixed
     */
    public function getAttributeSets(string $attributeId);
}
