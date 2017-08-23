<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Mail\Welcome;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration.create');
    }  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationRequest $request)
    {
        $data = request(['name', 'email', 'password']);
        $data['password'] = bcrypt(request()->password);

        // Create and save new user
        $user = User::create($data);

        // Sing them in
        auth()->login($user);

        Mail::to($user)->send(new Welcome($user));

        session()->flash('message', 'Thanks so much for signing up');

        return redirect()->home();
    }  

}
