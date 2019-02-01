@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <div class="card-body">

                    
         
                    <form action="{{route('messages.store')}}" method="post">
                        @csrf
                        Nombre*:<br>
                        <input type="text" name="name" class="{{ $errors->has('name') ? 'alert-danger':''}}" value="{{old('name')}}" placeholder="Ester Colero">
                        <br>
                        Email*:<br>
                        <input type="text" name="email" class="{{ $errors->has('email') ? 'alert-danger':''}}" value="{{old('email')}}" placeholder="email@email.com">
                        <br>
                        Asunto*:<br>
                        <input class="{{ $errors->has('subject') ? 'alert-danger':''}}" value="{{old('subject')}}" type="text" name="subject" placeholder="Barbacoa">
                        <br>
                        Mensaje*:<br>
                        <textarea type="text" name="message" class="{{ $errors->has('message') ? 'alert-danger':''}}" placeholder="El jueves barbacoa a las 13:30"></textarea>
                        <br>
                        <br><br>
                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Enviar">
                      </form> 
  
                      @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
<a href="{{route('messages.index')}}"> Volver a la lista de mensajes
@endsection
