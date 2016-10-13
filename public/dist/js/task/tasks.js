Vue.component('comments',{
	template:'#comment-template',

	data: function(){
		return {
			list:[]
		};
	} ,
	created:function(){

		$.getJSON('tasks/foodcomment', function(comments){
			this.list = comments;
		}.bind(this));
	}


});

new Vue({
	el:'body'

})