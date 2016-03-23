$(document).ready(function(){
    $('#add_btn').click(function(){
        $('#popup').css({"display":"block"});
    });
    $('#close').click(function(){
        $('#popup').css({"display":"none"});
    });
    $('#file_list').tablesorter();
    $('#filter input').keydown(function(e){
        if(e.keyCode == 13){
            getQuery($(this).val())
        }

    });
});

function getQuery(query){
    $.get('/main/filter/',{filter:query}).done(function(data){
        $('#file_list tbody').html(data);
    });
}
