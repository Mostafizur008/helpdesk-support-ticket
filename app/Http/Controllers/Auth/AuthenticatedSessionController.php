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
    protected $redirectTo = RouteServiceProvider::HOME;

    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
    
        return redirect($this->redirectTo());
    }
    

    public function redirectTo()
    {
        $auth = Auth::user();

        if ($auth->role == '1') {
            return $this->redirectTo = route('backend.dashboard.admin.index');
        } elseif ($auth->role == '0') {
            return $this->redirectTo = route('backend.dashboard.user.index');
        }

        $this->middleware('guest')->except('logout');
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
