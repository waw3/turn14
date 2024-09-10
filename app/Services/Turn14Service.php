<?php

namespace App\Services;

use App\Traits\AuthorizesTurn14Requests;
use App\Traits\ConsumesExternalServices;
use App\Traits\InteractsWithTurn14Responses;

class Turn14Service
{
    use ConsumesExternalServices, AuthorizesTurn14Requests, InteractsWithTurn14Responses;

    /**
     * The URL to send the requests
     * @var string
     */
    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.turn14.base_uri');
    }

    /**
     * Obtains the list of brands from the API
     * @return stdClass
     */
    public function getBrands()
    {
        return $this->makeRequest('GET', 'brands');
    }

    /**
     * Obtains the a brand from the API
     * @return stdClass
     */
    public function getBrand($id)
    {
        return $this->makeRequest('GET', "brands/{$id}");
    }

    /**
     * Obtains the a brand from the API
     * @return stdClass
     */
    public function getBrandPriceGroup($brand_id, $pricegroup_id)
    {
        return $this->makeRequest('GET', "brands/{$brand_id}/pricegroup/{$pricegroup_id}");
    }

    /**
     * Obtains the list of items from the API
     * @return stdClass
     */
    public function getItems($page=1)
    {
        return $this->makeRequest('GET', 'items?page={$page}');
    }

    /**
     * Obtains the list of items from the API
     * @return stdClass
     */
    public function getItem($id)
    {
        return $this->makeRequest('GET', 'items/{$id}');
    }

/**
     * Get all item data for an item
     * @return stdClass
     */
    public function getItemData($id)
    {
        return $this->makeRequest('GET', 'items/data/{$id}');
    }

    /**
     * Get all items for a brand
     * @return stdClass
     */
    public function getItemsForBrand($id, $page=1)
    {
        return $this->makeRequest('GET', 'items/brand/{$id}?page={$page}');
    }

    /**
     * Get all items for a brand
     * @return stdClass
     */
    // public function getItemsForBrand($id, $page=1)
    // {
    //     return $this->makeRequest('GET', 'items/brand/{$id}?page={$page}');
    // }


}
