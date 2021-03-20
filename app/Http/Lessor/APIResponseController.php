<?php

namespace App\Http\Lessor;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class APIResponseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
