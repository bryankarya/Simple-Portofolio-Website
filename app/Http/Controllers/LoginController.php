<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');  // Return the login view
    }

    public function login(Request $request)
    {
        // Validate the login form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // Attempt to login with the given credentials
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Check if the logged-in user is an admin
            if (Auth::user()->email == 'admin@bryanportofolio.com') {
                return redirect()->route('about.index');  // Redirect to admin dashboard on success
            }
    
            return redirect()->route('home');  // Redirect to home if not admin
        } else {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();  // Error message on failure
        }
    }
    
}

