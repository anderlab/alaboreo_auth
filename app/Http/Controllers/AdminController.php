<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function __construct()
    {
      $this->middleware('admin');
    }
    public function index()
    {
        $users = User::all();
        return view('admin',['users'=>$users]);
    }
    // public function messages()
    // {
    //   $messages = Form::all();
    //   return view('pages/admin/messages',['messages'=>$messages]);
    // }
 
}