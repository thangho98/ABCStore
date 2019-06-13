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
            case 1:
                $uri = $request->getRequestUri();
                switch ($uri) {
                    case "/abcstore/backend/admin/invoice/add":
                    case "/abcstore/backend/admin/invoice/delete":
                    case "/abcstore/backend/admin/orders/add":
                        return redirect()->intended('admin/home');
                }
                if(strpos($uri,"/abcstore/backend/admin/invoice/edit/") != false
                    || strpos($uri,"/abcstore/backend/admin/orders/cart/") != false
                    ){
                    return redirect()->intended('admin/home');
                }
                break;
            case 3:
                return redirect()->intended('admin/guarantee');
                break;
        }
        return $next($request);
    }
}