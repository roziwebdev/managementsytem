<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

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
        } elseif ($request->user()->roles === 'kadeptdept') {
            $url = 'kadeptdept/dashboard';
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

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
