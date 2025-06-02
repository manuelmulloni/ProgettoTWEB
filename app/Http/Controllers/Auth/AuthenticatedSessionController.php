<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
        logger('Step 1: Avvio autenticazione');

        $request->authenticate();
        logger('Step 2: Autenticazione riuscita');

        $request->session()->regenerate();
        logger('Step 3: Sessione rigenerata');

        $user = Auth::user();

        if (!$user) {
            logger('Step 4: Nessun utente autenticato trovato');
            abort(401, 'Utente non autenticato');
        }

        logger('Step 4: Utente autenticato: ' . $user->username);
        logger('Step 5: Livello utente: ' . $user->livello);

        if ($user->isAdmin()) {
            logger('Step 6: Utente è admin - redirect a /admin');
            return redirect()->route('admin');
        }

        //Redirect personalizzato con isStaff()
        if ($user->isStaff()) {
            return redirect()->route("agenda");
        }
        //Redirect personalizzato con isCliente()
        if ($user->isCliente()) {
            return redirect()->intended('/cliente');
        }

        return redirect()->intended(RouteServiceProvider::HOME);

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
