$(document).ready(function(){
	
	$.get('CatView.php',function(data){
		$('#data-show').html(data);
	})

})