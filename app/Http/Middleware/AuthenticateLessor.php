<?php

namespace App\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

/**
 * AuthenticateLessor class
 * @author fg <feiguang@aliyun.com>
 * @version 0.0.1
 */
class AuthenticateLessor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->id == 1){
            return $next($request);
        }
        throw new MethodNotAllowedHttpException([],'权限不足');
    }
}
