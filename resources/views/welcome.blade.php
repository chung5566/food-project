@extends('layouts.app') @section('content')



<div class="container">
    <div class="row">
        <div class="col-md-8">
                <script>var selectstyle="{{url('selectstyle')}}"</script>
                <form  id="selectstyle" method="POST" ><!--action='{{url("selectstyle")}}'-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <h2 class="bold">料理篩選</h2>
                <div id="food_asemble_choose" style="margin:20px">
                 <label class="small" style="float:left,">時段</label>

                <div  class="btn-group " data-toggle="buttons" role="group" aria-label="foodtime">
                <label class="btn btn-primary index-select-food ">
                    <input  type="radio" name="style_1" id="option1" autocomplete="off" value="早餐" checked> 早餐
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_1" id="option2" autocomplete="off" value="午餐"> 午餐
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_1" id="option3" autocomplete="off" value="點心"> 午餐
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_1" id="option4" autocomplete="off" value="晚餐"> 晚餐
                </label>

            </div><br>
                        <label class="small" style="float:left,">風格</label>

                <div class="btn-group " role="group" aria-label="foodstyle" data-toggle="buttons">

                    <label class="btn btn-primary  index-select-food">
                    <input  type="radio" name="style_2" id="option1" autocomplete="off" value="中式料理" checked> 中式料理
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_2" id="option2" autocomplete="off" value="亞洲料理"> 亞洲料理
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_2" id="option3" autocomplete="off" value="歐美澳洲料理"> 歐美澳洲料理
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_2" id="option4" autocomplete="off" value="異國料理"> 異國料理
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_2" id="option5" autocomplete="off" value="懶人料理"> 懶人料理
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_2" id="option6" autocomplete="off" value="創意料理"> 創意料理
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_2" id="option7" autocomplete="off" value="養生料理"> 養生料理
                </label>
            </div>
            <br>
                        <label class="small" style="float:left,">類別</label>

                <div class="btn-group " role="group" aria-label="foodstyle" data-toggle="buttons">
                    <label class="btn btn-primary  index-select-food">
                    <input  type="radio" name="style_3" id="option1" autocomplete="off" value="素食" checked> 素食
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_3" id="option2" autocomplete="off" value="非素食"> 非素食
                </label>
                <label class="btn btn-primary index-select-food" >
                    <input  type="radio" name="style_3" id="option3" autocomplete="off" value="純肉"> 純肉
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_3" id="option4" autocomplete="off" value="海鮮"> 海鮮
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_3" id="option5" autocomplete="off" value="米麵澱粉類主食"> 米麵澱粉類主食
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_3" id="option6" autocomplete="off" value="羹湯"> 羹湯
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_3" id="option6" autocomplete="off" value="乾果與水果"> 乾果與水果
                </label>
                <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_3" id="option7" autocomplete="off" value="醬料製作"> 醬料製作
                </label>
                 <label class="btn btn-primary index-select-food">
                    <input  type="radio" name="style_3" id="option8" autocomplete="off" value="其他"> 其他
                </label>
                    
                
                </div>
                <br>
            </form>
            <div class="row">
                            <a  class="" href="{{ url('tasks') }}" style="float:right;text-decoration: underline;margin-right:50px;margin-top:10px">料理總覽</a>
                        </div>
            </div>
            <div id="food_assemble_food" style="margin:20px;margin-bottom:0px">
                <div class='row' id="afterselectold">

                   @foreach ($newtasks as $newtask)

                    <div class="col-md-4 foodblock">

                        <a href="tasks/{{$newtask->id}}" class="thumbnail">
                            @if($newtask->article_type=='p')
                            <img data-src="holder.js/100%x180" alt="100%x180" src="{{URL::asset('foodpic-upload').'/'.$newtask->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                            @else
                            <img data-src="holder.js/100%x180" alt="100%x180" src="{{$newtask->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                            @endif
                            {{ $newtask->name }}
                        </a>
                    </div>
                @endforeach

                   
                </div>

            </div>
            <a href="{{ url('tasks') }}" class=" btn more" style="margin-top:0;margin-bottom:20px;">more</a>
        </div>
        <div class="col-md-4">
            <div style="margin:20px">
                <h2 class="bold">名人榜</h2>
                <br>
                <!--<div class="btn-group" role="group" aria-label="foodtime" style="margin-bottom:15px;margin-top:15px">
                    <button type="button" class="btn">老師</button>
                    <button type="button" class="btn">素人</button>
                    <button type="button" class="btn">好聞</button>
                    <button type="button" class="btn">好物</button>
                </div>-->
                <div id="rank_board">
                    @foreach ($topusers as $index => $topuser)
                    <div class="rank_board_item row">


                        <div class="rank_board_item_num col-md-3">
                            <div class="number_circle">{{$index+1}}</div>
                        </div>
                        <div class="rank_board_item_name col-md-6"><span><a href="member/{{$topuser->id}}">{{$topuser->name}}</a></span><span><br><small>{{$topuser->identity}}</small></span></div>
                        <div class="rank_board_item_pic col-md-3">
                            
                            <img data-src="holder.js/100%x180" alt="100%x180" src="{{URL::asset('user-upload').'/'.$topuser->user_img}}" data-holder-rendered="true" style="height: 40px; width: 50px; display: block;margin: auto"></div>
                        
                            </a>
                    </div>
                    @endforeach
                   
 
                </div>
            </div>

    </div>
