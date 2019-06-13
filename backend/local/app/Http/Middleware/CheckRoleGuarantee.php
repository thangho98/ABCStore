<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckRoleGuarantee
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
                    case "/abcstore/backend/admin/guarantee/add":
                        return redirect()->intended('admin/home');
                }
                if(strpos($uri,"/abcstore/backend/admin/guarantee/edit/") !== false){
                    return redirect()->intended('admin/home');
                }
                break;
            case 2:
                return redirect()->intended('admin/orders');
                break;
        }
        return $next($request);
    }
}