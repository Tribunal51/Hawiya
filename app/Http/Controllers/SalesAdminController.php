<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class SalesAdminController extends Controller
{
    //

    public function createUser(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'lang' => 'required|string'
        ]);
        $password = $request->password;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'lang' => $request->lang
        ]);
        if(!$user) {
            return redirect()->back()->with('error', 'User could not be created.');
        }
        return redirect()->back()->with('success', 'User created. Login credentials: Email ('.$user->email.'), Password ('.$password.')');
    }
}
