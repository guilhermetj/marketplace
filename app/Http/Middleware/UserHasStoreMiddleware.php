<?php

namespace App\Http\Middleware;

use Closure;

class UserHasStoreMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($store = auth()->user()->store()->count()){
            return redirect()->route('stores.index')->with('message', 'Você já possui uma loja!');
        }
        return $next($request);
    }
}
