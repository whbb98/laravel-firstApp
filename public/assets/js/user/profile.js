console.log("welcome to profile js (user-page)");

$("#photo_remove").click(function (e) {
    e.preventDefault();
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        if (xhttp.responseText == "1") {
            alert("deleted successfully");
            location.reload();
        } else {
            alert("error on delete");
        }
    }
    xhttp.open("GET", "/profile/deleteProfilePhoto");
    xhttp.send();
});

$("#cover_remove").click(function (e) {
    e.preventDefault();
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        if (xhttp.responseText == "1") {
            alert("deleted successfully");
            location.reload();
        } else {
            alert("error on delete");
        }
    }
    xhttp.open("GET", "/profile/deleteProfileCover");
    xhttp.send();
});

$("#edit-profile-bio-btn").click(function (e) {
    $("#profile-bio-form input, textarea").removeAttr("disabled");
});


$("#edit-career-btn").click(function (e) {
    $("#career-form input, select").removeAttr("disabled");
    if ($('#hospitals-select').val() == "0") {
        $("#other-hospital").removeAttr("hidden");
    }
    console.log($('#hospitals-select').val());
});
$('#hospitals-select').change(function () {
    const selectedValue = $(this).val();
    if (selectedValue === '0') {
        $("#other-hospital").removeAttr("hidden");
    } else {
        $("#other-hospital").attr("hidden", true);
        $("#other-hospital input").prop("disabled", true);
    }
});

$('#career-data').on('click', 'tr', function () {
    const rowID = $(this).attr('id');
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        if (xhttp.responseText == "1") {
            alert("deleted successfully");
            location.reload();
        } else {
            alert("Error on Delete");
        }
    }
    xhttp.open("GET", `http://doctoraicollab.test/profile/dropProfileCareerRow/${rowID}`);
    xhttp.send();
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