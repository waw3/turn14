<?php

namespace App\Traits;

use App\Services\Turn14AuthenticationService;

trait AuthorizesTurn14Requests
{
    /**
     * Resolve the elements to send when authorizing the request
     * @return void
     */
    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $accessToken = $this->getToken();

        $headers['Authorization'] = $accessToken;
    }

    public function getToken()
    {
        return $this->resolveAccessToken();
    }

    /**
     * Resolve a valid access token to use
     * @return string
     */
    public function resolveAccessToken()
    {
        $authenticationService = resolve(Turn14AuthenticationService::class);

        // if (auth()->user()) {
        //     return $authenticationService->getAuthenticatedUserToken();
        // }

        return $authenticationService->getClientCredentialsToken();
    }
}
