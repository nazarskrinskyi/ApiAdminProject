<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Controllers\Controller;
use App\Services\Movie\Service;

class BaseController extends Controller
{
    public Service $service;

    public function __construct(Service $service)
    {

        $this->service = $service;
    }



}
