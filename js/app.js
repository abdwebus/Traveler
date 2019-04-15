// Author: Ariel Contreras
// Toggle responsive nav list
$(document).ready(function() {
    $(".menu-icon").on("click", function() {
          $("nav ul").toggleClass("showing");
    });


});

// Author: Ariel Contreras
// Scrolling Effect
$(window).on("scroll", function() {
    if($(window).scrollTop()) {
          $('nav').addClass('black');
    }

    else {
          $('nav').removeClass('black');
    }
})

// Author: Abdulwahab Alansri
// Handle the deletion of bookings
// Makes an ajax call
function deleteBooking(bookingID){
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