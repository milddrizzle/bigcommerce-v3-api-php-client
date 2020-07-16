<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductModifier;
use stdClass;

class ModifierResponse extends SingleResourceResponse
{
    private ProductModifier $productModifier;

    public function getProductModifier(): ProductModifier
    {
        return $this->productModifier;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->productModifier = new ProductModifier($rawData);
    }
}
