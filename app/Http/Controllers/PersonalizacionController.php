<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalizacionController extends Controller
{
    public function personalizar(){
        $color_fondo = \Request::cookie('color', 'white');
    
        return view('home', [
            'color' => $color_fondo
        ]);
    }

    public function guardarpersonalizacion(Request $request){
        $this->validate($request, [
            'color' => 'required'
        ]);
        return redirect('/home')
            ->withCookie(cookie('color', $request->input('color'), 60 * 24 * 365));
    }
}
