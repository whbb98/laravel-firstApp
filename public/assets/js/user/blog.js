console.log("welcome to blog page");

// >>>>>>>>>>>>>>>>>>>>>>>>>>>> slider

let currentImage = 1;
let currentUser = 0;
const totalImages = $('#img-slider img').length;

function showImage(n) {
    $('#img-slider img').hide();
    $('#img-' + n).fadeIn('slow');
}
function nextImage() {
    currentImage++;
    if (currentImage > totalImages) {
        currentImage = 1;
    }
    showImage(currentImage);
    $("#slider_count").text(currentImage + " / " + totalImages);
}
function prevImage() {
    currentImage--;
    if (currentImage < 1) {
        currentImage = totalImages;
    }
    showImage(currentImage);
    $("#slider_count").text(currentImage + " / " + totalImages);
}
$('#img-slider img').first().show();
$('#next-btn').click(nextImage);
$('#previous-btn').click(prevImage);
$("#slider_count").text(currentImage + " / " + totalImages);
// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< slider

$("#polygon-btn").click(function (e) {
    $(this).addClass("active");
    $("#rectangle-btn").removeClass("active");
    for (annoItem of anno[0]) {
        annoItem.setDrawingTool("polygon");
    }
});

$("#rectangle-btn").click(function (e) {
    $(this).addClass("active");
    $("#polygon-btn").removeClass("active");
    for (annoItem of anno[0]) {
        annoItem.setDrawingTool("rect");
    }
});

$("#hide-btn").click(function (e) {
    $(this).toggleClass("active");
    $("#show-eye").toggleClass("d-none");
    $("#hide-eye").toggleClass("d-none");
    annoVisibility = !annoVisibility;

    for (const annoItem of anno[currentUser]) {
        annoItem.setVisible(annoVisibility);
    }
});

$("#fullscreen-btn").click(function (e) {
    alert("full screen mode not supported yet");
    // $("#img-slider").css("width","100vw");
    // $("#img-slider").css("height","100vh");
    // $("#img-slider").css("position","fixed");
    // $("#img-slider").css("top","0");
    // $("#img-slider").css("left","0");
});

$("#feedback-edit-btn").click(function (e) {
    $("#feedback_table input").attr("disabled", false);
    $("#feedback_table label").removeClass("text-muted");
});

function fetchAnnotations() {

}
function renderAnnotations() {
    anno[0][0].loadAnnotations('http://doctoraicollab.test/mock/json/anno-0.json');
    anno[1][0].loadAnnotations('http://doctoraicollab.test/mock/json/anno-1.json');
    anno[2][0].loadAnnotations('http://doctoraicollab.test/mock/json/anno-2.json');
    anno[3][0].loadAnnotations('http://doctoraicollab.test/mock/json/anno-3.json');
}

// >>>>>>>>>>>>>>>>>>> Initializing Annotorious
const anno = [];
let annoVisibility = true;
for (user of $("#users-list li")) {
    // console.log($(user).attr("id"), $(user).data("userid"));
    userAnno = [];
    for (img of $('#img-slider img')) {
        userAnno.push(
            Annotorious.init({
                image: img
            })
        );
    }
    anno.push(userAnno);
}
// >>>>>>>>>>>>>>> make all other users anno read only
for (let i = 1; i < anno.length; i++) {
    for (const obj of anno[i]) {
        obj.readOnly = true;
        obj.setVisible(false);
    }
}
// >>>>>>>>>>>> anno createAnnotation event
for (const annoItem of anno[0]) {
    annoItem.on('createAnnotation', function (annotation) {
        console.log(
            `#user-${currentUser} #img-${currentImage} Annotations N°: ${annoItem.getAnnotations().length}`
        );
    });
}
// >>>>>>>>>>>> anno deleteAnnotation event
for (const annoItem of anno[0]) {
    annoItem.on('deleteAnnotation', function (annotation) {
        console.log(
            `#user-${currentUser} #img-${currentImage} Annotations N°: ${annoItem.getAnnotations().length}`
        );
    });
}
// >>>>>>>>>>>>>>>>>>>>>> fetching annotations
renderAnnotations();

// >>>>>>>>>>>>>>>>< filtering annotations by user
$('ul').on('click', 'li', function () {
    $(this).parent().children().removeClass("active");
    $(this).addClass("active");
    currentUser = parseInt($(this).attr("id").split("-")[1]) - 1;
    // >>>>>>>>>> hiding all annotations
    for (const userAnno of anno) {
        for (const obj of userAnno) {
            obj.setVisible(false);
        }
    }
    // >>>>>>>>>>>>> display current user annotations
    for (const obj of anno[currentUser]) {
        obj.setVisible(annoVisibility);
    }
});
