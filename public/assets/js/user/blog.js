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
    fetchPredictions(renderPredictions);
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
    fetchPredictions(renderPredictions);
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
            console.log("Store Annotation status: " + response);
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

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> blog comments >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

function renderComment(commentObj) {
    const comment = `<div class="col-md-12">
            <div class="card mb-3" data-userid="${commentObj.userid}">
                <div class="card-body">
                    <img src="${commentObj.photo}"
                        style="width:60px;height:60px;object-fit: cover"
                        class="img-fluid rounded-circle float-start me-3" title="${commentObj.username}">
                    <h5 class="card-title text-capitalize">${commentObj.username}</h5>
                    <p class="card-subtitle mb-2 text-muted">
                    ${commentObj.datetime}
                    </p>
                    <p class="card-text">${commentObj.comment}</p>
                </div>
            </div>
        </div>`;
    $('#blog-comments').append(comment);
}

function fetchAllComments(callback) {
    const obj = getCurrentData();
    $.ajax({
        url: `http://doctoraicollab.test/fetchAllComments?blog_id=${obj.blog_id}`,
        type: "GET",
        success: function (response) {
            $('#blog-comments').html('');
            blogComments = JSON.parse(response);
            for (const comment of blogComments) {
                renderComment(comment);
            }
        },
        error: function (xhr, status, error) {
            console.log("Error: " + error);
        }
    });
}

function insertComment(commentText) {
    const obj = getCurrentData();
    const requestBody = {
        blog_id: obj.blog_id,
        content: commentText,
    };
    $.ajax({
        url: "http://doctoraicollab.test/insertBlogComment",
        type: "POST",
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        data: JSON.stringify(requestBody),
        success: function (response) {
            console.log("insert comment status: " + response);
            fetchAllComments(renderComment);
            $('#form-comment #comment').val('');
        },
        error: function (xhr, status, error) {
            console.log("Error: " + error);
        }
    });
}

$('#form-comment').submit(function (e) {
    e.preventDefault();
    commentText = ($('#comment').val());
    insertComment(commentText);
});

// Fetching Blog Comments After Page Loading
fetchAllComments(renderComment);

// Fetching Blog Comments Regularly
// setInterval(function () { fetchAllComments(renderComment) }, 1000);

// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< blog comments <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Blog AI Predictions >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function renderPredictions(predictions) {
    const tbody = $('#ai-predictions table tbody');
    tbody.html('');
    for (const key in predictions) {
        const row = `<tr>
                    <td class="fw-bold">${key}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar bg-custom-primary" role="progressbar"
                                style="width: ${predictions[key]}%;">${predictions[key]}%</div>
                        </div>
                    </td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar bg-custom-primary" role="progressbar"
                                style="width: 20%;">20%
                            </div>
                        </div>
                    </td>
                </tr>`;
        tbody.append(row);
    }
}

function fetchPredictions(callback) {
    const obj = getCurrentData();
    $.ajax({
        url: `http://api.doctoraicollab.test:5000/predict?id=${obj.image_id}`,
        type: "GET",
        success: function (response) {
            callback(response);
        },
        error: function (xhr, status, error) {
            console.log("Not Found");
        }
    });
}
// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Blog AI Predictions <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

// Fetching Predictions for selected Image After Page Loading
fetchPredictions(renderPredictions);
// ----------------------------------------------------------

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Blog User Feed Back >>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$('#feedback-edit-btn').click(function (e) {
    e.preventDefault();
    $('#feedback_table input').prop('disabled', false);
    $('#feedback-vote-btn').prop('disabled', false);
});

$('#feedback-vote-btn').click(function (e) {
    $('form').submit(function (e) {
        e.preventDefault();
        const selectedValue = $('input[name="choice"]:checked').val();
        const obj = getCurrentData();
        const requestBody = {
            blog_id: obj.blog_id,
            answer: selectedValue
        };
        $.ajax({
            url: "http://doctoraicollab.test/insertUserVote",
            type: "POST",
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": $('input[name="_token"]').val()
            },
            data: JSON.stringify(requestBody),
            success: function (response) {
                if (response == 1) {
                    fetchRenderFeedback();
                    $('#feedback-vote-btn').prop('disabled', true);
                }
            },
            error: function (xhr, status, error) {
                console.log("Error: " + error);
            }
        });
    });
});

