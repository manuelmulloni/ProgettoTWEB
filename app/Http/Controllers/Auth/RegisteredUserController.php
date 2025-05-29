<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
            'username' => ['required', 'string', 'max:20', 'unique:utenti,username'],
            'nome' => ['required', 'string', 'max:20'],
            'cognome' => ['required', 'string', 'max:20'],
            'dataNascita' => ['required', 'date'],
            'telefono' => ['required', 'string', 'max:10'],
            'indirizzo' => ['required', 'string', 'max:255'],
            'profile_picture' => ['image', 'max:4000'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Log::debug("Validation passed, creating user");

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = basename($request->file('profile_picture')->store('profile_pics', 'local'));
            Log::debug("Profile picture uploaded to: " . $profilePicturePath);
        } else {
            Log::warning("No profile picture uploaded, using default");
            $profilePicturePath = 'default.jpg'; // Use a default image if none is provided
        }

        $user = User::create([
            'username' => $request->username,
            'nome' => $request->nome,
            'cognome' => $request->cognome,
            'dataNascita' => $request->dataNascita,
            'telefono' => $request->telefono,
            'indirizzo' => $request->indirizzo,
            'password' => Hash::make($request->password),
            'propic' => $profilePicturePath,
        ]);

        Log::debug("User created, firing Registered event");

        event(new Registered($user));

        Log::debug("User registered, logging in");

        Auth::login($user);

        Log::debug("User logged in, redirecting to dashboard");

        return redirect(route('primaview', absolute: false));
    }
}
