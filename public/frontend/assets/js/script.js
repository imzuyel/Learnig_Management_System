$(document).ready(function() {
    //Ajax setup
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#contactData").click(function() {
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var message = $("#message").val();
        $.ajax({
            type: "post",
            url: "/contact",
            data: {
                first_name: first_name,
                last_name: last_name,
                email: email,
                phone: phone,
                message: message,
            },

            beforeSend: function() {
                $(".centered").css("visibility", "visible");
            },
            success: function(resp) {
                toastr.options = {
                    closeButton: true,
                    closeHtml: "<button>&#xd7;</button>",
                    progressBar: true,
                    showMethod: "slideDown",
                };
                if (resp["status"] == true) {
                    toastr["success"]("We receive your message! We will contact you soon");
                }
            },
            error: function() {
                toastr.options = {
                    closeButton: true,
                    closeHtml: "<button>&#xd7;</button>",
                    progressBar: true,
                    showMethod: "slideDown",
                };
                toastr["error"]("Invalid contact.");
            },
            complete: function() {
                $(".centered").css("visibility", "hidden");
                $("#myContact").each(function() {
                    this.reset(); //Here form fields will be cleared.
                });
            },
        });
    });

    $("#subscribeBtn").click(function() {
        var email = $("#subscribeEmail").val();
        $.ajax({
            type: "post",
            url: "/subscriber",
            data: {
                email: email,
            },
            beforeSend: function() {
                $(".centered").css("visibility", "visible");
            },
            success: function(resp) {
                toastr.options = {
                    closeButton: true,
                    closeHtml: "<button>&#xd7;</button>",
                    progressBar: true,
                    showMethod: "slideDown",
                };
                if (resp["status"] == true) {
                    toastr["success"]("Welcome ! to be our member");
                }
            },
            error: function() {
                toastr.options = {
                    closeButton: true,
                    closeHtml: "<button>&#xd7;</button>",
                    progressBar: true,
                    showMethod: "slideDown",
                };
                toastr["error"]("Something wrong here.");
            },
            complete: function() {
                $(".centered").css("visibility", "hidden");
                $("#subscribeForm").each(function() {
                    this.reset(); //Here form fields will be cleared.
                });
            },
        });
    });
});