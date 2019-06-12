<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckRoleAdmin
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
        $perm = Session::get('user')->perm_id;
        switch ($perm) {
            case 2:
                return redirect()->intended('admin/orders');
                break;
            
            case 3:
                return redirect()->intended('admin/guarantee');
                break;

            case 4:
                return redirect()->intended('admin/invoice');
                break;
        }
        return $next($request);
    }
}