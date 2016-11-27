;
function getPhone(phoneNum) {
    console.log("GET /phone/" + phoneNum);
    $.get("/phone/" + phoneNum, function(data) {
        console.log("RESPONSE: " + data);
        $("#" + phoneNum).replaceWith("<p class='phone'>Телефон: " + data + "</p>");
    });
    console.log('TODO: Phone as image')
}