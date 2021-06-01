$(document).ready(function() {
    //Ajax setup
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    /**
     * Category status update
     */
    $(".updateCategoryStatus").click(function() {
        var status = $(this).text();
        var category_id = $(this).attr("category_id");
        $.ajax({
            type: "POST",
            url: "/admin/category/update-status",
            data: {
                status: status,
                category_id: category_id,
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
                if (resp["status"] == false) {
                    $("#category-" + category_id).html(
                        "<a class='badge-warning updateCategoryStatus'  href='javascript:void(0)'>Inactive</a>"
                    );
                    toastr["success"]("Category inactive successfully!");
                } else {
                    $("#category-" + category_id).html(
                        "<a class='badge-info updateCategoryStatus'  href='javascript:void(0)'>Active</a>"
                    );
                    toastr["success"]("Category Active successfully!");
                }
            },
            complete: function() {
                $(".centered").css("visibility", "hidden");
            },
        });
    });

    /**
     * Banner Status update
     */

    $(".updateBannerStatus").click(function() {
        var status = $(this).text();
        var banner_id = $(this).attr("banner_id");
        $.ajax({
            type: "POST",
            url: "/admin/banner/update-status",
            data: {
                status: status,
                banner_id: banner_id,
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
                if (resp["status"] == false) {
                    $("#banner-" + banner_id).html(
                        "<a class='badge-warning updateBannerStatus'  href='javascript:void(0)'>Inactive</a>"
                    );
                    toastr["success"]("Banner inactive successfully!");
                } else {
                    $("#banner-" + banner_id).html(
                        "<a class='badge-info updateBannerStatus'  href='javascript:void(0)'>Active</a>"
                    );
                    toastr["success"]("Banner Active successfully!");
                }
            },
            complete: function() {
                $(".centered").css("visibility", "hidden");
            },
        });
    });

    /**
     * Achiement Status update
     */
    $(".updateAchiementStatus").click(function() {
        var status = $(this).text();
        var achiement_id = $(this).attr("achiement_id");
        $.ajax({
            type: "post",
            url: "/admin/achiement/update-status",
            data: {
                status: status,
                achiement_id: achiement_id,
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
                if (resp["status"] == false) {
                    $("#achiement-" + achiement_id).html(
                        "<a class='badge-warning updateAchiementStatus'  href='javascript:void(0)'>Inactive</a>"
                    );
                    toastr["success"]("Achiement inactive successfully!");
                } else {
                    $("#achiement-" + achiement_id).html(
                        "<a class='badge-info updateAchiementStatus'  href='javascript:void(0)'>Active</a>"
                    );
                    toastr["success"]("Achiement Active successfully!");
                }
            },
            complete: function() {
                $(".centered").css("visibility", "hidden");
            },
        });
    });

    /**
     * Upcomming Status update
     */
    $(".updateUpcommingStatus").click(function() {
        var status = $(this).text();
        var upcomming_id = $(this).attr("upcomming_id");
        $.ajax({
            type: "post",
            url: "/admin/upcomming/update-status",
            data: {
                status: status,
                upcomming_id: upcomming_id,
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
                if (resp["status"] == false) {
                    $("#upcomming-" + upcomming_id).html(
                        "<a class='badge-warning updateUpcommingStatus'  href='javascript:void(0)'>Inactive</a>"
                    );
                    toastr["success"]("Upcomming inactive successfully!");
                } else {
                    $("#upcomming-" + upcomming_id).html(
                        "<a class='badge-info updateUpcommingStatus'  href='javascript:void(0)'>Active</a>"
                    );
                    toastr["success"]("Upcomming Active successfully!");
                }
            },
            complete: function() {
                $(".centered").css("visibility", "hidden");
            },
        });
    });
    /**
     * Follow Status update
     */
    $(".updateFollowStatus").click(function() {
        var status = $(this).text();
        var follow_id = $(this).attr("follow_id");
        $.ajax({
            type: "post",
            url: "/admin/follow/update-status",
            data: {
                status: status,
                follow_id: follow_id,
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
                if (resp["status"] == false) {
                    $("#follow-" + follow_id).html(
                        "<a class='badge-warning updateFollowStatus'  href='javascript:void(0)'>Inactive</a>"
                    );
                    toastr["success"]("Follow icon inactive successfully!");
                } else {
                    $("#follow-" + follow_id).html(
                        "<a class='badge-info updateFollowStatus'  href='javascript:void(0)'>Active</a>"
                    );
                    toastr["success"]("Follow icon Active successfully!");
                }
            },
            complete: function() {
                $(".centered").css("visibility", "hidden");
            },
        });
    });



    $("#category_id").on('change', function() {
        var category_id = $("#category_id").val();
        $.ajax({
            type: "post",
            url: "/admin/append/posts",
            data: {
                category_id: category_id,
            },
            beforeSend: function() {
                $(".centered").css("visibility", "visible");
            },
            success: function(resp) {
                $(".centered").css("visibility", "visible");
                $("#appendCategorPost").html(resp);
            },
            complete: function() {
                $(".centered").css("visibility", "hidden");
            },
        });
    });
});