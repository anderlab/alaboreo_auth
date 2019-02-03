<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests\NewMessageRequest;
use Auth;

class MessageController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $messages = Message::all();
        return view('/messages',['messages'=>$messages]);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('newMessage');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(NewMessageRequest $request)
    {
        $validated = $request->validated();
        $message= new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');
        $message->save();
        $request->session()->put('sendOk', 'Mensaje enviado con exito');
        return redirect()->action('MessageController@index');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        
        if (Message::where('id',$id)->exists()) {
            $message= Message::find($id);
            return view('/message',['message'=>$message]);
            
        }else{
            abort(404);
        }
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        if (Message::where('id',$id)->exists()) {
            $message= Message::find($id);
            if (Auth::user()) {
                return view('/editMessage')->with('message', $message);
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $message=Message::find($id);
        
        $message->message = $request->input('newMessage');
        $message->save();
        $request->session()->put('editOk', 'Mensaje editado con exito');
        return view('/message',['message'=>$message]);
        
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id, Request $request)
    {
        $message = Message::find($id);
        if (Auth::user()){
          $message->delete();
          $request->session()->put('deleteOk', 'Mensaje eliminado con exito');
          return redirect()->action('MessageController@index');
        }else{
          abort(404);
        }
    }
}
