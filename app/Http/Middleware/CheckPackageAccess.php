<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPackageAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if (!$user->package_id || $user->package_expires_at < now()) {
            return redirect()->route('dashboard')->with('error', 'You must choose or renew a package.');
        }

        return $next($request);
    }

}
