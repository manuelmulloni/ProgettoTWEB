<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class IsCliente
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        logger('IsCliente middleware triggered');
        $user = $request->user();
        logger('User:', [$user]);

        if ($user && $user->isCliente()) {
            logger('User is cliente, proceeding to next middleware');
            return $next($request);

        }

        return redirect('/login');
    }
}
