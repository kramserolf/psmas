<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        return view('home.index');
    }

    public function review(Request $request)
    {
        $user = User::find($request->id);

        return response()->json($user);
    }
}
