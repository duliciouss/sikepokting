<?php

namespace App\Http\Controllers;

use App\Services\SilindaApiService;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    public function __construct(SilindaApiService $silindaApiService)
    {
        $this->silindaApiService = $silindaApiService;
    }

    public function index()
    {
        $this->silindaApiService->getToken();
    }
}
