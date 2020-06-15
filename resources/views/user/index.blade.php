@extends('user.user')
@section('head')
  <style>
    #cart{
      border: solid 2px black;
    }
    #cart:hover{
      border: solid 2px #484848;
      box-shadow: #151515 0px 10px 10px ;
    }
    #search{
      border: 2px solid rgba(213, 12, 7, 0.69);
      background-color:  #ffffff ;
      width: 500px;

    }
    #search::placeholder {
      color: rgba(213, 12, 7, 0.69);
      font-weight: bolder;
      opacity: 1; /* Firefox */
    }
    #search::content {
      color:rgba(213, 12, 7, 0.69) ;
      font-weight: bolder;
      opacity: 1; /* Firefox */
    }
  </style>

  @endsection
@section('user')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('user/img/1.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Zid Khmm @lang('messages.live') </h1>
            <span class="subheading">@lang('messages.lives')</span>
            <br>
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="get" action="{{route('sherch_user')}}">
              {{csrf_field()}}
              <div class="input-group">
                <input class="form-control "id="search" name="search" value="{{old('search')}}"
                       type="text" placeholder="@lang('messages.Search for Lives') ..." aria-label="Search" aria-describedby="basic-addon2" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>


  <!-- Main Content -->
  @if (count($Lives)==0)
    <div style=" padding: 20px;
              background-color: #f44336;
              margin:0 5%;
              color: white;
              opacity: 1;
              transition: opacity 0.6s;
              border-radius:7px;
              margin-bottom: 15px;">
      {{--<span class="closebtn" style=" margin-left: 15px;--}}
      {{--color: white;--}}
      {{--font-weight: bold;--}}
      {{--float: right;--}}
      {{--font-size: 22px;--}}
      {{--line-height: 20px;--}}
      {{--cursor: pointer;--}}
      {{--transition: 0.3s;">&times;</span>--}}
      <strong>ooops!</strong> There is no live in Zid Khmm with this name <a class=" " style="margin-left: 60%" href="/"><i class="fa fa-home mr-2"></i>Home</a>
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
  @endif
  <div class="container">
    <div class="row text-center">
      @foreach($Lives as $live)
        <div class="col-lg-3 col-md-6 mb-4 " >
          <div class="card h-100" id="cart" >
            <img class="card-img-top" src="/storage/images/{{$live->img}}" alt="">
            <div class="card-body">
              <h4 class="card-title">{{$live->title}} </h4>
              <p class="card-text">@lang('messages.with') : {{$live->name}}</p>
              <div class="text-muted ">
                @lang('messages.publishing date') :{{$live->annee}}
              </div>
            </div>
            <div class="card-footer">
              <a href="{{$live->link}}" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=1300,height=600,toolbar=1,resizable=0'); return false;" class="btn btn-danger mb-2 w-75">@lang('messages.watch')</a>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
  <hr>


@endsection
