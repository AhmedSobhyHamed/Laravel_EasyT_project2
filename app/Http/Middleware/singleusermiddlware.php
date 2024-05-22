<?php

namespace App\Http\Middleware;

use App\Models\BlogPost;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\isNull;

class singleusermiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(isNull($request->route('id')->auther))
            if($request->route('id')->auther !==  Auth::id())
                return redirect(route('postAll'));
        return $next($request);
    }
}
