@extends('admin.index')
@section('content')
    {{--error case--}}

        <div style=" padding: 20px;
              background-color: #484848;
              color: white;
              opacity: 1;
              transition: opacity 0.6s;
              border-radius:7px;
              margin-bottom: 15px;">
              <span class="closebtn" style=" margin-left: 15px;
              color: white;
              font-weight: bold;
              float: right;
              font-size: 22px;
              line-height: 20px;
              cursor: pointer;
              transition: 0.3s;">&times;</span>
            total of lives is  <strong> {{count($Lives)}}</strong>
            <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                    close[i].onclick = function(){
                        var div = this.parentElement;
                        div.style.opacity = "0";
                        setTimeout(function(){ div.style.display = "none"; }, 600);
                    }
                }
            </script>
        </div>

    <div class="row">
        @foreach($Lives as $live)
        <div class="col-md-4 p-2">
            <div class="card text-center">
                <div class="card-header">
                    <img src="/storage/images/{{$live->img}}" class="card-img-top" alt="..." height="150px">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$live->title}}</h5>
                    <p class="card-text">With : {{$live->name}}.</p>
                    <a href="{{$live->link}}" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=1300,height=600,toolbar=1,resizable=0'); return false;" class="btn btn-dark mb-2">Watch</a>
                    <a href="{{route('deletLive', ['id' => $live->id])}}" class="btn btn-danger mb-2">Delete</a>
                                    </div>
                <div class="card-footer text-muted">
                    publishing date :{{$live->annee}}
                </div>
            </div>
        </div>
        @endforeach
    </div>




@endsection