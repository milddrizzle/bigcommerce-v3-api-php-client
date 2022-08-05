<?php

namespace BigCommerce\ApiV3\Api\Sites;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use BigCommerce\ApiV3\ResponseModels\Site\SiteRouteResponse;
use BigCommerce\ApiV3\ResponseModels\Site\SiteRoutesResponse;

class SiteRoutesApi extends ResourceApi
{
    private const RESOURCE_NAME  = 'routes';
    private const ROUTES_ENDPOINT = 'sites/%d/routes';
    private const ROUTE_ENDPOINT  = 'sites/%d/routes/$d';

    protected function singleResourceEndpoint(): string
    {
        return self::ROUTE_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::ROUTES_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(): SiteRouteResponse
    {
        return new SiteRouteResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): SiteRoutesResponse
    {
        return new SiteRoutesResponse($this->getAllResources($filters, $page, $limit));
    }
}
