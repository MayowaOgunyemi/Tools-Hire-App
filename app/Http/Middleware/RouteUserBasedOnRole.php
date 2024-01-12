<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RouteUserBasedOnRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->user() && $request->user()->role == 'admin') {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');


        // if (Auth::check()) {
        //     switch (auth()->user()->role) {
        //         case 'customer':
        //             return redirect('/');
        //             break;
        //         case 'moderator':
        //             return redirect('/');
        //             break;
        //         case 'admin':
        //             return redirect('/manage/users');
        //             break;
        //     }
        // }
        // return $next($request);
    }
}
