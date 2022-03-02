$(document).ready(function(){
    $("a.ratCastleDel").click(function(){
        var sectionId = $(this).attr("id");
        var siteId //= "admin/admin_castles.php";
        siteId = "admin/delete.php?ratCastleid="+sectionId;
        $("#adminSection").load(siteId);
    });

    $("a.ratFotoDel").click(function(){
        var sectionId = $(this).attr("id");
        var siteId //= "admin/admin_castles.php";
        siteId = "admin/delete.php?ratFotoid="+sectionId;
        $("#adminSection").load(siteId);
    });
});
