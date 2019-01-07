
$(document).ready(function() {
    $("#submit").attr("disabled", "disabled");

    // Hide the exclamaiton triangle
    $("#contact-triangle").hide();

    $("form").keyup(function() 
    {
        // To Disable Submit Button
        $("#submit").attr("disabled", "disabled");

        // Validating Fields
        var first_name = $("#first_name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        var filter = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (!(first_name === "" || email === "" || message === "")) 
        {
            if (filter.test(email)) 
            {
                // To Enable Submit Button
                $("#submit").removeAttr("disabled");
                $("#submit").css({
                    "cursor": "pointer",
                    "box-shadow": "1px 0px 6px #333"
                });

                $("#email").css({
                    "color": "black",
                    "font-weight": "normal"
                });

                $("#contact-triangle").hide();
            }
            else {
                $("#email").css({
                    "color": "red",
                    "font-weight": "bold"
                });

                // Show the exclamaiton triangle
                $("#contact-triangle").show();
            }
        }
    });

    // On Click Of Submit Button
    $("#submit").click(function() 
    {
        $("#submit").css({
            "cursor": "default",
            "box-shadow": "none"
        });
    });

    // On click of clear button
    $("#clear").click(function()
    {
        $("#first_name").val("");
        $("#last_name").val("");
        $("#email").val("");
        $("#message").val("");
    });

    // On click clear notification
    $(".contact-delete-notification").click(function() {
        $(".contact-notification").remove();
    });

    
    setTimeout(function() { 
        $(".contact-notification").remove();
    }, 5000);

});

