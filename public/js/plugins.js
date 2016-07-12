$('.close-chat').on('click',function (e) {
	
	e.preventDefault();

	$(this).parents('.chat-box').remove();
});


$('.panel-heading').on('click',function (e) {
	
	

     if ( $('.chat-box').hasClass('minimize')) {
	
	e.preventDefault();
	$(this).parents('.chat-box').css({"margin-top":"-151px"});
	$(this).parents('.chat-box').removeClass('minimize');
	$(this).parents('.panel-footer').addClass('minimize');

	

     } else {

     	e.preventDefault();
	$(this).parents('.chat-box').css({"margin-top":"133px"});
	$(this).parents('.chat-box').addClass('minimize');
	$(this).parents('.panel-footer').addClass('minimize');

	/**/


     }


	
});

