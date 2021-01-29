var v;

(new (function Vasia(){
    var _this = v = this;


    this.init = function() {
        console.log('Hello Vasia!!!');

        $('#btnClickMe').click(() => {
            _this.myFunc();
        })
    }

    this.myFunc = () => {
        console.log('I have clicked to the button');
    }

}) ());