// function storeAnnotation(/*callback*/) {
//     $.ajax({
//         url: "http://doctoraicollab.test/storeAnnotation",
//         type: "POST",
//         headers: {
//             'Content-Type': 'application/json',
//             "X-CSRF-Token": $('input[name="_token"]').val()
//         },
//         data: JSON.stringify(requestBody),
//         success: function (response) {
//             console.log("Store Annotation status: " + response);
//             // callback();
//         },
//         error: function (xhr, status, error) {
//             console.log("Error: " + error);
//         }
//     });
// }

function renderFeedbackData(userVoted, voteResults) {
    const feedbackTable = $('#feedback_table tbody');
    feedbackTable.html('');
    for (const vote of voteResults) {
        let checked = (vote.index == userVoted) ? 'checked' : '';
        const row = `<tr>
                        <td>
                            <input id="choice-${vote.index}" ${checked} disabled
                                class="form-check-input" type="radio" name="choice"
                                value="${vote.index}">
                        </td>
                        <td>
                            <label class="form-check-label text-muted fw-bold"
                                for="choice-${vote.index}">
                                ${vote.label}
                            </label>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-custom-primary" role="progressbar"
                                    style="width: ${vote.ratio}%">
                                    ${vote.ratio}%
                                </div>
                            </div>
                        </td>
                    </tr>`;
        feedbackTable.append(row);
    }
}

function fetchUserVoted() {
    return new Promise((resolve, reject) => {
        const obj = getCurrentData();
        $.ajax({
            url: `http://doctoraicollab.test/fetchUserVote?blog_id=${obj.blog_id}`,
            type: "GET",
            success: function (response) {
                resolve(response);
            },
            error: function (xhr, status, error) {
                reject("Not Found");
            }
        });
    });

}

function fetchFeedbackLabels(voted) {
    return new Promise((resolve, reject) => {
        const obj = getCurrentData();
        $.ajax({
            url: `http://doctoraicollab.test/fetchFeedbackLabels?blog_id=${obj.blog_id}`,
            type: "GET",
            success: function (response) {
                const labels = JSON.parse(response);
                const voteObj = {
                    selected: voted,
                    labels: labels
                }
                // console.log(voteObj);
                resolve(voteObj);
            },
            error: function (xhr, status, error) {
                reject("Not Found");
            }
        });
    });

}

function fetchFeedbackData(voteObj) {
    return new Promise((resolve, reject) => {
        const obj = getCurrentData();
        $.ajax({
            url: `http://doctoraicollab.test/fetchFeedbackData?blog_id=${obj.blog_id}`,
            type: "GET",
            success: function (response) {
                const answerCount = new Array(15).fill(0);
                for (let i = 0; i < 15; i++) {
                    for (const vote of response) {
                        if (vote.answer === i) {
                            answerCount[i]++;
                        }
                    }
                }
                const votePercentage = answerCount.map(x => Math.floor(x / totalUsers * 100));
                const voteResults = [];
                for (let i = 0; i < votePercentage.length; i++) {
                    const obj = {
                        index: i,
                        label: voteObj.labels[i],
                        ratio: votePercentage[i]
                    }
                    voteResults.push(obj);
                }
                voteObj.voteResults = voteResults;
                resolve(voteObj);
            },
            error: function (xhr, status, error) {
                reject("Not Found");
            }
        });
    });

}
// -----------------------------------------------------------------------------------------------
// fetching feedback data (vote racords)
function fetchRenderFeedback() {
    fetchUserVoted()
        .then((voted) => fetchFeedbackLabels(voted))
        .then((voteObj) => fetchFeedbackData(voteObj))
        .then((voteObj) => {
            renderFeedbackData(voteObj.selected, voteObj.voteResults);
        })
        .catch((error) => {
            console.error(error);
        });
}
fetchRenderFeedback();
// -----------------------------------------------------------------------------------------------
