<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (Auth::id() == null) {
            toastr()->error('Bạn chưa đăng nhập!');
            return redirect()->route('login.index');
        }
        // Kiểm tra xem người dùng có quyền admin hay không
        if ($user->role === '0') {
            // Người dùng là admin
            return $next($request);
        } else {
            // Người dùng là nomal user
            toastr()->error('Bạn không có quyền truy cập!');
            return redirect()->route('home.index');
        }
    }
}
