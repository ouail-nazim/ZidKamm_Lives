@extends('admin.index')
@section('content')
    <div class="card">
        <div class="card-header">
           email: {{$message->email}}
        </div>
        <div class="card-body">
            <h5 class="card-title">from:{{$message->firstName}} {{$message->lastName}}</h5>
            <p class="card-text">{{$message->message}}.</p>
            <a href="{{route('mesMessage')}}" class="btn btn-success">Go to BOX message</a>
            <a href="/deleteMessage/{{$message->id}}" class="btn btn-danger">delete message</a>
            <a href="#" class="btn btn-dark ">send a message to :{{$message->email}}</a>
        </div>
    </div>
@endsection