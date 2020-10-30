$(document).ready(function() {
    // preload images
    $("#image_list a").each(function() {
        var swappedImage = new Image();
        swappedImage.src = $(this).attr("href");
        swappedImage.title = $(this).attr("title");
    });
    
    
    //set up event handlers for links
    $("#image_list a").click(function(evt){
        //swap image
        var imageURL = $(this).attr("href");
        $("#image").attr("src", imageURL);
        
        //swap caption
        var caption = $(this).attr("title");
        $("#caption").text(caption);

        evt.preventDefault();
        
    });
    
    $("li:first-child a").focus();
});