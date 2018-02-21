<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset=utf-8>
    <meta http-equiv=X-UA-Compatible content="IE=edge">
<meta name="viewport" content="width=device-width,  maximum-scale=1">
    <meta name=description content="">
    <meta name=author content="">
    <meta id="token" name="token" content="{ { csrf_token() } }">

    <link rel=icon href=/Content/AssetsBS3/img/favicon.ico>
    <title>實在好家</title>
    
    <link href="{{ URL::asset('dist/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/bootstrap-theme.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/bootstrap-nav.css')}}" rel=stylesheet>
    <link href="{{ URL::asset('dist/css/main.css')}}" rel=stylesheet>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/css/main-mobile.css')}}" media="screen">
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
<nav id='navtop' class="navbar navbar-inverse navbar-fixed-top row" role=navigation>
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="margin-left:50px">
              <a style="padding:5px 5px" class="navbar-brand" href={{ url('/') }} ><img style="max-width:60px" src="{{URL::asset('imgs/LOGO2.png')}}"></a>

      <button type="button" id="navbutton" style="margin-left:20px" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <!--<span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>-->
        <img style="max-width:50px" src="{{URL::asset('imgs/click.png')}}">
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
                    <li class=active><a href={{ url('/') }}>實在好家</a>
                        <li><a href=#about>實在好文</a>
                            <li><a href=#contact>實在好物</a>
                </ul>
      <script>
  (function() {
    var cx = '001140125767615435562:61xod76q0dg';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
      <ul class="nav navbar-nav navbar-right nav-login" style="margin-right:20px">
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
                                @elseif ($m->type ==('課程留言'))
                                <a href="{{URL::asset('school').'/'.$m->task_id}}"><li style="padding: 10px;
                                margin: 3px auto;
                                background: #eeeeee;
                                color:black;
                                border-top: 2px solid black;
                                border-bottom: 2px solid black;">{{$m->text}}</li></a>
                                @elseif ($m->type == ('管理員'))
                                <a href="{{URL::asset('self_intro')}}"><li style="padding: 10px;
                                margin: 3px auto;
                                background: #eeeeee;
                                color:black;
                                border-top: 2px solid black;
                                border-bottom: 2px solid black;">請至信箱收信</li></a>
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
                            @if (count($checked)!=0)
                
                    <div id="bling" class="tooltip bottom" style="top:37px;opacity:initial">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
      <div class="tooltip-arrow"></div>
      <div class="tooltip-inner">
        您有新的通知
      </div>
    </div>@endif
                    </li>

    
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/self_intro') }}"><i class="fa fa-btn fa-sign-out"></i>個人資訊</a></li>
                                <li><a href="{{ url('/self_set') }}"><i class="fa fa-btn fa-sign-out"></i>帳號設定</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                            </ul>
                        </li>
                    @endif

                </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<body role=document>

    
    <div class="container " style="margin-bottom:20px">
    <div class='jumbotron' style="height:200px;position:relative;background-image: url({{URL::asset('logo-upload').'/'.$logo[0]->img}})">
        <!--<a href={{ url('/') }}><img src="{{ URL::asset('imgs/logo2.gif')}}" alt="logo" style="margin:auto auto"></a>-->
        <!--<button id="addFood" class="btn" data-toggle="modal" data-target="#addFoodtype">寫食譜 </button>-->
        <div data-toggle="modal" data-target="#addFoodtype" class="btn speech-bubble" >我要發表</div>
       

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
<footer class="footer" role="contentinfo" style="">
    <div class="containe" style="border:3px red solid ;background:red;color:white">
        <div class="container">
        <div class="row" style="text-align: left;margin:20px 20px">
        <div class='col-xs-3 col-sm-3'>
            <p><a href={{ url('/') }} style="color:white">關於<span style="text-decoration: underline;color:white">食在好家網</span></a></p>
            <p>一個分享日常料理作品</p>
            <p>快速學習料理的好地方</p>
        </div>
        <div class='col-xs-3 col-sm-3'>
         <p><a data-toggle="modal" data-target="#private" style="color:white">服務條款與隱私權</a></p>

        </div>
        <div class='col-xs-3 col-sm-3'>
         <p><a data-toggle="modal" data-target="#contact" style="color:white">行銷合作</a></p>
         <p><a data-toggle="modal" data-target="#contact" style="color:white">產品合作</a></p>

        </div>
        <div class='col-xs-3 col-sm-3'>
         <p><a data-toggle="modal" data-target="#contact" style="color:white">客服聯絡</a></p>

        </div>
        
    </div>
</div>
   </div>
</footer>



<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        聯絡我們
      </div>
      <form id='contact' class="form-horizontal" role="form" method="POST" >
        <!--action="{{ url('/contact') }}-->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="modal-body">
        謝謝您的來訪，請您留下進一步的訊息，客服人員將為您解答，<br>
        如果有其他批評與建議，也相當歡迎您留下訊息。<br><br>
        打『<span style="color:red">*</span>』為必填欄位
      <div class='row' id='yoyoyo'>
                <div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1" >
                 <label class="control-label"><span style="color:red">*</span>身份</label><br>

                    <select class="form-control" name="identity" required>
                        <option disabled>請選擇</option>
                        <option value='member'>會員</option>
                        <option value='nonmember'>訪客</option>           
                    </select>
                    會員若先登入帳號再留訊息，克服將能直接回覆到您的站內信箱喔
                </div>
                <div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1" >
                 <label class="control-label">主旨</label><br>

                    <input class="form-control" name="header" >
                </div>
                <div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1" >
                 <label class="control-label"><span style="color:red">*</span>我想留下的訊息</label><br>

                <textarea class="form-control" name="content" required></textarea>
                </div>
                <div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1" >
                 <label class="control-label">姓名</label><br>

                    <input class="form-control" name="name"  >
                </div>
                <div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1" >
                 <label class="control-label"><span style="color:red">*</span>E-Mail</label><br>

                    <input class="form-control" name="mail" required>
                </div>

        
      </div>

      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消留言</button>
        <button type="button" class="btn btn-primary sendcontact">確認送出</button>
      </div>
       </form>
    </div>
  </div>
</div>
<script>
$('.modal-footer').on('click', '.sendcontact', function() {
        var token = $('[name="_token"]').val();
        $.ajax({
            type: 'post',
            url: 'contact',

            data: {
            identity: $('[name="identity"]').val(),
            name: $('[name="name"]').val(),
            mail: $('[name="mail"]').val(),
            header: $('[name="header"]').val(),
            content: $('[name="content"]').val(),
             _token: token,
            },

            success: function(data) {
            $('#contact').modal('hide');
            alert('已為您送出訊息!')
            $('#contact').find("input,textarea,select").val('').end();
                        }
        });
    });
</script>

<div class="modal fade" id="private" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">服務條款與隱私權</h4>
      </div>
      <div class="modal-body" style='height: 500px;overflow: scroll;'>
        【服務條款與隱私權保護政策】
<br>
服務條款
<br>

1. 認知與接受條款 
<br>

<br>
實在好家網係依據本服務條款提供實在好家網（http://www.howjia.com.tw/）服務 (以下簡稱「本服務」)。當您使用本服務時，即表示您已閱讀、瞭解並同意接受本服務條款之所有內容。此外，當您使用實在好家網的特定服務時，可能會依據該特定服務之性質，而須遵守實在好家網所另行公告之服務條款或相關規定。此另行公告之服務條款或相關規定（包括但不限於反垃圾郵件政策）亦均併入屬於本服務條款之一部分。實在好家網有權於任何時間修改或變更本服務條款之內容，建議您隨時注意該等修改或變更。您於任何修改或變更後繼續使用本服務，視為您已閱讀、瞭解並同意接受該等修改或變更。如果您不同意本服務條款的內容，或者您所屬的國家或地域排除本服務條款內容之全部或一部時，您應立即停止使用本服務。
<br>

<br>
 若您為未滿二十歲，除應符合上述規定外，並應於您的家長（或監護人）閱讀、瞭解並同意本服務條款之所有內容及其後修改變更後，方得使用或繼續使用本服務。當您使用或繼續使用本服務時，即推定您的家長（或監護人）已閱讀、瞭解並同意接受本服務條款之所有內容及其後修改變更。 
<br>

<br>
2. 與第三人網站的連結 
<br>

<br>
 本服務或協力廠商可能會提供連結至其他網站或網路資源的連結。您可能會因此連結至其他業者經營的網站，但不表示實在好家網與該等業者有任何關係。其他業者經營的網站均由各該業者自行負責，不屬實在好家網控制及負責範圍之內。實在好家網對任何檢索結果或外部連結，不擔保其合適性、可依賴性、即時性、有效性、正確性及完整性。您也許會檢索或連結到一些令您厭惡或不需要的網站，這是網際網路運作的可能結果，遇到此類情形時，實在好家網建議您不要瀏覽或儘速離開該等網站。您並同意實在好家網無須為您連結至非屬於實在好家網之網站所生之任何損害，負損害賠償之責任。
<br>

<br>
3. 您的註冊義務
<br>

<br>
 為了能使用本服務，您同意以下事項：
<br>

<br>
(1) 依本服務註冊表之提示提供您本人正確、最新及完整的資料。
<br>

<br>
(2) 維持並更新您個人資料，確保其為正確、最新及完整。若您提供任何錯誤、不實或不完整的資料，實在好家網有權暫停或終止您的帳號，並拒絕您使用本服務之全部或一部。
<br>

<br>
4. 實在好家網隱私權政策
<br>

<br>
 關於您的會員註冊以及其他特定資料依實在好家網「隱私權政策」受到保護與規範。您了解當您使用本服務時，您同意實在好家網依據「隱私權政策」進行您個人資料的蒐集與利用，包括跨國間的傳輸與儲存及實在好家網及其關係企業內部之利用。
<br>

<br>
5. 會員帳號、密碼及安全
<br>

<br>
 完成本服務的登記程序之後。請注意，您有責任維持密碼及帳號的機密安全。您並同意以下事項：(1)您的密碼或帳號遭到盜用或有其他任何安全問題發生時，您將立即通知實在好家網，且(2)每次連線完畢，均結束您的帳號使用。
<br>

<br>
6. 兒童及青少年之保護
<br>

<br>
 兒童及青少年上網已經成為無可避免之趨勢，使用網際網路獲取知識更可以培養子女的成熟度與競爭能力。然而網路上的確存有不適宜兒童及青少年接受的訊息，例如色情與暴力的訊息，兒童及青少年有可能因此受到心靈與肉體上的傷害。因此，為確保兒童及青少年使用網路的安全，並避免隱私權受到侵犯，家長（或監護人）應盡到下列義務：
<br>

<br>
a.先檢閱各該網站是否有保護個人資料的隱私權政策，再決定是否同意提出相關的個人資料；並應持續叮嚀兒童及青少年不可洩漏自己或家人的任何資料（包括姓名、地址、電話、電子郵件信箱、照片、信用卡號等）給任何人。也不可以單獨接受網友的邀請或贈送禮物而與之見面。
<br>

<br>
b.謹慎選擇合適網站供兒童及青少年瀏覽。未滿十二歲之兒童上網時，應全程在旁陪伴，十二歲以上未滿十八歲之青少年上網前亦應斟酌是否給予同意。
<br>

<br>
7. 使用者的守法義務及承諾 
<br>

<br>
 使用者承諾絕不為任何非法目的或以任何非法方式使用本服務，並承諾遵守中華民國相關法規及一切使用網際網路之國際慣例。使用者若係中華民國以外之使用者，並同意遵守所屬國家或地域之法令。使用者同意並保證不得利用本服務從事侵害他人權益或違法之行為，包括但不限於：
<br>
A. 上載、張貼、公布或傳送任何誹謗、侮辱、具威脅性、攻擊性、不雅、猥褻、不實、違反公共秩序或善良風俗或其他不法之文字、圖片或任何形式的檔案於本服務上；
<br>

B. 侵害他人名譽、隱私權、營業秘密、商標權、著作權、專利權、其他智慧財產權及其他權利；

<br>
C. 違反依法律或契約所應負之保密義務；
<br>
D. 冒用他人名義使用本服務；
<br>
E. 上載、張貼、傳輸或散佈任何含有電腦病毒或任何對電腦軟、硬體產生中斷、破壞或限制功能之程式碼之資料；
<br>
F. 從事不法交易行為或張貼虛假不實、引人犯罪之訊息；
<br>
G. 販賣槍枝、毒品、禁藥、盜版軟體或其他違反中華民國法律之物品；
<br>
H. 提供賭博資訊或以任何方式引誘他人參與賭博；
<br>
I. 濫發廣告郵件、垃圾郵件、連鎖信、違法之多層次傳銷訊息等； 
<br>
J. 以任何方法傷害未成年人；
<br>
K. 偽造訊息來源或以任何方式干擾傳輸來源之認定；
<br>
L. 干擾或中斷本服務或伺服器或連結本服務之網路，或不遵守連結至本服務之相關需求、程序、政策或規則等，包括但不限於：使用任何設備、軟體或刻意規避實在好家網之排除自動搜尋之標頭 (robot exclusion headers)；
<br>
M. 對於恐怖行動提供任何實質支持或資源；
<br>
N. 追蹤他人或其他干擾他人或為前述目前蒐集或儲存他人之個人資訊；
<br>
O. 其他實在好家網有正當理由認為不適當之行為。
<br>

<br>
8. 系統中斷或故障 
<br>

<br>
 本服務有時可能會出現中斷或故障等現象，或許將造成使用者使用上的不便、資料喪失、錯誤、遭人篡改或其他經濟上損失等情形。使用者於使用本服務時宜自行採取防護措施。實在好家網於使用者因使用（或無法使用）本服務而造成的損害，不負任何賠償責任。
<br>

<br>
9. 資訊或建議
<br>

<br>
實在好家網對於本網站使用者使用本服務或經由本服務連結之其他網站而取得之資訊或建議（包括但不限於，商務、投資理財、醫療、法律等方面），不擔保其為完全正確無誤。實在好家網對於本網站服務所提供之資訊或建議有權隨時修改或刪除。使用者在做出任何相關規劃與決定之前，仍應請教專業人員針對使用者的情況提出意見，以符合使用者的個別需求。
<br>

<br>
實在好家網隨時會與其他公司、廠商等第三人（「內容提供者」）合作，由其提供料理相關資訊由實在好家網刊登，實在好家網於刊登時均將註明內容提供者。基於尊重內容提供者之智慧財產權，實在好家網對其所提供之內容並不做實質之審查或修改，對該等內容之正確真偽亦不負任何責任。對該等內容之正確真偽，本網站使用者宜自行判斷之。本網站使用者若認為某些內容涉及侵權或有所不實，請逕向該內容提供者反應意見。 
<br>

<br>
10. 廣告 
<br>

<br>
 本網站使用者在本服務中瀏覽到的所有廣告內容、文字與圖片之說明、展示樣品或其他銷售資訊，均由各該廣告商、產品與服務的供應商所設計與提出。本網站使用者對於廣告之正確性與可信度應自行斟酌與判斷。實在好家網僅接受委託予以刊登，不對前述廣告負擔保責任。 
<br>

<br>
11. 買賣或其他交易行為 
<br>

<br>
 廠商或個人可能透過本網站服務或經由本網站服務連結之其他網站提供商品買賣、服務或其他交易行為。網站使用者(含本站會員)若因此與該等廠商或個人進行交易，各該買賣或其他合約均僅存在網站使用者(含本站會員)與各該廠商或個人兩造之間。網站使用者(含本站會員)應要求各該廠商或個人，就其商品、服務或其他交易標的物之品質、內容、運送、保證事項與瑕疵擔保責任等，事先詳細闡釋與說明。網站使用者(含本站會員)因前述買賣、服務或其他交易行為所產生之爭執，應向各該廠商或個人尋求救濟或解決之道。實在好家網聲明絕不介入網站使用者(含本站會員)與廠商或個人間的任何買賣、服務或其他交易行為，對於網站使用者(含本站會員)所獲得的商品、服務或其他交易標的物亦不負任何擔保責任。本站會員或任何網站使用者若係向實在好家網經營的購物網站進行前述買賣、服務或其他交易行為，雙方權利義務將另行依據該網站之責任規範約定書內容決定之。
<br>

<br>
12. 免責聲明 
<br>

<br>
網站使用者(含本站會員)明確了解並同意： 實在好家網對本服務及軟體不提供任何明示或默示的擔保，包含但不限於權利完整、商業適售性、特定目的之適用性及未侵害他人權利。本服務及軟體乃依其「現狀」及「提供使用時」之基礎提供，網站使用者使用本服務及軟體時，須自行承擔相關風險。實在好家網不保證以下事項：(1)本服務及軟體將符合網站使用者的需求，(2)本服務及軟體不受干擾、及時提供、安全可靠或無錯誤，(3)由本服務及軟體之使用而取得之結果為正確或可靠，(4) 網站使用者(含本站會員)經由本服務購買或取得之任何產品、服務、資訊或其他資料將符合網站使用者的期望及(5)任何軟體中之錯誤將被修正。 是否經由本服務及軟體之使用下載或取得任何資料應由網站使用者自行考量且自負風險，並拋棄因前開任何資料之下載而導致網站使用者電腦系統、網路存取、下載或播放設備之任何損壞或資料流失，對實在好家網提出任何請求或採取法律行動，網站使用者(含本站會員)應自負完全責任。網站使用者(含本站會員)自實在好家網或經由本服務或軟體取得之建議和資訊，無論其為書面或口頭，均不構成本服務或軟體之保證。 
<br>

<br>
網站使用者(含本站會員)明確了解並同意實在好家網及其關係企業、經理人、受僱人、代理人、合夥人及授權人，無須為網站使用者任何直接、間接、附隨、特別、衍生、懲罰性的損害負責，包括但不限於因下述事由所生利潤、商譽、使用、資料之損害或其他無形損失（即令實在好家網曾被告知該等損害之可能性亦同）：(1)使用或無法使用本服務；(2)替代商品及服務之購買成本；(3)他人未經授權存取或修改您的傳輸或資料；(4)任何第三人就本服務所為之聲明或行為，或(5)任何其他與本服務有關者。部分管轄區域並不允許對於特定保證責任的排除或是對於附隨或衍生損害的限制或免除。於此情形，本條前述限制對您不適用。 
<br>

<br>
15. 金融相關服務
<br>

<br>
 本服務之目的為提供資訊，非供交易或投資之目的。經由本服務傳送之任何資訊之正確性與適用性，實在好家網及該資訊之提供者均不承擔任何責任。基於前開資料之任何交易或投資決定，實在好家網亦不予負責。 
<br>

<br>
16. 會員行為 
<br>

<br>
 由會員公開張貼或私下傳送的資訊、資料、文字、軟體、音樂、音訊、照片、圖形、視訊、信息或其他資料（以下簡稱「會員內容」），均由「會員內容」提供者自負責任。實在好家網無法控制經由本服務而張貼之「會員內容」，因此不保證其正確性、完整性或品質。網站使用者(含本站會員)了解使用本服務時，可能會接觸到令人不快、不適當、令人厭惡之「會員內容」。在任何情況下，實在好家網均不為任何「會員內容」負責，包含但不限於任何錯誤或遺漏，以及經由本服務張貼、發送電子郵件或傳送而衍生之任何損失或損害。
<br>

<br>
網站使用者(含本站會員)了解實在好家網並未針對「會員內容」事先加以審查，但實在好家網有權（但無義務）依其自行之考量，拒絕或移除經由本服務提供之任何「會員內容」。在不限制前開規定之前提下，實在好家網及其指定人有權將有違反本服務條款或法令之虞、或令人厭惡之任何「會員內容」加以移除。網站使用者(含本站會員)使用任何「會員內容」時，就前開「會員內容」之正確性、完整性或實用性之情形，網站使用者(含本站會員)同意必須自行加以評估並承擔所有風險。網站使用者了解並同意實在好家網依據法律的要求，或基於以下目的之合理必要範圍內，認定必須將申請為本網站會員的網站使用者帳戶資訊或「會員內容」加以保存或揭露予政府機關、司法警察或未成年人之監護人時，得加以保存及揭露：(1)遵守法令或政府機關之要求，(2)為提供本服務所必須者，(3) 為防止他人權益之重大危害而有必要者，或(4)為免除使用者及公眾之生命、身體、自由、權利、財產上之急迫危險者。
<br>

<br>
網站使用者(含本站會員)了解本服務及本服務所包含之軟體，可能含有使數位資料得以被保護之安全元件，使用該等資料必須依實在好家網或提供該內容予本服務之內容提供者所定的使用規則。網站使用者(含本站會員)不得試圖破壞或規避任何內含於本服務之使用規則。任何未經合法授權之重製、發行、散布或公開展示本服務所提供之資料之全部或一部，均被嚴格禁止。 
<br>

<br>
17. 智慧財產權的保護 
<br>

<br>
實在好家網所使用之軟體或程式、網站上所有內容，包括但不限於著作、圖片、檔案、資訊、資料、網站架構、網站畫面的安排、網頁設計、會員內容等，均由實在好家網或其他權利人依法擁有其智慧財產權，包括但不限於商標權、專利權、著作權、營業秘密與專有技術等。任何人不得逕自使用、修改、重製、公開播送、公開傳輸、公開演出、改作、散布、發行、公開發表、進行還原工程、解編或反向組譯。若網站使用者(含本站會員)欲引用或轉載前述軟體、程式或網站內容，除明確為法律所許可者外，必須依法取得實在好家網或其他權利人的事前書面同意。尊重智慧財產權是網站使用者(含本站會員)應盡的義務，如有違反，網站使用者(含本站會員)應對實在好家網負損害賠償責任。實在好家網及其關係企業為行銷宣傳本服務，就本服務相關之商品或服務名稱、圖樣等（以下稱「實在好家網商標」），依其註冊或使用之狀態，受商標法及公平交易法等之保護，未經實在好家網事前書面同意，網站使用者(含本站會員)同意不以任何方式使用實在好家網商標。
<br>

<br>
18. 會員對實在好家網之授權 
<br>

<br>
 若會員無合法權利得授權他人使用、修改、重製、公開播送、改作、散布、發行、公開發表某資料，並將前述權利轉授權第三人，請勿擅自將該資料上載、傳送、輸入 或提供予實在好家網。會員所上載、傳送、輸入或提供予實在好家網之任何資料，其權利仍為會員或會員的授權人所有；但任何資料一經會員上載、傳送、輸入 或提供予實在好家網時，即表示會員同意：(1)由實在好家網及其關係企業儲存或管理該資料，並由實在好家網及其關係企業之搜尋工具進行索引及抓取，並公開刊登、使用於實在好家網及其關係企業的相關系統網路上，包括但不限於實在好家網所聯盟或合作的第三人網站上；(2)授權實在好家網及其關係企業可以基於公益或為宣傳、推廣或經營實在好家網及本服務之目的，進行使用、修改、重製、公開播送、改作、散布、發行、公開發表、公開傳輸、公開上映、翻譯該等資料，並得在此範圍內將前述權利轉授權他人。會員並保證實在好家網及其關係企業使用、修 改、重製、公開播送、改作、散布、發行、公開發表、公開傳輸、公開上映、翻譯、轉授權該等資料，不致侵害任何第三人之智慧財產權，否則應對實在好家網及其關係企業負損害賠償責任。
<br>

<br>
<br>
19. 通知 
<br>

<br>
 如依法或其他相關規定須為通知時，實在好家網得以包括但不限於：電子郵件、一般信件、簡訊、多媒體簡訊、文字訊息、張貼於本服務網頁，或其他現在或未來合理之方式通知會員，包括本服務條款之變更。但若會員違反本服務條款，以未經授權的方式存取本服務，會員將不會收到前述通知。當會員經由授權的方式存取本服務，而同意本服務條款時，會員即同意實在好家網所為之任何及所有給會員的通知，都視為送達。
<br>

<br>
20. 著作權侵害處理 
<br>

<br>
實在好家網尊重他人著作權，亦要求我們的使用者同樣尊重他人著作權，您瞭解並同意我們將依據「實在好家網著作權保護政策」保護著作權並處理著作權侵害之事宜。若您認為實在好家網網站中之任何網頁內容或網友使用實在好家網服務已侵害您的著作權，請您詳閱「實在好家網著作權保護政策」後填寫「著作權侵害通知書」，並請依該通知書所載，提供相關資料及聲明並經簽名或蓋章後傳真或寄送予實在好家網。 
<br>

<br>
 會員使用本服務若有三次(含)以上涉及侵權情事者，實在好家網將終止該會員全部或部分服務。又若該會員所涉及侵權情事嚴重者，實在好家網亦得暫停或終止該會員全部或部分服務。 
<br>

<br>
21. 對實在好家網的貢獻 
<br>

<br>
 若會員透過建議或回應網頁對於實在好家網提供任何想法、建議、文件及/或提議（以下稱「貢獻」），會員認知並同意：(1) 會員的貢獻並非特定機密或專有資訊；(2) 實在好家網對前開貢獻並不負有任何明示或默示的保密責任；(3) 實在好家網有權在全球為任何目的、以任何方式、在任何媒體上，使用或揭露（或選擇不使用或揭露）前開貢獻；(4) 實在好家網可能已有與前述貢獻相似而正在考慮或發展中的想法或提案；(5) 會員的貢獻將自動於實在好家網不對該會員負任何責任的情形下，成為實在好家網之財產；(6) 會員於任何情形下皆無權利對實在好家網主張任何形式的賠償或補償。 
<br>

<br>
22. 損害 
<br>

<br>
 因會員經由本服務提供、張貼或傳送「會員內容」、使用本服務、與本服務連線、違反本服務條款、或侵害其他人任何權利所衍生或導致任何第三人為請求或主張時，會員同意使實在好家網及關係企業、經理人、代理人、受僱人、合夥人及授權人免於任何損害。
<br>

<br>
23. 不得為商業利用 
<br>

<br>
網站使用者(含本站會員)同意不對本服務任何部分或本服務（包括：會員內容、廣告、軟體及實在好家網  帳號等）之使用或存取，進行重製、拷貝、出售、交易、轉售或作任何商業目的之使用。
<br>

<br>
24. 服務變更 
<br>

<br>
實在好家網保留於任何時點，不經通知隨時修改或暫時或永久停止繼續提供本服務（或其任一部分）的權利。會員同意實在好家網對於會員或是任何第三方對於任何修改、暫停或停止繼續提供本服務不負任何責任。
<br>

<br>
25. 終止 
<br>

<br>
 網站使用者(含會員)同意實在好家網得依其判斷因任何理由，包含但不限於一定期間未使用、法院或政府機關命令、本服務無法繼續或服務內容實質變更、無法預期之技術或安全因素或問題、網站使用者(含會員)所為詐欺或違法行為、未依約支付費用，或其他實在好家網認為網站使用者(含會員)已經違反本服務條款的明文規定及精神，而終止或限制網站使用者(含會員)使用帳號（或其任何部分）或本服務之使用，並將本服務內任何「會員內容」加以移除並刪除。網站使用者(含會員)並同意實在好家網亦得依其自行之考量，於通知或未通知之情形下，隨時終止或限制網站使用者(含會員)使用本服務或其任何部分。網站使用者(含會員)承認並同意前開終止或限制，實在好家網得立即關閉、刪除或限制存取網站使用者(含會員)的帳號及網站使用者(含會員)帳號中全部或部分相關資料及檔案，及停止本服務全部或部分之使用。此外，網站使用者(含會員)同意若本服務之使用被終止或限制時，實在好家網對該網站使用者(含會員)或任何第三人均不承擔責任。
<br>

<br>
26. 一般條款 
<br>

<br>
 本服務條款構成本網站使用者(含本站會員)與實在好家網就網站使用者(含本站會員)使用本服務之完整合意，取代本網站使用者(含本站會員)先前與實在好家網間有關本服務所為之任何約定。網站使用者(含本站會員)於使用或購買特定實在好家網服務、關係企業服務、第三方內容或軟體時，可能亦須適用額外條款或條件。本服務條款之解釋與適用，以及與本服務條款有關的爭議，除法律另有規定者外，均應依照中華民國法律予以處理，並以台灣台北地方法院為第一審管轄法院。
<br>

<br>
實在好家網未行使或執行本服務條款任何權利或規定，不構成前開權利或規定之棄權。若任何本服務條款規定，經有管轄權之法院認定無效，當事人仍同意法院應努力使當事人於前開規定所表達之真意生效，且本服務條款之其他規定仍應完全有效。 
<br>

<br>
會員同意會員在實在好家網帳號係不可轉讓，且會員於實在好家網帳號或帳號中內容之任何權利，於該會員死亡或喪失行為能力時即立刻終止。本服務條款之標題僅係為方便起見，不具任何法律或契約效果。若有任何違反本服務條款之行為，請立即與實在好家網客服聯絡。
<br>
      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>