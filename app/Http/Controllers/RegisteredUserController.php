<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Pest\Exceptions\TestCaseClassOrTraitNotFound;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        //validate
        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'], //checks if the fieldName_confirmation (here password_confirmation) attribute and this one match
        ]);

        //create the user
        $user = User::create($validatedAttributes);

        //log in
        Auth::login($user);

        //redirect
        return redirect('/jobs');
    }
}
