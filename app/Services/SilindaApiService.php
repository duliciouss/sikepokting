<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SilindaApiService
{
    public function __construct(Http $http)
    {
        $this->http = $http;
        $this->SILINDA_BASE_URL = config('custom.silinda.base_url');
        $this->SILINDA_CLIENT_ID = config('custom.silinda.client_id');
        $this->SILINDA_CLIENT_SECRET = config('custom.silinda.client_secret');
        $this->SILINDA_TOKEN_URL = config('custom.silinda.token_url');
        $this->SILINDA_CLIENT_CREDENTIAL = config('custom.silinda.client_credential');
        $this->SILINDA_SCOPE = config('custom.silinda.scope');
    }

    public function getToken()
    {
        Log::info($this->SILINDA_SCOPE);
        $response = Http::timeout(3)->asForm()->post($this->SILINDA_TOKEN_URL . '/oauth2/token', [
            'grant_type' => 'client_credentials',
            'scope' => $this->SILINDA_SCOPE,
        ]);

        Log::info($response);
    }
}
