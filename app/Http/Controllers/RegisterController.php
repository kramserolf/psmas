<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }

    public function update(Request $request, $id)
    {
        $confirmed = User::find($id);
        $confirmed->app_status = 'Approved';
        $confirmed->save();
            return redirect()->back();

        // DB::table('users')
        // ->where('id', $id)
        // ->update([
        //     'app_status'     => "Approved"
        // ]);
    }
}
