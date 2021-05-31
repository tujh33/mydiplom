// $(document).ready(function(){
// 	$('.slide_auth_r').click(function(){
// 		$('.auth_drop_r').slideToggle(300);
// })
// 	$('.slide_auth_l').click(function(){
// 		$('.auth_drop_l').slideToggle(300);
// })
// console.log("фвыфвфы")
// })
$(document).ready(function($) {
	$('.popup-open').click(function() {
		$('.popup-fade').fadeIn();
		return false;
	});	
	
	$('.popup-close').click(function() {
		$(this).parents('.popup-fade').fadeOut();
		return false;
	});			
	$('.popup-fade').click(function(e) {
		if ($(e.target).closest('.popup').length == 0) {
			$(this).fadeOut();					
		}
	});
	// reg
	$('.popup-open-reg').click(function() {
		$('.popup-fade-reg').fadeIn();
		return false;
	});	
	
	$('.popup-close').click(function() {
		$(this).parents('.popup-fade-reg').fadeOut();
		return false;
	});			
	$('.popup-fade-reg').click(function(e) {
		if ($(e.target).closest('.popup-reg').length == 0) {
			$(this).fadeOut();					
		}
	});
	// add lot
	$('.popup-open-lot').click(function() {
		$('.popup-fade-lot').fadeIn();
		return false;
	});	
	
	$('.popup-close').click(function() {
		$(this).parents('.popup-fade-lot').fadeOut();
		return false;
	});			
	$('.popup-fade-lot').click(function(e) {
		if ($(e.target).closest('.popup-lot').length == 0) {
			$(this).fadeOut();					
		}
	});
	//  form buy
	// $('.popup-open-buy').click(function() {
	// 	$('.popup-fade-buy').fadeIn();
	// 	return false;
	// });	
	
	// $('.popup-close').click(function() {
	// 	$(this).parents('.popup-fade-buy').fadeOut();
	// 	return false;
	// });			
	// $('.popup-fade-buy').click(function(e) {
	// 	if ($(e.target).closest('.popup-buy').length == 0) {
	// 		$(this).fadeOut();					
	// 	}
	// });


});