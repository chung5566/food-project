@extends('layouts.app')

@section('content')
<link href=dist/css/wookmark.css rel=stylesheet>
<link href=dist/css/food.css rel=stylesheet>
<script src="dist/js/imagesloaded.pkgd.min.js"></script>
<script src="dist/js/wookmark.js"></script>


<div class="container" style="text-align: center;">
	<h2>料理總覽</h2>
<ol id="filters" >
    <ul style="display: flex;">
      <li  data-filter="早餐" class="btn filters_1" style="margin-left:5px;">早餐</li>
      <li  data-filter="午餐" class="btn filters_1">午餐</li>
      <li  data-filter="晚餐" class="btn filters_1">晚餐</li>
      <li  data-filter="點心" class="btn filters_1">點心</li>
      
    </ul>

    <ul style="display: flex;">
      <li  data-filter="中式料理" class="btn filters_2" style="margin-left:5px;">中式料理</li>
      <li  data-filter="亞洲料理" class="btn filters_2">亞洲料理</li>
      <li  data-filter="歐美澳洲料理" class="btn filters_2">歐美澳洲料理</li>
      <li  data-filter="異國料理" class="btn filters_2">異國料理</li>
      <li  data-filter="懶人料理" class="btn filters_2">懶人料理</li>
      <li  data-filter="創意料理" class="btn filters_2">創意料理</li>
      <li  data-filter="養生料理" class="btn filters_2">養生料理</li>
      </ul>
    <ul style="display: flex;">
      <li  data-filter="素食" class="btn filters_3" style="margin-left:5px;">素食</li>
      <li  data-filter="非素食" class="btn filters_3" style="margin-left:5px;">非素食</li>
      <li  data-filter="純肉" class="btn filters_3" style="margin-left:5px;">純肉</li>
      <li  data-filter="海鮮" class="btn filters_3" style="margin-left:5px;">海鮮</li>
      <li  data-filter="米麵澱粉類主食" class="btn filters_3" style="margin-left:5px;">米麵澱粉類主食</li>
      <li  data-filter="羹湯" class="btn filters_3" style="margin-left:5px;">羹湯</li>
      <li  data-filter="乾果與水果" class="btn filters_3" style="margin-left:5px;">乾果與水果</li>
      <li  data-filter="醬料製作" class="btn filters_3" style="margin-left:5px;">醬料製作</li>
      <li  data-filter="其他" class="btn filters_3" style="margin-left:5px;">其他</li>

      </ul>
      
    </ol>
    <form style="margin-top:5px" action="{{url('index_search')}}" method="POST" class="form-inline" role="form" id="food_search">
    <div class="input-group col-md-4 ">
          <input name="name" type="text" class="form-control">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <span class="input-group-btn">
            <button type="submit" class="btn btn-default" type="button">依名稱搜尋</button>
            <button type="submit" class="btn btn-default" type="button">重新搜尋</button>
          </span>
        </div>
        </form>


<!--<form action="{{url('index_search')}}" method="POST" class="form-inline" role="form" id="food_search">-->
<!--
<select name='type_1' class="form-control">
  <option data-filter="早餐" value='早餐'>早餐</option>
  <option data-filter='午餐' value='午餐'>午餐</option>
  <option data-filter='點心' value='點心'>點心</option>
  <option data-filter='晚餐' value='晚餐'>晚餐</option>
</select>
    <select name='type_2' class="form-control">
  <option value='中式料理'>中式料理</option>
  <option value='亞洲料理'>亞洲料理</option>
  <option value='歐美澳洲料理'>歐美澳洲料理</option>
  <option value='異國料理'>異國料理</option>
  <option value='懶人料理'>懶人料理</option>
  <option value='創意料理'>創意料理</option>
  <option value='養生料理'>養生料理</option>

</select>
    <select name='type_3' class="form-control">
  <option value='素食'>素食</option>
  <option value='非素食'>非素食</option>
  <option value='純肉'>純肉</option>
  <option value='海鮮'>海鮮</option>
  <option value='米麵澱粉類主食'>米麵澱粉類主食</option>
  <option value='乾果與水果'>乾果與水果</option>
  <option value='醬料製作'>醬料製作</option>
  <option value='其他'>其他</option>

