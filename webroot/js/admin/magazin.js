$(document).ready(function () {
    $("a.magSection").click(function () {
        var sectionId = $(this).attr("id");
        var siteId = "admin/";
        siteId = "admin/magazinData.php?magazinid=" + sectionId;
        $("#adminSection").load(siteId);
    });
    $("button.magSection").click(function () {
        var sectionId = $(this).attr("id");
        var siteId = "admin/";
        switch (sectionId) {
            case "magazinData":
            default:
                siteId = "admin/magazinData.php?magazinid=0";
                break;
        }
        $("#adminSection").load(siteId);
    });
    $("a.magDelete").click(function () {
        var sectionId = $(this).attr("id");
        var siteId //= "admin/admin_castles.php";
        siteId = "admin/delete.php?magazinid=" + sectionId;
        $("#adminSection").load(siteId);
    });
});