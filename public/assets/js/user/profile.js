console.log("welcome to profile js (user-page)");

$("#edit-profile-bio-btn").click(function (e) {
    $("#profile-bio-form input, textarea").removeAttr("disabled");
});


$("#edit-career-btn").click(function (e) {
    $("#career-form input, select").removeAttr("disabled");
});


$("#edit-notifications-btn").click(function (e) {
    $("#notifications-form input").removeAttr("disabled");
    $("#notifications-form button").removeAttr("disabled");
});

$("#edit-contactme-btn").click(function (e) {
    $("#contactme-form input").removeAttr("disabled");
    $("#contactme-form select").removeAttr("disabled");
    $("#contactme-form button").removeAttr("disabled");
});