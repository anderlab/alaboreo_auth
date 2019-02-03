@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    @if(Auth::user()->hasRole('admin'))
                    <div>Acceso como administrador</div>
                    <a href="{{route('admin.index')}}">Ir a la lista de usuarios
                        @else
                        <div>Acceso usuario</div>
                        <a href="{{route('messages.index')}}">Ir a la lista de mensajes
                            <a href="{{route('messages.create')}}">
                                <br>
                                <button class="btn btn-primary m-t-15 waves-effect">Nuevo mensaje</button></a>
                                @endif
                                <br>
                                
                            </div>
                        </div>
                        <div style="width:400px; height:200px; background-color:{{$color}}">
                            <p>Color: {{$color}}</p>
                            <form action="/home" method="post">
                                @csrf
                                Color: 
                                <select name="color">
                                    <option value="red">Rojo</option>
                                    <option value="green">Verde</option>
                                    <option value="white">Blanco</option>
                                </select>
                                <br />
                                <input type="submit" value="Enviar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
            