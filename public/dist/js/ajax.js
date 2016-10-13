/*$(function() {


$('#collect').on('click',function(){
    $.ajax({
        method:'POST',
        url:url,
        data:{postId:'',_token:token}
    })
    .done(function (msg){
        console.log(msg['message']);

    });

alert(id);

});

});*/
$(function() {
    $('#follower').click(function(e) {

        e.preventDefault();

        var l = Ladda.create(this);
        var token = $(this).data('token');
        //var id = $(this).attr("id");  
        //alert(token);


        l.start();
        
        $.post("follow", { "follow_id": follow_id, '_token': token }, function(response) {
            
            if (response.result != null && response.result == "1") {
                
                if (response.isunlike == "1") {

                    $('#follower').removeClass("btn-success");
                    $('#follower').addClass("btn-danger");
                    $('#follower span:nth-child(2)').html(response.text);
                    $('#follower span:nth-child(1)').css('display', 'none');
                } else {
                    $('#follower').removeClass('btn-danger');
                    $('#follower').addClass("btn-success");
                    $('#follower span:nth-child(2)').html(response.text);
                    $('#follower span:nth-child(1)').css('display', 'initial');

                }
            } else { alert("Server Error"); }
        }, "json").always(function() { l.stop(); });
        return false;
        
    });
    $('#recommand').click(function(e) {

        e.preventDefault();

        var l = Ladda.create(this);
        var token = $(this).data('token');
        //var id = $(this).attr("id");  

        l.start();

        $.post("recommand", { "task_id": id, '_token': token }, function(response) {

            if (response.result != null && response.result == "1") {
                if (response.isunlike == "1") {

                    $('#recommand').removeClass("btn-success");
                    $('#recommand').addClass("btn-danger");
                    $('#recommand span:nth-child(2)').html(response.text);
                    $('#recommand span:nth-child(1)').css('display', 'none');
                } else {
                    $('#recommand').removeClass('btn-danger');
                    $('#recommand').addClass("btn-success");
                    $('#recommand span:nth-child(2)').html(response.text);
                    $('#recommand span:nth-child(1)').css('display', 'initial');

                }
            } else { alert("Server Error"); }
        }, "json").always(function() { l.stop(); });
        return false;
    });

    $('#collect').click(function(e) {

        e.preventDefault();

        var l = Ladda.create(this);
        var token = $(this).data('token');
        //var id = $(this).attr("id");  

        l.start();

        $.post("collect", { "task_id": id, '_token': token }, function(response) {

            if (response.result != null && response.result == "1") {
                if (response.isunlike == "1") {

                    $('#collect').removeClass("btn-success");
                    $('#collect').addClass("btn-danger");
                    $('#collect span:nth-child(2)').html(response.text);
                    $('#collect span:nth-child(1)').css('display', 'none');
                } else {
                    $('#collect').removeClass('btn-danger');
                    $('#collect').addClass("btn-success");
                    $('#collect span:nth-child(2)').html(response.text);
                    $('#collect span:nth-child(1)').css('display', 'initial');

                }
            } else { alert("Server Error"); }
        }, "json").always(function() { l.stop(); });
        return false;
    });


        $('#notified').click(function(e) {
            
        $.ajax({
            type: 'post',
            url: 'checked',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('input[name=id]').val(),
                
            },
            success: function(data) {
                $('#bling').replaceWith("");
            }
        });
    });


    $('.index-select-food').on("click", function() {
                $.post(selectstyle, $('#selectstyle').serialize(), function(response) {
                    $("#afterselectold").fadeOut().html('');
                    //console.log(response)
                    //var contact = JSON.parse(response);
                    for(var i=0;i<5;i++){
                        idd = response[i].id;
                        console.log(idd);
                    //console.log(response[i].id);
                    var nowurl =window.location.href ;
                    var a_1 = '<div class="col-md-4"><a href="tasks/'+idd+'" class="thumbnail">'
                        if(response[i].article_type=='p'){
                        a_2 = '<img data-src="holder.js/100%x180" alt="100%x180" src="'+nowurl+'foodpic-upload/'+response[i].img_url+'" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">'   
                        }
                        else{
                        a_2 = '<img data-src="holder.js/100%x180" alt="100%x180" src="'+response[i].img_url+'" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;"></a></div>'

                        }
                        $("#afterselectold").append(a_1+a_2).fadeIn();


                    
                }
});
});

    $('#try_again_random_food').on("click", function() {

        $.post('chooserandomfood',$('#random_choose').serialize(), function(response){
            var nowurl =window.location.href ;
                a_1 = '<a href="tasks/'+response[0].id+'" class="thumbnail">';
                if(response[0].article_type=='p'){
                a_2 = '<img data-src="holder.js/100%x180" alt="100%x180" src="'+nowurl+'foodpic-upload/'+response[0].img_url+'" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;"></a></div>'   
                }
                else{
                a_2 = '<img data-src="holder.js/100%x180" alt="100%x180" src="'+response[0].img_url+'" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;"></a></div>'

                }
                a_3 = '<span style="float:right; font-weight:bold;font-size:20px">前菜</span>';


            $('#random_food_1').hide().html(a_1+a_2+a_3).fadeIn();
            
                a_1 = '<a href="tasks/'+response[1].id+'" class="thumbnail">';
                if(response[1].article_type=='p'){
                a_2 = '<img data-src="holder.js/100%x180" alt="100%x180" src="'+nowurl+'foodpic-upload/'+response[1].img_url+'" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;"></a></div>'   
                }
                else{
                a_2 = '<img data-src="holder.js/100%x180" alt="100%x180" src="'+response[1].img_url+'" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;"></a></div>'

                }
                a_3 = '<span style="float:right; font-weight:bold;font-size:20px">主食</span>';


            $('#random_food_2').hide().html(a_1+a_2+a_3).fadeIn();

                a_1 = '<a href="tasks/'+response[2].id+'" class="thumbnail">';
                if(response[2].article_type=='p'){
                a_2 = '<img data-src="holder.js/100%x180" alt="100%x180" src="'+nowurl+'foodpic-upload/'+response[2].img_url+'" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;"></a></div>'   
                }
                else{
                a_2 = '<img data-src="holder.js/100%x180" alt="100%x180" src="'+response[2].img_url+'" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;"></a></div>'

                }
                a_3 = '<span style="float:right; font-weight:bold;font-size:20px">主菜</span>';


            $('#random_food_3').hide().html(a_1+a_2+a_3).fadeIn();

                a_1 = '<a href="tasks/'+response[3].id+'" class="thumbnail">';
                if(response[3].article_type=='p'){
                a_2 = '<img data-src="holder.js/100%x180" alt="100%x180" src="'+nowurl+'foodpic-upload/'+response[3].img_url+'" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;"></a></div>'   
                }
                else{
                a_2 = '<img data-src="holder.js/100%x180" alt="100%x180" src="'+response[3].img_url+'" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;"></a></div>'

                }
                a_3 = '<span style="float:right; font-weight:bold;font-size:20px">甜點</span>';


            $('#random_food_4').hide().html(a_1+a_2+a_3).fadeIn();
        })

});


    

});
/*$.ajax({
                type: 'POST',
                url: selectstyle,
                data: $('#selectstyle').serialize(),

                success: function(data) {
                            debugger

                    alert(data); // show response from the php script.
                }
            }).fail(function(){
                alert('fail');
            })



                          
                        </a>
                    </div>
                @endforeach
            */