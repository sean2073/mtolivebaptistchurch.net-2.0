console.log("in js file");


function sendContactForm() {
    
    var valid;	
    valid = validateEmail();
    console.log("the email address is " + valid);
     if(valid) {
       // sendEmail();
    $.ajax({
        url: "https://www.mtolivebaptistchurch.net/assets/PHP/contactForm.php",
        data: 'name=' + $("#nameInput").val() + '&userEmail-address=' +
            $("#emailInput").val() + '&subject=' +
            $("#subjectInput").val() + '&message=' +
            $("#messageTextarea").val(),
        method: 'POST',
        success: function (data) {
            $("#mail-status").html(data);
            $("form").trigger("reset");
            console.log(data);
            console.log("Everything was successful");
        },
        error: function (err) {
            $("#mail-status").html("Error Sending Emeil!");
            console.log(err);
        }
    })
    } else {
        console.log("email address is invalid");
    }
}

function validateEmail() {
    var valid = true;
    //if (!$("#emailInput").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        if (!$("#emailInput").val().match(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/)) {

       // var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        $("#mail-status").html(" * Invalid Email Address!  *");
        $("#mail-status").css({
            'background-color': '#e9f1f162',
            'color': 'red',
            'font-weight': 'bold' });
       
        valid = false;
    }
   
    return valid;
}
// function sendEmail(){
//     console.log("I'm about to send the email");
//     $.ajax({
//         url: "https://www.mtolivebaptistchurch.net/assets/PHP/contactForm.php",
//         data: 'name=' + $("#nameInput").val() + '&userEmail-address=' +
//             $("#emailInput").val() + '&subject=' +
//             $("#subjectInput").val() + '&message=' +
//             $("#messageTextarea").val(),
//         method: "POST",
//         success: function (data) {
//             $("#mail-status").html(data);
//             console.log(data);
//             console.log("Everything was successful")
//         },
//         error: function (err) {
//             console.log(err);
//         }
//     })
// }