<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class  PHPIniMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        ini_set('upload_max_filesize', '500M');
        ini_set('max_execution_time', 600);
        ini_set('post_max_size', '500M');
        ini_set('memory_limit', '512M');
        return $next($request);
    }
}
