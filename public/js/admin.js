$(document).ready(function(){
    $("#toggler").click(function(){
        $("#side-bar").toggle();
        $("#content").toggleClass("col-xl-12");
        $("#navbar").toggleClass("shadow-sm");
    });

    $(".search-btn").click(function(){SS
        $("#search").toggleClass("search-class");
        $("#icons").toggle();
    });
})
function preview_images()
{
    console.log("prevew_images")
    var total_file=document.getElementById("images").files.length;
    for(var i=0;i<total_file;i++)
    {
        $('#image_preview').append("<div class='col-md-2'><img class='img-responsive' height='100px' width='100px' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
    }
}
