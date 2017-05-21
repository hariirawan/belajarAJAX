$('a').click(function(event) {

	event.preventDefault();
	/* Act on the event */
	var url= $(this).attr('href');
	$.ajax({
		url: 'content/'+url,
		type: 'GET',
		success: function(data){
        $(".colom2").html(data).delay(250).fadeIn(300);
    	}
	});
	

});