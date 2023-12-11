<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function index(){
        return view('admin.dashboard');


    }
    public function adminuser(){
        $user=User::all();
        return view('admin.user.index',compact('user'));
    }

    public function adminuserdetail($id){
        $user=User::find($id);
        return view('admin.user.view',compact('user'));
    }
}
