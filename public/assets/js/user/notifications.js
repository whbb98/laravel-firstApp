$("#all-btn").click(function (e) {
    $(this).siblings("button").removeClass("active");
    $(this).addClass("active");
    $(".notifications li").show();
});

$("#unread-btn").click(function (e) {
    $(this).siblings("button").removeClass("active");
    $(this).addClass("active");
    $(".notifications li").hide();
    $(".notifications li").filter(function () {
        return $(this).data("read-status") === "unread"
    }).show()
});