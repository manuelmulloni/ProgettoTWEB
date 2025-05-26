<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isStaff
{


    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        logger('IsStaff middleware triggered');
        $user = $request->user();
        logger('User:', [$user]);

        if ($user && $user->isStaff()) {
            logger('User is admin, proceeding to next middleware');
            return $next($request);

        }

        return redirect('/login');
    }
}
