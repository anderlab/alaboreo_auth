<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        
        return view('home');
    }
    public function listUsers(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $users = User::all();
        return view('admin',['users'=>$users]);
    }
}