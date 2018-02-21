function addBasicfood() {
    add = '<div class="foodBasicgroup row"><input name="ingridient[] style="height: 34px;margin:4px 6px 4px 0px" class="col-md-5" type="text" placeholder="食材名稱"><input name="quantity[]" style="height: 34px;margin:4px 0px 4px 6px" class="col-md-5" type="text" placeholder="份量"></div>';
    $("#foodBasiclist").append(add);
}

function addFoodintro() {
    num = $('.food_pic').length + 1;
    add = '<div class="row food_pic" style="margin-bottom:30px"><input type="file" class="upl col-md-12" value="Edit Image"  multiple name="img_url[]" id="image"><div class="col-md-5"><img  class="" style="width: 400px; height: 300px;"></div><div class="col-md-7"><h3 class="add_Foodintro_count"><strong>' + num + '</strong></h3><h3><textarea name="intro[]" rows="4" style="width:100%" placeholder="文字說明:"></textarea></h3></div></div>'
    $('#addFoodintrolist').append(add);
}

function getYoutubeId() {
    var myId = $("input[id='youtube_url']").val()
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = myId.match(regExp);

    if (match && match[2].length == 11) {

    $('#myyoutube').html('<iframe width="560" height="400" src="//www.youtube.com/embed/' + match[2] + '" frameborder="0" allowfullscreen></iframe>');

    } 
    else if (myId.includes('facebook')) {
    $('#myyoutube').html('<iframe width="560" height="400" src="//www.facebook.com/plugins/video.php?href=' + myId + '" frameborder="0" allowfullscreen></iframe>');
    }
    else{
        $('#myyoutube').html(myId);
    }
}

$(function() {

    $(" body").on("change","input[type='file']",function() {

        var img = $(this).next('div').find("img");

        readURL(this, img);
    });
  

    function readURL(input, img) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                

                img.attr("src", e.target.result)
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


})


