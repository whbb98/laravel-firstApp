$("#btn-all").click(function (e) {
    $(this).siblings("button").removeClass("active");
    $(this).addClass("active");
    $(".meeting").show();
});

$("#btn-scheduled").click(function (e) {
    $(this).siblings("button").removeClass("active");
    $(this).addClass("active");
    $(".meeting").hide();
    $(".meeting").filter(function () {
        return $(this).data("meeting-type") === "scheduled"
    }).show()
});

$("#btn-happening").click(function (e) {
    $(this).siblings("button").removeClass("active");
    $(this).addClass("active");
    $(".meeting").hide();
    $(".meeting").filter(function () {
        return $(this).data("meeting-type") === "happening"
    }).show()
});


