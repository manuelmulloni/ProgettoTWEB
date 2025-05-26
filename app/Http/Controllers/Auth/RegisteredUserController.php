<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\User;
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
        Log::debug("Starting method store in RegisteredUserController");
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed'],
        ]);

        Log::debug("Validation passed, creating user");

        $user = User::create([
            'username' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        Log::debug("User created, firing Registered event");

        event(new Registered($user));

        Log::debug("User registered, logging in");

        Auth::login($user);

        Log::debug("User logged in, redirecting to dashboard");

        return redirect(route('primaview', absolute: false));
    }
}
