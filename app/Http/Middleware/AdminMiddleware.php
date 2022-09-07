<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    // admin role is 1 
    //user role is 0
    {
        if(Auth::check()){
            if(Auth::users()->role === 1)
            {
                return redirect('admin');
            }

            else{
                redirect ('/login')->with('message', 'Anda Tidak Mempunyai Hak Akses! ');
            }
            
        }
        else{
            redirect ('/register')->with('message', 'Daftar Untuk Mendapat Hak Akses Informasi! ');
        }
        return $next($request);
    }
}
