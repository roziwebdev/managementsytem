<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'roles' => ['required', 'string', 'max:255'],
            'departement' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'roles' => $request->roles,
            'departement' => $request->departement,
            'password' => Hash::make($request->password),
        ]);


        event(new Registered($user));

        Auth::login($user);

        $url = '';
        if ($request->user()->roles === 'ceo') {
            $url = 'ceo/dashboard';
        } elseif ($request->user()->roles === 'purchasing') {
            $url = 'purchasing/dashboard';
        } elseif ($request->user()->roles === 'dept') {
            $url = 'dept/dashboard';
        } elseif ($request->user()->roles === 'kadeptdept') {
            $url = 'kadeptdept/dashboard';
        }elseif ($request->user()->departement === 'sales' && $request->user()->roles === 'dept' ) {
            $url = 'sales/dashboard';
        }  elseif ($request->user()->departement === 'prodev' && $request->user()->roles === 'dept' ) {
            $url = 'prodev/dashboard';
        }

        return redirect()->intended($url);
    }
}
