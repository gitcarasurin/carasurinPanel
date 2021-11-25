<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class dashboardContriller extends Controller
{
    public function dashboard(){

        return view('dashboard.index');
    }

    public function profile(){
        return view('dashboard.profile');
    }
}
