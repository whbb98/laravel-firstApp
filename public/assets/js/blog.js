console.log("welcome to blog page");

// >>>>>>>>>>>>>>>>>>>>>>>>>>>> slider

var currentImage = 1;
var totalImages = $('#img-slider img').length;

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
    for (annoItem of anno) {
        annoItem.setDrawingTool("polygon");
    }
});

$("#rectangle-btn").click(function (e) {
    $(this).addClass("active");
    $("#polygon-btn").removeClass("active");
    for (annoItem of anno) {
        annoItem.setDrawingTool("rect");
    }
});

$("#hide-btn").click(function (e) {
    $(this).toggleClass("active");
    $("#show-eye").toggleClass("d-none");
    $("#hide-eye").toggleClass("d-none");
    annoVisibility = !annoVisibility;
    for (annoItem of anno) {
        annoItem.setVisible(annoVisibility);
    }
});

// >>>>>>>>>>>>>>>>>>> Initializing Annotorious

const anno = [];
let annoVisibility = true;
for (img of $('#img-slider img')) {
    anno.push(
        Annotorious.init({
            image: img
        })
    );
}
for (annoItem of anno) {
    annoItem.on('createAnnotation', function (annotation) {
        console.log(
            `#img-${currentImage} Annotations N°: ${anno[currentImage - 1].getAnnotations().length}`
        );
    });
}
for (annoItem of anno) {
    annoItem.on('deleteAnnotation', function (annotation) {
        console.log(
            `#img-${currentImage} Annotations N°: ${anno[currentImage - 1].getAnnotations().length}`
        );
    });
}
// <<<<<<<<<<<<<<<<<< < Initializing Annotorious
// JSON.stringify(anno[1].getAnnotations())
// anno[0].loadAnnotations('http://doctoraicollab.test/assets/js/annoTest.json');
