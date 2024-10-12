<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function index(){
        return view('layouts.template');
    }
    public function landing_page(){
        $user = Auth::user();
        return view('welcome',compact('user'));
    }
}
