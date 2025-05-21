<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        logger('IsAdmin middleware triggered');
        $user = auth()->user();
        logger('User:', [$user]);

        if ($user && $user->isAdmin()) {
            logger('User is admin, proceeding to next middleware');
            return $next($request);

        }

        return redirect('/login');
    }
}
