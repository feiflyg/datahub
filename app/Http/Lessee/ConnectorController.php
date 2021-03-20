<?php

namespace App\Http\Lessee;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ConnectorController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
