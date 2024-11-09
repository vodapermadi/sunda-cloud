<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index():View
    {
        if(Auth::user()->level === 'user'){
            return view('dashboard');
        }else if(Auth::user()->level === 'admin'){
            return view('admin.dashboard');
        }
    }
}
