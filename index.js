
var offset = 0;
var holdload = false;
var done = false;
loadpost(offset);
function loadpost(a) {
    if (!holdload) {
        // alert(a);
        holdload = true;
        var dataset = { offset: a };
        $.ajax({
            type: "POST",
            url: "api.php",
            data: dataset,
            dataType: "json",
            success: function (response) {
                //console.log(response.length);
                for (var i = 0; i < response.length; i++) {
                    var div = '<div class="box">' + response[i].id + '<br/>' + response[i].post + '</div>';
                    console.log(response[i].post);
                    $("#container").append(div);
                    $("#container").append("<hr/>");
                }
                holdload = false;
                if (response.length == 0) {
                    holdload = true;
                    $("#container").append("<p>No More !!!</>");
                    $("#loader").slideUp();
                    done = true;
                }
                else offset += 5;

            }
        });
    }

};

$(window).scroll(function () {
    if ($(window).scrollTop() >= $(document).height() - $(window).height() && !done) {
        // alert("Hi");
        $("#loader").slideDown();
        // setTimeout(() => { 
        //     //alert("HI");
        //     loadpost(offset,1); }, 2000);
        loadpost(offset);
    }
})
