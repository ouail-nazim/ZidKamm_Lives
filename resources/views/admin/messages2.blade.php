@extends('admin.index')
@section('head')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        @import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700);
        /*Navbar*/
        .navbar-default {
            background-color:#fff;
            border-bottom-color:#E3E3E3;

        }
        .navbar-default .navbar-nav>.active>a,
        .navbar-default .navbar-nav>.active>a:hover,
        .navbar-default .navbar-nav>.active>a:focus{
            background-color:transparent!important;
        }
        .navbar-default .btn-compose {
            padding-right:10px;
            border-right:1px solid #F0F0F0;
        }
        /*Forms setup*/
        .form-control {
            border-radius:0;
            box-shadow:none;
            height:auto;
        }
        .float-label{
            font-size:10px;
        }
        input[type="text"].form-control,
        input[type="search"].form-control{
            border:none;
            border-bottom:1px dotted #CFCFCF;
        }
        textarea {
            border:1px dotted #CFCFCF!important;
            height:130px!important;
        }
        /*Content Container*/
        .content-container {
            background-color:#fff;
            padding:35px 20px;
            margin-bottom:20px;
        }
        h1.content-title{
            font-size:32px;
            font-weight:300;
            text-align:center;
            margin-top:0;
            margin-bottom:20px;
            font-family: 'Open Sans', sans-serif!important;
        }
        /*Compose*/
        .btn-send{
            text-align:center;
            margin-top:20px;
        }
        /*mail list*/

        ul.mail-list{
            padding:0;
            margin:0;
            list-style:none;
            margin-top:30px;
        }
        ul.mail-list li a{
            display:block;
            border-bottom:1px dotted #CFCFCF;
            padding:20px;
            text-decoration:none;
        }
        ul.mail-list li:last-child a{
            border-bottom:none;
        }
        ul.mail-list li a:hover{
            background-color:#DBF9FF;
        }
        ul.mail-list li span{
            display: flex;
            flex-direction: column;
        }
        ul.mail-list li span.mail-sender{
            font-weight:600;
            color:#8F8F8F;
        }
        ul.mail-list li span.mail-subject{
            color:#8C8C8C;
        }
        ul.mail-list li span.mail-message-preview{
            display:block;
            color:#A8A8A8;
        }
        .mail-search{
            border-bottom-color:#7FBCC9!important;
        }
    </style>
