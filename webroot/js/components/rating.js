$(document).ready(function () {
    $("#demo1 .stars").click(function () {

        $.post('rating.php',{rate:$(this).val()},function(d){
            if(d>0)
            {
                alert('You already rated');
            }else{
                alert(d);
            }
        });
        $(this).attr("checked");
    });
});