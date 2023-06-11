$("#btn-all").click(function (e) {
    $(this).siblings("button").removeClass("active");
    $(this).addClass("active");
    $(".blog").show();
});

$("#btn-mine").click(function (e) {
    $(this).siblings("button").removeClass("active");
    $(this).addClass("active");
    $(".blog").hide();
    $(".blog").filter(function () {
        return $(this).data("blog-type") === "mine"
    }).show()
});

$("#btn-participate").click(function (e) {
    $(this).siblings("button").removeClass("active");
    $(this).addClass("active");
    $(".blog").hide();
    $(".blog").filter(function () {
        return $(this).data("blog-type") === "participate"
    }).show()
});

$("#btn-pending").click(function (e) {
    $(this).siblings("button").removeClass("active");
    $(this).addClass("active");
    $(".blog").hide();
    $(".blog").filter(function () {
        return $(this).data("blog-type") === "pending"
    }).show()
});

// $("#blog-form").submit(function (e) { 
//     e.preventDefault();
//     console.log("blog submitted");
// });

$('#blog-form').on('submit', function (e) {
    e.preventDefault();
    participantEmails = getParticipantList();
    if (participantEmails.length < 1) {
        alert("No Participant Selected");
        return;
    }
    $('#participants-input').val(JSON.stringify(participantEmails));
    this.submit();
});

function validateEmail(email) {
    var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return regex.test(email);
}

function getParticipantList() {
    const participantEmails = [];
    const ul = $("#bp-list").children();
    for (let i = 0; i < ul.length; i++) {
        participantEmails.push(ul[i].children[2].textContent);
    }
    return participantEmails;
}

function renderParticipant(userObj) {
    if (!getParticipantList().includes(userObj.email)) {
        let item = document.createElement("li");
        item.className = "row mb-1 rounded";
        const username = document.createElement("span");
        username.className = "col-2";
        username.textContent = userObj.username;
        const fullName = document.createElement("span");
        fullName.className = "col-4";
        fullName.textContent = userObj.first_name + userObj.last_name;
        const email = document.createElement("span");
        email.className = "col-6";
        email.setAttribute("data-type", "email");
        email.textContent = userObj.email;
        item.append(username, fullName, email);
        $("#bp-list").append(item);
    } else {
        alert("Email is Already in the List");
    }
}

$("#bp-input").keyup(function (e) {
    fetchParticipants(renderSuggestions);
    console.log(getParticipantList());
});

$("#bp-list").click(function (e) {
    if (e.target.parentElement.tagName === "LI") {
        const item = e.target.parentElement;
        const email = item.children[2].textContent;
        item.remove();
        console.log(getParticipantList());
    }
});

$("#has_meeting").change(function () {
    if (this.checked) {
        $("#has-meeting-input").prop("disabled", false);
        $("#has-meeting-url").prop("disabled", false);
    } else {
        $("#has-meeting-input").prop("disabled", true);
        $("#has-meeting-url").prop("disabled", true);
    }
});


const suggestions = [];

function renderSuggestions() {
    $('#bp-input').on('input', function () {
        const query = $(this).val();

        fetchParticipants(function () {
            $('#search-suggestions').empty();
            suggestions.forEach(function (user) {
                const suggestionItem = $('<button>')
                    .addClass('dropdown-item')
                    .html(
                        '<img src="' + user.profile.photo + '" class="me-2 rounded-circle" width="32" height="32">' +
                        '<span class="fw-bold">' + user.username + '</span><br>' +
                        '<small>' + user.email + '</small>'
                    );

                suggestionItem.on('click', function () {
                    renderParticipant(user);
                    $('#search-suggestions').hide();
                });

                $('#search-suggestions').append(suggestionItem);
            });

            $('#search-suggestions').show();
        });
    });

    $(document).on('click', function (event) {
        if (!$(event.target).closest('#bp-input, #search-suggestions').length) {
            $('#search-suggestions').hide();
        }
    });

    $('#search-suggestions').on('click', '.dropdown-item', function (e) {
        e.preventDefault();
        e.stopPropagation();
    });
}

function fetchParticipants(callback) {
    const search = $("#bp-input").val();
    const url = "http://doctoraicollab.test/blogs/suggestParticipants?search=" + search;

    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            response = JSON.parse(response);
            // console.log(response);
            suggestions.length = 0;
            response.forEach(function (user) {
                suggestions.push(user);
            });
            callback();
        },
        error: function (xhr, status, error) {
            console.log("Error: " + error);
        }
    });
}

// >>>>>>>>>>>>>>>>>>>>> Init Script >>>>>>>>>>>>>>>>>>>>>>>>
// fetchParticipants(renderSuggestions);
// <<<<<<<<<<<<<<<<<<<<<< Init Script <<<<<<<<<<<<<<<<<<<<<<
