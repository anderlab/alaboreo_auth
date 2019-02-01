@extends('layouts.app')

@section('content')


<table class="table table-hover">
        <thead>
            <tr>
                <th>Enviado por:</th>
                <th>Con email:</th>
                <th>Asunto</th>
                <th>Mensaje</th>
                <th>Fecha</th>

            </tr>
        </thead>
        <tbody id="items">
            
            <tr>
                {{-- <td><a href="/messages/{{ $message->id }}">{{ $message->name }}</a></td> --}}
                <td>{{ $message->name }}</a></td>
                <td>{{$message->email}}</td>
                <td>{{$message->subject}}</td>
                <td>{{$message->message}}</td>
                <td>{{$message->created_at}}</td>
                <td><a href="{{route('messages.edit', $message->id)}}"><button class="btn btn-primary m-t-15 waves-effect">Editar</button></a>
            </tr>
    
        </tbody>
    </table>
    @if (Session::has('editOk'))
    <div class="alert alert-success">{!! Session::get('editOk') !!}</div>
    @endif
    
    <a href="{{route('messages.index')}}"> Volver a la lista de mensajes
@endsection