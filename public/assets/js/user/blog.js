let currentImage = 0;
let currentUser = 0;

// function to get the current position which user on which image
function getCurrentData() {
    return {
        image: "img-" + currentImage,
        user: "user-" + currentUser,
        image_id: $(`#img-${currentImage}`).data('image_id'),
        blog_id: $(`#img-${currentImage}`).data('blog_id'),
        user_id: $(`#user-${currentUser}`).data('user_id')
    }
}

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>> slider >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
const totalImages = $('#img-slider img').length;
const totalUsers = $('#users-list li').length;

function showImage(n) {
    $('#img-slider img').hide();
    $('#img-' + n).fadeIn('slow');
}

function nextImage() {
    currentImage++;
    if (currentImage >= totalImages) {
        currentImage = 0;
    }
    console.log(getCurrentData());
    showImage(currentImage);
    $("#slider_count").text((currentImage + 1) + " / " + totalImages);
    anno.destroy();
    anno = Annotorious.init({
        image: getCurrentData().image,
        readOnly: currentUser !== 0 ? true : false
    });
    anno.setVisible(annoVisibility);
    addAnnoEvents(anno);
    fetchAnnotation(renderAnnotation);
}

function prevImage() {
    currentImage--;
    if (currentImage < 0) {
        currentImage = totalImages - 1;
    }
    console.log(getCurrentData());
    showImage(currentImage);
    $("#slider_count").text((currentImage + 1) + " / " + totalImages);
    anno.destroy();
    anno = Annotorious.init({
        image: getCurrentData().image,
        readOnly: currentUser !== 0 ? true : false
    });
    anno.setVisible(annoVisibility);
    addAnnoEvents(anno);
    fetchAnnotation(renderAnnotation);
}

$('#img-slider img').first().show();
$('#next-btn').click(nextImage);
$('#previous-btn').click(prevImage);
$("#slider_count").text((currentImage + 1) + " / " + totalImages);
// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< slider <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

// >>>>>>>>>>>>>>>>>>>>>>>>>>>> users list click event >>>>>>>>>>>>>>>>>>>>>>>>
$('#users-list').on('click', 'li', function () {
    // console.log("user_id " + $(this).data("user_id"));
    $(this).parent().children().removeClass("active");
    $(this).addClass("active");
    currentUser = parseInt($(this).attr("id").split("-")[1]);
    // console.log(getCurrentData());
    anno.destroy();
    anno = Annotorious.init({
        image: getCurrentData().image,
        readOnly: currentUser !== 0 ? true : false
    });
    anno.setVisible(annoVisibility);
    addAnnoEvents(anno);
    fetchAnnotation(renderAnnotation);
});
// <<<<<<<<<<<<<<<<<<<<<<<<<<<< users list click event <<<<<<<<<<<<<<<<<<<<<<<<<


// >>>>>>>>>>>>>>>>>>>>>>>>>>> utility buttons click evet >>>>>>>>>>>>>>>>>>>>>> 
$("#polygon-btn").click(function (e) {
    $(this).addClass("active");
    $("#rectangle-btn").removeClass("active");
    anno.setDrawingTool("polygon");
});

$("#rectangle-btn").click(function (e) {
    $(this).addClass("active");
    $("#polygon-btn").removeClass("active");
    anno.setDrawingTool("rect");
});

$("#hide-btn").click(function (e) {
    $(this).toggleClass("active");
    $("#show-eye").toggleClass("d-none");
    $("#hide-eye").toggleClass("d-none");
    annoVisibility = !annoVisibility;
    anno.setVisible(annoVisibility);
});

$("#fullscreen-btn").click(function (e) {
    alert("Full screen mode is not supported yet.");
    // $("#img-slider").css("width", "100vw");
    // $("#img-slider").css("height", "100vh");
    // $("#img-slider").css("position", "fixed");
    // $("#img-slider").css("top", "0");
    // $("#img-slider").css("left", "0");
    // $("#img-slider").css("z-index", "100");
});

// <<<<<<<<<<<<<<<<<<<<<<<<< utility buttons click evet <<<<<<<<<<<<<<<<<<<<<<<

// >>>>>>>>>>>>>>>>>>>>>>>>>> initializing Annotorious >>>>>>>>>>>>>>>>>>>>>>>>
let annoVisibility = true;
let anno = Annotorious.init({
    image: getCurrentData().image,
    readOnly: currentUser !== 0 ? true : false
});
addAnnoEvents(anno);
fetchAnnotation(renderAnnotation);
function addAnnoEvents(anno) {
    anno.on('createAnnotation', function () {
        console.log("createAnnotation", getCurrentData());
        storeAnnotation();
    });
    anno.on('deleteAnnotation', function () {
        console.log("deleteAnnotation", getCurrentData());
        storeAnnotation();
    });
}
// <<<<<<<<<<<<<<<<<<<<<<<<<< initializing Annotorious <<<<<<<<<<<<<<<<<<<<<<<<

// >>>>>>>>>>>>>>>>>>>>>>>>>> fetchAnnotation for user x of image y >>>>>>>>>>>>>>>>>>>>>>>>
function fetchAnnotation(callback) {
    const obj = getCurrentData();
    $.ajax({
        url: `http://doctoraicollab.test/fetchAnnotation?user_id=${obj.user_id}&blog_id=${obj.blog_id}&image_id=${obj.image_id}`,
        type: "GET",
        success: function (response) {
            response = JSON.parse(response);
            // console.log(response);
            callback(response);
        },
        error: function (xhr, status, error) {
            console.log("Error: " + error);
        }
    });
}
// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// >>>>>>>>>>>>>>>>>>>>>>>>>> storeAnnotation for user x of image y >>>>>>>>>>>>>>>>>>>>>>>
function storeAnnotation(/*callback*/) {
    const obj = getCurrentData();
    const requestBody = {
        blog_id: obj.blog_id,
        image_id: obj.image_id,
        annotation: JSON.stringify(anno.getAnnotations())
    };
    $.ajax({
        url: "http://doctoraicollab.test/storeAnnotation",
        type: "POST",
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        data: JSON.stringify(requestBody),
        success: function (response) {
            console.log("Store Annotation status: "+response);
            // callback();
        },
        error: function (xhr, status, error) {
            console.log("Error: " + error);
        }
    });
}
// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> render annotation >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function renderAnnotation(jsonData) {
    anno.setAnnotations(jsonData);
}
// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<