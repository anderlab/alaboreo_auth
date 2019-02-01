@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <div class="card-body">
                    
                        @if (Session::has('deleteOk'))
                        <div class="alert alert-success">{!! Session::get('deleteOk') !!}</div>
                        @endif
                        @if (Session::has('sendOk'))
                        <div class="alert alert-success">{!! Session::get('sendOk') !!}</div>
                        @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Asunto</th>
                                <th>Mensaje</th>
                                
                            </tr>
                        </thead>
                        <tbody id="items">
                            @foreach ($messages as $message)
                            <tr>
                                <td><a href="{{route('messages.show',$message->id)}}">{{ $message->id }}</a></td>
                                <td>{{$message->name}}</td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->subject}}</td>
                                <td>{{$message->message}}</td>
                                <td>{{$message->created_at}}</td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                        <td><a href="{{route('messages.create')}}"><button class="btn btn-primary m-t-15 waves-effect">Nuevo mensaje</button></a>
                        </table>
           
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    