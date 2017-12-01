<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class NhomQuyenMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'nhanvien')
    {
        $actions = $request->route()->getAction();
        $quyen = isset($actions['quyen']) ? $actions['quyen'] : null;
        
        if(Auth::guard('nhanvien')->user()->quyentruycap($quyen) || !$quyen)
        {
            return $next($request);
        }

        return redirect()->route('dashboard');
    }
}
