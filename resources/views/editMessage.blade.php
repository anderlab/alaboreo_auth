@extends('layouts.app')

@section('content')


<table class="table table-hover">
    <thead>
        <tr>
            <th>Enviado por:</th>
            <th>Con email:</th>
            <th>Asunto</th>
            <th>Anterior mensaje</th>
            <th>Fecha</th>
            
        </tr>
    </thead>
    <tbody id="items">
        <form class="form" action="{{route('messages.update',$message->id)}}" method="post" >
            @csrf
            @method('put')
            <tr>
                
                @method('PUT')
                <td>{{$message->name }}</td>
                <td>{{$message->email}}</td>
                <td>{{$message->subject}}</td>
                <td>{{$message->message}}</td>
                <td>{{$message->created_at}}</td>
                
                
            </tr>
        </form>
    </tbody>
</table>

<form class="form" action="{{route('messages.update',$message->id)}}" method="post" >
    @csrf
    @method('put')
    <label for="name">Nuevo Mensaje:</label>
    <br>
    <div class="form-line">
        <input type="text" class="form-control" name="newMessage" placeholder="{{$message->message}}" />
    </div>
    <br>
    <br>
    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Cambiar</button>
</form>


<form class="form" action="{{route('messages.destroy',$message->id)}}" method="POST" >
    @csrf
    @method('DELETE')
    
    <button type="submit" class="btn btn-danger waves-effect">Eliminar</button>
    
</form>
<a href="{{route('messages.index')}}"> Volver a la lista de mensajes
@endsection