var removeMessages;

(new (function RemoveMessages(){
    var _this = removeMessages = this;

    this.init = function() {

        // remove messages in top page by click for one
        $("#messagesID").click(function () {
            $("#messagesID").find('div:first').remove();
        });

    }
}) ());
