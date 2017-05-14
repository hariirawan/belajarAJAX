$(window).scroll(function(event) {
	var wScrool = $(this).scrollTop();
	$('.jumbotron img').css({
		transform: 'translate(0,'+wScrool/1.5+'%)'
	});
	$('.jumbotron h1').css({
		transform: 'translate(0,'+wScrool/1+'%)'
	});
	$('.jumbotron p').css({
		transform: 'translate(0,'+wScrool/0.5+'%)'
	});

});
$(window).on('load', function(event) {	
	event.preventDefault();
	setTimeout(function(){
		$(".jumbotron img").addClass('imgtampil');
	},200);
	setTimeout(function(){
		$(".jumbotron h1").addClass('h1tampil');
	},400*2);
	setTimeout(function(){
		$(".jumbotron .text").addClass('muncul');
	},800*2);
});