</div>

<div class="container">
    <div class='row' style="background:#E8E8E8;">
        <form id="random_choose" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="col-md-12" style="margin:20px">
            <h2 class="bold">隨機搭配</h2>
            <div class="btn-group" id="random_button" role="group" aria-label="" style="float:right">
                <button type="button" class="btn" id="save_random_food">儲存組合</button>
                <button type="button" class="btn" id="try_again_random_food" >再試一次</button>
            </div>

            <div class='row' id="random_food">

                <div id="random_food_1" class="col-md-2 foodblock">
                    
                   <a href="tasks/{{$ramfood[0]->id}}" class="thumbnail">
                        <input name='ramid_1' type="hidden" value="{{$ramfood[0]->id}}">
                                    @if($ramfood[0]->article_type=='p')
                                <img data-src="holder.js/100%x180" alt="100%x180" src="{{URL::asset('foodpic-upload').'/'.$ramfood[0]->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                    @elseif($ramfood[0]->article_type=='v')
                                <img data-src="holder.js/100%x180" alt="100%x180" src="{{$ramfood[0]->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                    @endif
                                    {{ $ramfood[0]->name }}
                                </a>
                    <span style="float:right; font-weight:bold;font-size:20px">前菜</span>
                </div>
                <div class="col-md-1"><span>+</span></div>
                <div id="random_food_2" class="col-md-2 foodblock">
                    <a href="tasks/{{$ramfood[1]->id}}" class="thumbnail">
                        <input name='ramid_2' type="hidden" value="{{$ramfood[1]->id}}">

                                    @if($ramfood[1]->article_type=='p')
                                <img data-src="holder.js/100%x180" alt="100%x180" src="{{URL::asset('foodpic-upload').'/'.$ramfood[1]->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                    @elseif($ramfood[1]->article_type=='v')
                                <img data-src="holder.js/100%x180" alt="100%x180" src="{{$ramfood[1]->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                    @endif
                                    {{ $ramfood[1]->name }}
                                </a>
                    <span style="float:right; font-weight:bold;font-size:20px">主食</span>
                </div>
                <div class="col-md-1"><span>+</span></div>
                <div id="random_food_3" class="col-md-2 foodblock">
                    <a href="tasks/{{$ramfood[2]->id}}" class="thumbnail">
                        <input name='ramid_3' type="hidden" value="{{$ramfood[2]->id}}">

                                    @if($ramfood[2]->article_type=='p')
                                <img data-src="holder.js/100%x180" alt="100%x180" src="{{URL::asset('foodpic-upload').'/'.$ramfood[2]->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                    @elseif($ramfood[2]->article_type=='v')
                                <img data-src="holder.js/100%x180" alt="100%x180" src="{{$ramfood[2]->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                    @endif
                                    {{ $ramfood[2]->name }}
                                </a>
                    <span style="float:right; font-weight:bold;font-size:20px">主菜</span>
                </div>
                <div class="col-md-1"><span>+</span></div>
                <div id="random_food_4" class="col-md-2 foodblock">
                    <a href="tasks/{{$ramfood[3]->id}}" class="thumbnail">
                        <input name='ramid_4' type="hidden" value="{{$ramfood[3]->id}}">

                                    @if($ramfood[3]->article_type=='p')
                                <img data-src="holder.js/100%x180" alt="100%x180" src="{{URL::asset('foodpic-upload').'/'.$ramfood[3]->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                    @elseif($ramfood[3]->article_type=='v')
                                <img data-src="holder.js/100%x180" alt="100%x180" src="{{$ramfood[3]->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                    @endif
                                    {{ $ramfood[3]->name }}
                                </a>
                    <span style="float:right; font-weight:bold;font-size:20px">甜點</span>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </form>
    </div>