@endsection
@section('content')

    <!------ Include the above in your HEAD tag ---------->

    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="btn-compose pull-left">
                    <a type="button" class="btn btn-danger navbar-btn" href="#compose" role="tab" data-toggle="tab"> <span class="glyphicon glyphicon-pencil"></span> Compose</a>
                </div>
                <ul class="navbar-nav nav" style=" display: flex;
                    flex-direction: row;">
                    <li class="nav-item"><a href="#inbox" role="tab" data-toggle="tab">All messages <span class="label label-info">{{count($all)}}</span></a></li>
                    <li><a href="#draft" role="tab" data-toggle="tab">messages not seen <span class="label label-danger">{{count($nonvu)}}</span></a></li>
                    <li><a href="#trash" role="tab" data-toggle="tab">messages  seen <span class="label label-success">{{count($vu)}}</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="tab-content">
        <div class="tab-pane active" id="inbox">

            <div class="container">
                <div class="content-container clearfix">
                    <div class="col-md-12">
                        <h1 class="content-title">All messages</h1>
                        <ul class="mail-list">
                            @foreach($all as $msg)
                                <li>
                                    <a href="/see?id={{$msg->id}}" >
                                        <i class="fas @if($msg->vue == true) fa-eye text-success  @else fa-eye-slash text-danger  @endif"></i>
                                        <span class="mail-sender">{{$msg->firstName}}-{{$msg->lastName}}</span>
                                        <span class="mail-subject">{{$msg->email}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab-pane" id="compose">

            <div class="container">
                <div class="content-container clearfix">
                    <h1 class="content-title">Compose</h1>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input id="tokenfield" type="text" class="form-control" placeholder="To" />
                        </div>
                        <textarea class="form-control" placeholder="message"></textarea>
                        <div class="btn-send">
                            <button class="btn btn-success btn-lg"><span class="glyphicon glyphicon-send"></span> Send</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <div class="tab-pane" id="draft">

            <div class="container">
                <div class="content-container clearfix">
                    <div class="col-md-12">
                        <h1 class="content-title">messages not seen</h1>
                        <ul class="mail-list">
                            @foreach($nonvu as $msg)
                                <li>
                                    <a href="/see?id={{$msg->id}}" >
                                        <i class="fas @if($msg->vue == true) fa-eye text-success  @else fa-eye-slash text-danger  @endif"></i>
                                        <span class="mail-sender">{{$msg->firstName}}-{{$msg->lastName}}</span>
                                        <span class="mail-subject">{{$msg->email}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab-pane" id="trash">

            <div class="container">
                <div class="content-container clearfix">
                    <div class="col-md-12">
                        <h1 class="content-title">messages seen</h1>
                        <ul class="mail-list">
                            @foreach($vu as $msg)
                                <li>
                                    <a href="/see?id={{$msg->id}}" >
                                        <i class="fas @if($msg->vue == true) fa-eye text-success  @else fa-eye-slash text-danger  @endif"></i>
                                        <span class="mail-sender">{{$msg->firstName}}-{{$msg->lastName}}</span>
                                        <span class="mail-subject">{{$msg->email}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        !function(a,b){function g(b,c){this.$element=a(b),this.settings=a.extend({},f,c),this.init()}var e="floatlabel",f={slideInput:!0,labelStartTop:"20px",labelEndTop:"10px",paddingOffset:"10px",transitionDuration:.3,transitionEasing:"ease-in-out",labelClass:"",typeMatches:/text|password|email|number|search|url/};g.prototype={init:function(){var a=this,c=this.settings,d=c.transitionDuration,e=c.transitionEasing,f=this.$element,g={"-webkit-transition":"all "+d+"s "+e,"-moz-transition":"all "+d+"s "+e,"-o-transition":"all "+d+"s "+e,"-ms-transition":"all "+d+"s "+e,transition:"all "+d+"s "+e};if("INPUT"===f.prop("tagName").toUpperCase()&&c.typeMatches.test(f.attr("type"))){var h=f.attr("id");h||(h=Math.floor(100*Math.random())+1,f.attr("id",h));var i=f.attr("placeholder"),j=f.data("label"),k=f.data("class");k||(k=""),i&&""!==i||(i="You forgot to add placeholder attribute!"),j&&""!==j||(j=i),this.inputPaddingTop=parseFloat(f.css("padding-top"))+parseFloat(c.paddingOffset),f.wrap('<div class="floatlabel-wrapper" style="position:relative"></div>'),f.before('<label for="'+h+'" class="label-floatlabel '+c.labelClass+" "+k+'">'+j+"</label>"),this.$label=f.prev("label"),this.$label.css({position:"absolute",top:c.labelStartTop,left:f.css("padding-left"),display:"none","-moz-opacity":"0","-khtml-opacity":"0","-webkit-opacity":"0",opacity:"0"}),c.slideInput||f.css({"padding-top":this.inputPaddingTop}),f.on("keyup blur change",function(b){a.checkValue(b)}),b.setTimeout(function(){a.$label.css(g),a.$element.css(g)},100),this.checkValue()}},checkValue:function(a){if(a){var b=a.keyCode||a.which;if(9===b)return}var c=this.$element,d=c.data("flout");""!==c.val()&&c.data("flout","1"),""===c.val()&&c.data("flout","0"),"1"===c.data("flout")&&"1"!==d&&this.showLabel(),"0"===c.data("flout")&&"0"!==d&&this.hideLabel()},showLabel:function(){var a=this;a.$label.css({display:"block"}),b.setTimeout(function(){a.$label.css({top:a.settings.labelEndTop,"-moz-opacity":"1","-khtml-opacity":"1","-webkit-opacity":"1",opacity:"1"}),a.settings.slideInput&&a.$element.css({"padding-top":a.inputPaddingTop}),a.$element.addClass("active-floatlabel")},50)},hideLabel:function(){var a=this;a.$label.css({top:a.settings.labelStartTop,"-moz-opacity":"0","-khtml-opacity":"0","-webkit-opacity":"0",opacity:"0"}),a.settings.slideInput&&a.$element.css({"padding-top":parseFloat(a.inputPaddingTop)-parseFloat(this.settings.paddingOffset)}),a.$element.removeClass("active-floatlabel"),b.setTimeout(function(){a.$label.css({display:"none"})},1e3*a.settings.transitionDuration)}},a.fn[e]=function(b){return this.each(function(){a.data(this,"plugin_"+e)||a.data(this,"plugin_"+e,new g(this,b))})}}(jQuery,window,document);


        $(document).ready(function(){
            $('.form-control').floatlabel({
                labelClass: 'float-label',
                labelEndTop: 5
            });
        });
    </script>
@endsection

