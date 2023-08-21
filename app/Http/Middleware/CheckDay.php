<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDay
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Open Path For Today Monday
        $today = date('D'); // 'Mon'
        if($today ==='Mon') {
            return redirect()->to('/system-closed');
        }

        return $next($request);
    }
}