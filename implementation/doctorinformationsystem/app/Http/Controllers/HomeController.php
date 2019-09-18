<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    public function welcome()
    {
        $doctors = \App\User::whereHas('role', function($role) {
            $role->where('name', 'doctor');
        })->distinct()->get();

        $slider = \App\Slider::latest()->limit(5)->get();

        $posts = \App\Post::latest()->limit(4)->get();

        return view('welcome', compact('doctors', 'slider', 'posts'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    
}
