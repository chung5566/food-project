               @extends('welcome')
               @section('selectstyle')  

                <form action="{{url('selectstyle')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <h2>料理篩選</h2>
                <br>
                <div  class="btn-group radius-border" data-toggle="buttons" role="group" aria-label="foodtime">
                <label class="btn btn-primary active">
                    <input class="index-select-food" type="radio" name="style_1" id="option1" autocomplete="off" value="早餐" checked> 早餐
                </label>
                <label class="btn btn-primary">
                    <input class="index-select-food" type="radio" name="style_1" id="option2" autocomplete="off" value="午餐"> 午餐
                </label>
                <label class="btn btn-primary">
                    <input class="index-select-food" type="radio" name="style_1" id="option3" autocomplete="off" value="晚餐"> 晚餐
                </label>
            </div>
                <div class="btn-group radius-border" role="group" aria-label="foodstyle" data-toggle="buttons">
                    <label class="btn btn-primary active">
                    <input class="index-select-food" type="checkbox" name="style_2" id="option1" autocomplete="off" value="中式料理" checked> 中式料理
                </label>
                <label class="btn btn-primary">
                    <input class="index-select-food" type="checkbox" name="style_2" id="option2" autocomplete="off" value="亞洲料理"> 亞洲料理
                </label>
                <label class="btn btn-primary">
                    <input class="index-select-food" type="checkbox" name="style_2" id="option3" autocomplete="off" value="歐美澳洲料理"> 歐美澳洲料理
                </label>
                <label class="btn btn-primary">
                    <input class="index-select-food" type="checkbox" name="style_2" id="option4" autocomplete="off" value="異國料理"> 異國料理
                </label>
                <label class="btn btn-primary">
                    <input class="index-select-food" type="checkbox" name="style_2" id="option5" autocomplete="off" value="懶人料理"> 懶人料理
                </label>
                <label class="btn btn-primary">
                    <input class="index-select-food" type="checkbox" name="style_2" id="option6" autocomplete="off" value="創意料理"> 創意料理
                </label>
                <label class="btn btn-primary">
                    <input class="index-select-food" type="checkbox" name="style_2" id="option7" autocomplete="off" value="養生料理"> 養生料理
                </label>
            </div>
                <div class="btn-group radius-border" role="group" aria-label="foodstyle" data-toggle="buttons">
                    <label class="btn btn-primary active">
                    <input class="index-select-food" type="radio" name="style_3" id="option1" autocomplete="off" value="素食" checked> 素食
                </label>
                <label class="btn btn-primary">
                    <input class="index-select-food" type="radio" name="style_3" id="option2" autocomplete="off" value="非素食"> 非素食
                </label>
                <label class="btn btn-primary">
                    <input class="index-select-food" type="radio" name="style_3" id="option3" autocomplete="off" value="純肉"> 純肉
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="style_3" id="option4" autocomplete="off" value="海鮮"> 海鮮
                </label>
                <label class="btn btn-primary">
                    <input class="index-select-food" type="radio" name="style_3" id="option5" autocomplete="off" value="米麵澱粉類主食"> 米麵澱粉類主食
                </label>
                <label class="btn btn-primary">
                    <input class="index-select-food" type="radio" name="style_3" id="option6" autocomplete="off" value="乾果與水果"> 乾果與水果
                </label>
                <label class="btn btn-primary">
                    <input class="index-select-food" type="radio" name="style_3" id="option7" autocomplete="off" value="醬料製作"> 醬料製作
                </label>
                 <label class="btn btn-primary">
                    <input class="index-select-food" type="radio" name="style_3" id="option8" autocomplete="off" value="其他"> 其他
                </label>
                    
                
                </div>
                <button type="radio" class="btn"><a href="{{ url('tasks') }}">料理總覽</button>
            </form>
            @endsection
