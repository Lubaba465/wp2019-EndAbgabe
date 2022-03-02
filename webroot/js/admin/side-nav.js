$(document).ready(function(){
    $("a.admSection").click(function(){
        var sectionId = $(this).attr("id");
        var siteId = "admin/";
        switch (sectionId) {
            case "myData":
            default:
                siteId = "admin/views/account/account_info.php";
                break;
            case "myCastles":
                siteId = "admin/views/webroot/admin_castles.php";
                break;
            case "myMedia":
                siteId = "admin/views/media/admin_media.php";
                break;
            case "myMagazin":
                siteId = "admin/views/magazin/admin_magazin.php";
                break;
            case "myComments":
                siteId = "admin/views/comments/admin_comments.php";
                break;
            case "myRatings":
                siteId = "admin/views/ratings/admin_ratings.php";
                break;
        }
        $("#adminSection").load(siteId);
    });
});