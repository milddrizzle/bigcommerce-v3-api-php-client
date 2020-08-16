<?php

namespace BigCommerce\ApiV3\Catalog;

use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\Catalog\Categories\CategoryImageApi;
use BigCommerce\ApiV3\Catalog\Categories\CategoryMetafieldsApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Category\Category;
use BigCommerce\ApiV3\ResponseModels\Category\CategoriesResponse;
use BigCommerce\ApiV3\ResponseModels\Category\CategoryResponse;

class CategoriesApi extends ResourceApi
{
    private const RESOURCE_NAME       = 'categories';
    private const CATEGORIES_ENDPOINT = 'catalog/categories';
    private const CATEGORY_ENDPOINT   = 'catalog/categories/%d';

    public function image(): CategoryImageApi
    {
        return new CategoryImageApi($this->getClient(), null, $this->getResourceId());
    }

    public function get(): CategoryResponse
    {
        return new CategoryResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): CategoriesResponse
    {
        return new CategoriesResponse($this->getAllResources($filters, $page, $limit));
    }

    public function getAllPages(array $filter = []): CategoriesResponse
    {
        return CategoriesResponse::BuildFromAllPages(function ($page) use ($filter) {
            return $this->getAllResources($filter, $page, 200);
        });
    }

    public function create(Category $category): CategoryResponse
    {
        return new CategoryResponse($this->createResource($category));
    }

    public function update(Category $category): CategoryResponse
    {
        return new CategoryResponse($this->updateResource($category));
    }

    protected function singleResourceEndpoint(): string
    {
        return self::CATEGORY_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::CATEGORIES_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function metafield(int $metafieldId): CategoryMetafieldsApi
    {
        return new CategoryMetafieldsApi($this->getClient(), $metafieldId, $this->getResourceId());
    }

    public function metafields(): CategoryMetafieldsApi
    {
        return new CategoryMetafieldsApi($this->getClient(), null, $this->getResourceId());
    }
}
