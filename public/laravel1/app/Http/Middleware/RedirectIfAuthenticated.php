<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $url = '';
                if ($request->user()->roles === 'ceo') {
                    $url = 'ceo/dashboard';
                } elseif ($request->user()->roles === 'purchasing') {
                    $url = 'purchasing/dashboard';
                } elseif ($request->user()->departement === 'sales' && $request->user()->roles === 'dept' ) {
                    $url = 'sales/dashboard';
                } elseif ($request->user()->departement === 'prodev' && $request->user()->roles === 'dept' ) {
                    $url = 'prodev/dashboard';
                } elseif ($request->user()->roles === 'dept') {
                    $url = 'dept/dashboard';
                } elseif ($request->user()->roles === 'kadept') {
                    $url = 'kadept/dashboard';
                }elseif ($request->user()->roles === 'manager') {
                    $url = 'manager/dashboard';
                }elseif ($request->user()->roles === 'vendor') {
                    $url = 'formsupplier';
                } elseif ($request->user()->roles === 'vendorpp') {
                    $url = 'formsupplierkertas';
                } elseif ($request->user()->roles === 'vendorekp') {
                    $url = 'formsupplierekspedisi';
                } elseif ($request->user()->roles === 'user') {
                    $url = 'user/dashboard';
                }

                return redirect()->intended($url);
            }
        }

        return $next($request);

        return $next($request);
    }
}
