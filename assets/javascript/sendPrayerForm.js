function sendPrayerForm() {

	// var valid;
	// valid = validateEmail();
	// console.log("the email address is " + valid);
	// if (valid) {
var newMessage = $("#prayerMessage").val();
console.log(newMessage);
		$.ajax({
			url: "https://www.mtolivebaptistchurch.net/assets/PHP/prayerForm.php",
			data: 'message=' + $("#prayerMessage").val(), 
			method: 'POST',
			headers: {
				"accept": "application/json",
				"Access-Control-Allow-Origin": "*"
			},
			success: function (data) {
				// $("#prayer-status").html(data);
				$("#prayer-status").html("Message has been sent!");
				$("form").trigger("reset");
				$("#prayer-status").css({
					"color": "red",
					"background-color": "white"
				});
				console.log(data);
				console.log("Everything was successful")
			},
			error: function (err) {
				console.log(err);
			}
		})
		//clearForm();
	} 
	// else {
	// 	console.log("* An Unexpected Error Has Occureed! *");
	// }
	// $("#emailAddress").empty();
    // $("#prayerMessage").empty();
	$("#prayer-status").empty();
// }

// function validateEmail() {
// 	var valid = true;
// 	//if (!$("#emailInput").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
// 	if (!$("#emailAddress").val().match(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/)) {

// 		// var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
// 		$("#prayer-status").html(" * Invalid Email Address!  *");
// 		$("#prayer-status").css({

// 			// 'background-color': '#FFFFDF',
// 			'color': 'red',
// 			'font-weight': 'bold'
// 		});

// 		valid = false;
// 	}

// 	return valid;
// }

function clearForm() {
console.trace("clearForm");
	// $("#emailAddress").empty();
	$("#prayerMessage").empty();
	$("#prayer-status").empty();

}