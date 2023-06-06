console.log("welcome to new account page");

$("#show-password").click(function (e) {
    $(this).toggleClass("active");
    const fieldType = $("#password-input").attr("type");
    $("#password-input").attr(
        "type", fieldType == "password" ? "text" : "password"
    );
});