</select>
-->
<!--
  <div class="form-group" style="margin-right:0px">
    <div class="input-group">
      <label class="sr-only" for="exampleInputEmail2"></label>
      <input name="food_name" type="text" class="form-control" id="exampleInputEmail2" placeholder="依料理名稱搜尋">
    </div>
  </div>
-->
  <!--<div class="form-group" style="margin-right:0px">
    <label class="sr-only" for="exampleInputPassword2"></label>
    <input type="text" class="form-control" id="exampleInputPassword2" placeholder="依食材名稱搜尋">
  </div>-->
  <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">

  <button type="submit" class="btn btn-default">快速搜尋</button>
</form>-->
</div>

<div class="container" style="text-align: center;">
	<div id='food_list' style="margin:20px;position: relative;" class="row tiles-wrap animated">
                
                    <!--<ul id="myTab" class="nav nav-tabs" role="tablist" style="display: -webkit-inline-box;">
                        <li role="presentation" class="active"><a href="#breakfirst" id="breakfirst-tab" role="tab" data-toggle="tab" aria-controls="breakfirst" aria-expanded="false">老師上菜</a></li>
                        <li role="presentation" class=""><a href="#lunch" role="tab" id="lunch-tab" data-toggle="tab" aria-controls="lunch" aria-expanded="true">素人上菜</a></li>
                        <li role="presentation" class=""><a href="#desert" role="tab" id="desert-tab" data-toggle="tab" aria-controls="desert" aria-expanded="true">素人上菜</a></li>
                        <li role="presentation" class=""><a href="#dinner" role="tab" id="dinner-tab" data-toggle="tab" aria-controls="dinner" aria-expanded="true">素人上菜</a></li>

                    </ul>-->
                    <!--<div id="myTabContent" class="tab-content"style="margin-top:30px"id="food_index_catorgory">
                        <div role="tabpanel" class="tab-pane fade row" id="breakfirst" aria-labelledby="breakfirst-tab">-->
                            @foreach ($tasks as $task)
                            <li class="col-md-3 food-block" data-filter-class=["{{$task->style_1}}","{{$task->style_2}}","{{$task->style_3}}"]>
                                <a href="tasks/{{ $task-> id }}" class="thumbnail">
                                    @if($task->article_type=='p')
                                <img data-src="{{ $task->img_url }}"  src="<?php echo url('foodpic-upload')?>/{{$task->img_url}}" data-holder-rendered="true" style="display: block;">
                               
                                    @else<img data-src="{{ $task->img_url }}"  src="{{ $task->img_url }}" data-holder-rendered="true" style="display: block;">
                                        
                                        @endif
                                {{ $task->name }}

                                </a>
                            </li>
                            @endforeach

                  
                    </div>     
            </div>
</div>
<script type="text/javascript">
    (function($) {
      // Instantiate wookmark after all images have been loaded
      var wookmark;
      imagesLoaded('#food_list', function() {
        wookmark = new Wookmark('#food_list', {
          fillEmptySpace: true // Optional, fill the bottom of each column with widths of flexible height
        });
      });

      // Setup filter buttons when jQuery is available
      var $filters = $('#filters li');
      var $filters_1 = $('#filters .filters_1');
      var $filters_2 = $('#filters .filters_2');
      var $filters_3 = $('#filters .filters_3');


      /**
       * When a filter is clicked, toggle it's active state and refresh.
       */
      function onClickFilter(e) {
        console.log($(e.currentTarget));
        var $item = $(e.currentTarget),
            activeFilters = [],
            filterType = $item.data('filter');
        itemActive = $item.hasClass('active');


        if (!itemActive&&$item.hasClass('filters_1')) {
          $filters_1.removeClass('active');
          itemActive = true;
        } 
        else if(!itemActive&&$item.hasClass('filters_2')){
          $filters_2.removeClass('active');
          itemActive = true;
        }
        else if(!itemActive&&$item.hasClass('filters_3')){
          $filters_3.removeClass('active');
          itemActive = true;
        }
        else {
          itemActive = false;
        }

        if (filterType === 'all') {
          $filters.removeClass('active');
        } else {
          $item.toggleClass('active');

          // Collect active filter strings
          $filters.filter('.active').each(function() {
            activeFilters.push($(this).data('filter'));
            console.log(activeFilters);
          });
        }

        wookmark.filter(activeFilters, 'and');
      }

      // Capture filter click events.
      $('#filters').on('click.wookmark-filter', 'li', onClickFilter);
    })(jQuery);
  </script>

@endsection