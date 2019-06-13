<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckRoleSaleAndInvoice
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
            case 3:
                return redirect()->intended('admin/guarantee');
                break;
        }
        return $next($request);
    }
}