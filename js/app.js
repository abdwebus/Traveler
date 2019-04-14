$(document).ready(function() {
    $(".menu-icon").on("click", function() {
          $("nav ul").toggleClass("showing");
    });


});

// Scrolling Effect

$(window).on("scroll", function() {
    if($(window).scrollTop()) {
          $('nav').addClass('black');
    }

    else {
          $('nav').removeClass('black');
    }
})


function deleteBooking(bookingID){
   	console.log(bookingID);

   	var request = $.ajax({
		url: 'bookingPage.php',
		type: "POST",
		data: {
			bookingID: bookingID,
		},
		dataType: "html"
	});

	request.done(function(msg) {
		if(msg === 'success'){
			location.reload();
		} else {
			alert(msg);
		}
	});

	request.fail(function(jqXHR, textStatus) {
		alert( "Request failed: " + textStatus );
	});
}