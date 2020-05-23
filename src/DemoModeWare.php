<?php

namespace DGvai\DemoMode;

use Closure;

class DemoModeWare
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
        if(config('demomode.enabled'))
        {
            return redirect()->back()->with(config('demomode.flash'),config('demomode.msg'));
        }
        return $next($request);
    }
}