var path = "admin/views/castles";
$(document).ready(function(){
    $("a.casSection").click(function(){
        var sectionId = $(this).attr("id");
        var siteId = "admin/";
        siteId = "admin/views/castles/castle_data.php?castleid="+sectionId;
        $("#adminSection").load(siteId);
    });
    $("button.casSection").click(function(){
        var sectionId = $(this).attr("id");
        var siteId = "admin/";
        switch (sectionId) {
            case "castleData":
            default:
                siteId = "admin/views/castles/castle_data.php?castleid=0";
                break;
        }
        $("#adminSection").load(siteId);
    });
    $("a.casDelete").click(function(){
        var sectionId = $(this).attr("id");
        var siteId //= "admin/admin_castles.php";
        siteId = "admin/delete.php?castleid="+sectionId;
        $("#adminSection").load(siteId);
    });
});