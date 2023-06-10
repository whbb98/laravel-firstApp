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

function renderParticipant(emailInput) {
    const obj = {
        username: "habhoob11",
        full_name: "abdelouahab radja",
        email: emailInput
    }
    let item = document.createElement("li");
    item.className = "row mb-1 rounded";
    const username = document.createElement("span");
    username.className = "col-2";
    username.textContent = obj.username;
    const fullName = document.createElement("span");
    fullName.className = "col-4";
    fullName.textContent = obj.full_name;
    const email = document.createElement("span");
    email.className = "col-6";
    email.setAttribute("data-type", "email");
    email.textContent = obj.email;
    item.append(username, fullName, email);
    $("#bp-list").append(item);
}

$("#bp-input").keypress(function (e) {
    let keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode == '13') {
        const email = $(this).val();
        e.preventDefault();
        if (validateEmail(email)) {
            if (!getParticipantList().includes(email)) {
                renderParticipant(email);
                console.log(getParticipantList());
            } else {
                alert("Email is Already in the List");
            }
        } else {
            alert("Enter a Valid Email");
        }
    }
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


$("#upload-btn").click(function (e) { 
    $("#files_input").trigger("click");
});

