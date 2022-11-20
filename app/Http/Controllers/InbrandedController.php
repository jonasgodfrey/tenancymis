<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InbrandedController extends Controller
{
    private $apiKey;
    private $baseUrl;

    function __construct()
    {
        $this->token = "";
        if (env('APP_MODE') == 'test') {
            $this->apiKey = config('inbranded.api_key_test');
            $this->baseUrl = config('inbranded.base_url_test');
        } else {
            $this->apiKey = config('inbranded.api_key_live');
            $this->baseUrl = config('inbranded.base_url_live');
        }
    }

    public function register($name, $email)
    {

        try {
            $body = [
                "name" => $name,
                "email" => $email
            ];

            $buyAirtime = $this->inbrandedPostRequest('workflow/hook/3b5fcf40-f09a-48ff-84ca-ecaf063c9fc3/catch', $body);

            logInfo($buyAirtime, "Register responose");

            if (isset($buyAirtime['status'])) {
                if ($buyAirtime["status"] == "ok") {
                    return ["status" => true, 'message' => "Request handled successfully"];
                } else {
                    return ["status" => false, 'message' => 'Failed to handle request'];
                }
            } else {
                return ["status" => false, 'message' => 'Failed to handle request'];
            }
        } catch (Exception $e) {
            return ["status" => false, 'message' => 'Failed to handle request'];
        }
    }


    public function inbrandedGetRequest($endpoint)
    {
        $response = Http::get($this->inbrandedBaseUrl($endpoint));
        return $response->json();
    }

    public function inbrandedPostRequest($endpoint, $body)
    {
        $body['apiKey'] = $this->apiKey;

        logInfo($this->inbrandedBaseUrl($endpoint), 'url');
        logInfo($body, 'api request body');
        $response = Http::post($this->inbrandedBaseUrl($endpoint), $body);
        return $response->json();
    }


    public function inbrandedBaseUrl($endpoint)
    {
        return env('APP_MODE') == 'test' ? config('inbranded.base_url_test') . $endpoint : config('inbranded.base_url_live') . $endpoint;
    }
}
