$(document).ready(function(){
    $("#castleData").click(function(){
        var sectionId = $(this).attr("id");
        var siteId = "admin/";
        switch (sectionId) {
            case "castleData":
            default:
                siteId = "admin/castleData.php";
                break;
        }
        $("#adminSection").load(siteId);
    });
    $("button.casSection").click(function(){
        var sectionId = $(this).attr("id");
        var siteId = "admin/";
        switch (sectionId) {
            case "castleData":
            default:
                siteId = "admin/castleData.php";
                break;
        }
        $("#adminSection").load(siteId);
    });
});