<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('register.index');
    }

    public function store(Request $request)
    {
        $date = $request->all();
        dd($date);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => [
                'required', 'string', 'max:50', 'email', 'unique:users'
            ],
            'password' => [
                'required', 'string', 'min:7', 'max:50', 'confirmed'
            ],
            'agreement' => ['accepted'],
        ]);

        User::query()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('home');
    }
}
