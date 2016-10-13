<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset=utf-8>
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name=description content="">
    <meta name=author content="">
    <meta id="token" name="token" content="{ { csrf_token() } }">

    <link rel=icon href=/Content/AssetsBS3/img/favicon.ico>
    <title>實在好家在</title>
    
    <link href="{{ URL::asset('dist/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/bootstrap-theme.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/bootstrap-nav.css')}}" rel=stylesheet>
    <link href="{{ URL::asset('dist/css/main.css')}}" rel=stylesheet>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/css/main-mobile.css')}}" media="screen and (max-width: 768px)">
    <link href="{{ URL::asset('dist/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('dist/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" media="screen">
    
    <link rel="stylesheet" href="{{ URL::asset('dist/css/countrySelect.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('dist/css/parsley.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('dist/css/ladda.min.css')}}">

    <!--[if lt IE 9]><script src=~/Scripts/AssetsBS3/ie8-responsive-file-warning.js></script><![endif]-->
    
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/jquery.form.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/tab.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/locales/bootstrap-datetimepicker.zh-TW.js')}}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/main.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/parsley.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/zh_tw.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/ajax.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/spin.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/vue.js')}}"></script>

    <script type="text/javascript" src="{{ URL::asset('dist/js/ladda.min.js')}}"></script>

    <!--[if lt IE 9]><script src=https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js></script><script src=https://oss.maxcdn.com/respond/1.4.2/respond.min.js></script><![endif]-->
</head>

<body role=document>
    <nav class="navbar navbar-inverse navbar-fixed-top row" role=navigation>
        <div class=container >
            <div class=navbar-header>
                <button type=button class="navbar-toggle collapsed" data-toggle=collapse data-target=#navbar aria-expanded=true aria-controls=navbar> <span class=icon-bar></span> <span class=icon-bar></span> <span class=icon-bar></span> </button> </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav main-nav">
                    <li class=active><a href={{ url('/') }}>實在好家</a>
                        <li><a href=#about>實在好文</a>
                            <li><a href=#contact>實在好物</a>
                </ul>
<script>
  (function() {
    var cx = '001140125767615435562:1gusupifij8';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
                <ul class="nav navbar-nav navbar-right nav-login">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">登入</a></li>
                        <li><a href="{{ url('/register') }}">註冊</a></li>
                    @else
                    
                    <li class="dropdown"><a id="notified" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-envelope "></span></a>

                        <ul class="dropdown-menu" role="menu">

                                @foreach($mails as $m)
                                @if ($m->type ==('推薦')||$m->type ==('留言')||$m->type ==('收藏'))
                                <a href="{{URL::asset('tasks').'/'.$m->task_id}}"><li style="padding: 10px;
    margin: 3px auto;
    background: #eeeeee;
    color:black;
    border-top: 2px solid black;
    border-bottom: 2px solid black;">{{$m->text}}</li></a>
                                @else
                                <li style="padding: 10px;
    margin: 3px auto;
    background: #eeeeee;
    border-top: 2px solid black;
    border-bottom: 2px solid black;">{{$m->text}}</li>
                                @endif
                                @endforeach
                                <!--<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>-->

                            </ul>
                    </li>@if (count($checked)!=0)
                    <div id="bling" class="tooltip bottom" style="top:37px;opacity:initial">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
      <div class="tooltip-arrow"></div>
      <div class="tooltip-inner">
        您有新的通知
      </div>
    </div>

    @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/self_set') }}"><i class="fa fa-btn fa-sign-out"></i>帳號設定</a></li>
                                <li><a href="{{ url('/self_intro') }}"><i class="fa fa-btn fa-sign-out"></i>個人資訊</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                            </ul>
                        </li>
                    @endif

                </ul>
                
            </div>
        </div>
    </nav>
    <div class="container " style="background:#000033;margin-bottom:20px">
    <div class='jumbotron' style="background:#000033;position:relative">
        <a href={{ url('/') }}><img src="{{ URL::asset('imgs/logo2.gif')}}" alt="logo" style="margin:auto auto"></a>
        <button id="addFood" class="btn" data-toggle="modal" data-target="#addFoodtype">寫食譜 </button>
        

       

    </div>  

    </div>
 <div class="modal fade" id="addFoodtype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    @if (Auth::guest())
    <div id="choose-addFoodtype" style="margin-top: 50%;display:flex">
    <div style="float:left;padding: 10px;">
    <a href="{{ url('/login') }}"><img  src="{{URL::asset('dist/images/video-01.png')}}" data-holder-rendered="true" style="height: 300px; width: 300px; display: block;"></a>
    </div>
    <div style="float:right;padding: 10px;">
    <a href="{{ url('/login') }}"><img  src="{{URL::asset('dist/images/photo-02.png')}}" data-holder-rendered="true" style="height: 300px; width: 300px; display: block;"></a>
    </div>
    </div>
    @else
    <div id="choose-addFoodtype" style="margin-top: 50%;;display:flex">
    <div style="float:left;padding: 10px;">
    <a href="{{ url('/addFood_v') }}"><img  data-src="holder.js/100%x180" alt="100%x180" src="{{URL::asset('dist/images/video-01.png')}}" data-holder-rendered="true" style="height: 300px; width: 300px; display: block;"></a>
    </div>
    <div style="float:right;padding: 10px;">
    <a href="{{ url('/addFood_p') }}"><img  data-src="holder.js/100%x180" alt="100%x180" src="{{URL::asset('dist/images/photo-02.png')}}" data-holder-rendered="true" style="height: 300px; width: 300px; display: block;"></a>
    </div>
    </div>
    @endif
  </div>
</div>

    @yield('content')
    
    

    
            </div>

        </div>
    </div>
    </div>
    </div>



    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-83209415-1', 'auto');
  ga('send', 'pageview');

</script>

    
</body>
<footer class="footer" role="contentinfo">
    <div class="container">
        
        <p>
            這是footer， 我也不知道要寫什麼
        </p>
        <p>
            不知道寫什麼的第二行
        </p>
        <p>
          不知道寫什麼的第三行
        </p>
        
    </div>
   
</footer>
