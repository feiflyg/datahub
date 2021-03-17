<?php

namespace App\Http\Lessor\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class LesseeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
