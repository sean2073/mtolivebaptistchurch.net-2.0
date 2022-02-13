var apiKey = "166a433c57516f51dfab1f7edaed8413";
var secret = '6LcKDdYZAAAAAP3j3g88ZvnX2stpCjEP9coWJsMM';
var grecaptcha = document.getElementsByClassName('g-recaptcha');
// var grecaptcha = gReCaptcha.value;
console.log(grecaptcha);

// var queryURL3 = "http://api.openweathermap.org/data/2.5/forecast?q=" + q + "&cnt=5&units=imperial&APPID=" + apiKey;
var queryURL = "https://www.google.com/recaptcha/api/siteverify?secret=" + secret + "&respone=" + grecaptcha-response;
//queryURL =
 //   "http://api.openweathermap.org/data/2.5/forecast?id=" + cityId + "&APPID=" + apiKey;
 
  $.ajax({
    //$.curl({
    url: queryURL,
    method: "POST",
    headers: {
        "Access-Control-Allow-Origin": "https://www.google.com/recaptcha/api/siteverify&secret=6LcKDdYZAAAAAP3j3g88ZvnX2stpCjEP9coWJsMM"

        // "My-First-Header":"first value",
        // "My-Second-Header":"second value"
    }
  }).done(function(response) {
    //console.log(response.hits[0].recipe.url);
    console.log(response);
});