
function sendPrayerForm() {
    
    var valid;	
    valid = validateEmail();
    console.log("the email address is " + valid);
     if(valid) {
       
    $.ajax({
        url: "https://www.mtolivebaptistchurch.net/assets/PHP/prayerForm.php",
        data: 'email=' + $("#emailAddress").val() + '&message=' + $("#prayerMessage").val(),  
        method: 'POST',
        success: function (data) {
            $("#prayer-status").html(data);
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
    } else {
        console.log("* An Unexpected Error Has Occureed! *");
    }
    $("#emailAddress").empty();
    $("#message").empty();
    $("#prayer-status").empty();
}
function validateEmail() {
    var valid = true;
    //if (!$("#emailInput").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        if (!$("#emailAddress").val().match(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/)) {

       // var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        $("#prayer-status").html(" * Invalid Email Address!  *");
        $("#prayer-status").css({
            
            // 'background-color': '#FFFFDF',
            'color': 'red',
            'font-weight': 'bold' });
       
        valid = false;
    }
   
    return valid;
}

