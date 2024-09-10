<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

trait ConsumesExternalServices
{
    /**
     * Send a request to any service
     * @return sdtClass|string
     */
    public function makeRequest($method, $requestUrl, $queryParams = [], $formParams = [], $headers = [], $hasFile = false)
    {
        // $client = new Client([
        //     'base_uri' => $this->baseUri,
        // ]);

        // dd($this->getToken());
        $client = Http::turn14();

        if (method_exists($this, 'resolveAuthorization')) {
            $this->resolveAuthorization($queryParams, $formParams, $headers);
        }

        $bodyType = 'form_params';

        if ($hasFile) {
            $bodyType = 'multipart';

            $multipart = [];

            foreach ($formParams as $name => $contents) {
                $multipart[] = ['name' => $name, 'contents' => $contents];
            }
        }

        if(strtolower($method) == 'get'){
            $response = $client
                ->withHeaders($headers)
                ->withQueryParameters($queryParams)
                ->get($requestUrl);
        }

        if(strtolower($method) == 'post'){
            // dd($formParams);
            $response = $client
                ->withHeaders($headers)
                ->withQueryParameters($queryParams)
                ->asForm()
                ->post($requestUrl, [
                    $formParams
                ]);
        }



        // $response = $client->request($method, $requestUrl, [
        //     'query' => $queryParams,
        //     $bodyType => $hasFile ? $multipart : $formParams,
        //     'headers' => $headers,
        // ]);

        $response = $response->getBody()->getContents();

        if (method_exists($this, 'decodeResponse')) {
            $response = $this->decodeResponse($response);
        }

        if (method_exists($this, 'checkIfErrorResponse')) {
            $this->checkIfErrorResponse($response);
        }

        return $response;
    }
}
