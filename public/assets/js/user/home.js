console.log("hello user in the home section");

$("#like-btn").click(function (e) { 
    $(this).addClass("active");
    $("#dislike-btn").removeClass("active");
    alert("you liked the post");
});

$("#dislike-btn").click(function (e) { 
    $(this).addClass("active");
    $("#like-btn").removeClass("active");
    alert("you disliked the post");
});

$("#share-btn").click(function (e) { 
    $(this).toggleClass("active");
    if($(this).hasClass("active")){
        alert("post shared");
    }else{
        alert("post not shared");
    }
    
});