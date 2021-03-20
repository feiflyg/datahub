<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class APIGroupController extends BaseController
{
    use ValidatesRequests;

    public function index($platformId)
    {
    }
}
