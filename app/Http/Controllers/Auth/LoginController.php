<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //    dd($request->email);
        $this->validate($request, [

            'email' => 'required|email|',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->password == $request->password) {
                return redirect()->route('dashboard');

            }

        } else {
            return back()->with('status', 'Invalid login details');

        }

           if (!auth()->attempt($request->only('email','password'))){
               return back()->with('status', 'Invalid login details');
           }


//        $this->validate($request, [
//         'username'    => 'required',
//         'password' => 'required',
//     ]);

//     $login_type = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL ) 
//         ? 'email' 
//         : 'username';

//     $request->merge([
//         $login_type => $request->input('username')
//     ]);

//     if (Auth::attempt($request->only($login_type, 'password'))) {
//        return redirect()->route('dashboard');

//     }
// return back()->with('status', 'These credentials do not match our records.');

   
    } 





    

}