</div>

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-md-8">
            <div style="margin:20px" class="row">
                <h2 class="bold">探索料理</h2>
                
                    <!--<ul id="myTab" class="nav nav-tabs" role="tablist"style="float:right;margin-top:20px">
                        <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">老師上菜</a></li>
                        <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">素人上菜</a></li>
                    </ul>-->
                    <div id="myTabContent" class="tab-content"style="margin-top:30px">
                        <div role="tabpanel" class="tab-pane fade row active in" id="home" aria-labelledby="home-tab">
                            @foreach ($newtasks as $index => $newtask)
                            <div class="col-md-4 foodblock">
                                <a href="tasks/{{$newtask->id}}" class="thumbnail">
                                    @if($newtask->article_type=='p')
                                <img data-src="holder.js/100%x180" alt="100%x180" src="{{URL::asset('foodpic-upload').'/'.$newtask->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                    @elseif($newtask->article_type=='v')
                                <img data-src="holder.js/100%x180" alt="100%x180" src="{{$newtask->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                    @endif
                                    {{ $newtask->name }}
                                </a>
                            </div>
                            @endforeach
                            
                        </div>
                        <div role="tabpanel" class="tab-pane fade " id="profile" aria-labelledby="profile-tab">
                            <div class="col-md-4">
                                <a href="#" class="thumbnail">
                                <img data-src="holder.js/100%x180" alt="100%x180" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                </a>
                            </div>
                            
                        </div>
            <a href="{{ url('tasks') }}" class=" btn more" style="margin-top:0;margin-bottom:20px;">more</a>
                    </div>     
            </div>
            <div style="margin:20px" class="row">
                <h2 class="bold">時節推薦</h2>
                
                    <!--<ul id="myTab" class="nav nav-tabs" role="tablist"style="float:right;margin-top:20px">
                        <li role="presentation" class="active"><a href="#home3" id="home-tab3" role="tab" data-toggle="tab" aria-controls="home3" aria-expanded="false">老師上菜</a></li>
                        <li role="presentation" class=""><a href="#profile3" role="tab" id="profile-tab3" data-toggle="tab" aria-controls="profile3" aria-expanded="true">素人上菜</a></li>
                    </ul>-->
                    <div id="myTabContent" class="tab-content"style="margin-top:30px">
                        <div role="tabpanel" class="tab-pane fade row active in" id="home3" aria-labelledby="home-tab3">
                            @foreach ($ramtasks as $index => $ramtask)
                            <div class="col-md-4 foodblock">
                                <a href="tasks/{{$ramtask->id}}" class="thumbnail">
                                    @if($ramtask->article_type=='p')
                                <img data-src="holder.js/100%x180" alt="100%x180" src="{{URL::asset('foodpic-upload').'/'.$ramtask->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                    @elseif($ramtask->article_type=='v')
                                <img data-src="holder.js/100%x180" alt="100%x180" src="{{$ramtask->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                    @endif
                                    {{ $ramtask->name }}
                                </a>
                            </div>
                            @endforeach
                            
                        </div>
                        <div role="tabpanel" class="tab-pane fade " id="profile3" aria-labelledby="profile-tab3">
                            <div class="col-md-4">
                                <a href="#" class="thumbnail">
                                <img data-src="holder.js/100%x180" alt="100%x180" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                </a>
                            </div>
                            
                        </div>
            <a href="{{ url('tasks') }}" class=" btn more" style="margin-top:0;margin-bottom:20px;">more</a>
                    </div>  
            </div>
            <div style="margin:20px" class="row">
                <h2 class="bold">熱門料理</h2>
                
                    <!--<ul id="myTab" class="nav nav-tabs" role="tablist"style="float:right;margin-top:20px">
                        <li role="presentation" class="active"><a href="#home2" id="home-tab2" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">老師上菜</a></li>
                        <li role="presentation" class=""><a href="#profile2" role="tab" id="profile-tab2" data-toggle="tab" aria-controls="profile" aria-expanded="true">素人上菜</a></li>
                    </ul>-->
                  
                    <div id="myTabContent" class="tab-content"style="margin-top:30px">
                        <div role="tabpanel" class="tab-pane fade act row active in" id="home2" aria-labelledby="home-tab2">
                            @foreach ($hottasks as $index => $hottask)
                            <div class="col-md-4 foodblock">
                                <a href="tasks/{{$hottask->id}}" class="thumbnail">
                                    @if($hottask->article_type=='p')
                                <img data-src="holder.js/100%x180" alt="100%x180" src="{{URL::asset('foodpic-upload').'/'.$hottask->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                    @elseif($hottask->article_type=='v')
                                <img data-src="holder.js/100%x180" alt="100%x180" src="{{$hottask->img_url}}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                    @endif
                                    {{ $hottask->name }}
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div role="tabpanel" class="tab-pane fade " id="profile2" aria-labelledby="profile-tab2">
                            <div class="col-md-4">
                                <a href="#" class="thumbnail">
                                <img data-src="holder.js/100%x180" alt="100%x180" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                </a>
                            </div>
                            
                        </div>
            <a href="{{ url('tasks') }}" class=" btn more" style="margin-top:0;margin-bottom:20px;">more</a>
                    </div>  
            </div>
        </div>

        <div class="col-md-4">
            <!--<div style="margin:20px">
                <h2 class="bold">線上開課</h2>
                <div class="well" style="margin-top:20px;margin-bottom:0px;border: solid 2px #000033; border-radius: 0px;">這是開課內容的介紹這是開課內容的介紹這是開課內容的介紹這是開課內容的介紹這是開課內容的介紹這是開課內容的介紹這是開課內容的介紹這是開課內容的介紹這是開課內容的介紹這是開課內容的介紹這是開課內容的介紹這是開課內容的介紹這是開課內容的介紹</div>
                <a style="background:#000033;color:white;width:100%;text-align:center;display:block;height:30px"><span style='vertical-align: middle';>我要報名</span></a>
            </div>-->
                                    <div style="margin:20px">
                <h2 class="bold">公布欄</h2>
                <br>
                    <div id="rank_board">
                    @foreach ($announces as $announce)
                     <div class="rank_board_item row">


                        <div class="rank_board_item_num col-md-4">
                            <div class=""><small style="font-size: xx-small;;">{{date('Y/m/d', strtotime($announce->created_at))}}</small></div>
                        </div>
                        <div class="rank_board_item_name col-md-8"><a href="" data-target='#announce' data-toggle='modal' data-content='{{$announce->content}}' data-name='{{$announce->name}}'>{{$announce->name}}</a></div>
                            
                        
                            
                    </div>
                    @endforeach     
                    </div>             
        </div>
            
            <div style="margin:20px">
                <h2 class="bold">開課資訊</h2>
                <div id="class_board">
                    @foreach ($schools as $school)
                    <a href="school/{{$school->id}}"><div class="class_board_item row">
                        <div class="rank_board_item_pic col-md-3"><img src="{{URL::asset('schoolpic-upload').'/'.$school->img_url}}" data-holder-rendered="true" style="display: block;width: 100%;height:65px"></div>
                        <div class="col-md-9 class_board_item_word"><span>主題:{{$school->name}}</span><br><span>簡介:{{$school->intro}}</span><br><span>地點:{{$school->address}}</span></div>
                    </div></a>
                    @endforeach
                    <div class="rank_more">
                    <a href="school" class=" btn more" >more</a></div>

            </div>
            
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="announce" tabindex="-1" role="dialog" aria-labelledby="announcement" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="announcement">公告事項</h4>
      </div>
      <div class="modal-body">
        <div id="announce_name">

        </div>
        <div id="announce_content">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<script>
