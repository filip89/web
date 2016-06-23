$(document).on("click",".replySecButton", function(){
	var buttonName = $(this).text();
	if(buttonName == "Cancel"){
		$(this).text('Make a reply');
	}
	else {
		$(this).text('Cancel');
	}
	$(this).closest('tr').find('.postSection').slideToggle('fast');
});
