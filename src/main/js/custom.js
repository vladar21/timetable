$(document).ready(function(){
    // remove messages in top page by click for one
    $("#messagesID").click(function(){
        $("#messagesID").find('div:first').remove();
    });

    alert(default_messages.ERROR_MSG);
});