$('#announce').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var name = button.data('name') // Extract info from data-* attributes
  var content = button.data('content')
  var modal = $(this)
  modal.find('#announcement').text(name)
  modal.find('#announce_content').text(content)
})
</script>
<!--<div class="container"id="index_food_class">
    <div class="row" style="margin:20px">
        <h2>料理教室</h2>
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img data-src="holder.js/100%x180" alt="100%x180" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="height: 250px; width: 100%; display: block;">
                <div style="height:80px;background:white;">人物介紹</div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img data-src="holder.js/100%x180" alt="100%x180" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="height: 250px; width: 100%; display: block;">
                <div style="height:80px;background:white;">人物介紹</div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img data-src="holder.js/100%x180" alt="100%x180" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="height: 250px; width: 100%; display: block;">
                <div style="height:80px;background:white;">人物介紹</div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img data-src="holder.js/100%x180" alt="100%x180" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="height: 250px; width: 100%; display: block;">
                <div style="height:80px;background:white;">人物介紹</div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img data-src="holder.js/100%x180" alt="100%x180" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="height: 250px; width: 100%; display: block;">
                <div style="height:80px;background:white;">人物介紹</div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img data-src="holder.js/100%x180" alt="100%x180" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="height: 250px; width: 100%; display: block;">
                <div style="height:80px;background:white;">人物介紹</div>
                </a>
            </div>    
        </div>
    </div>-->

@endsection
