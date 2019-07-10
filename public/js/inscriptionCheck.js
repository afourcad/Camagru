(function(){
    var checkMail = document.getElementById('mail');
    var checkPass = document.getElementById('pass');
    var checkButton = document.getElementById('inscritptionButton');

    var checkPassMaj = document.getElementById('checkPassMaj');
    var checkPassNum = document.getElementById('checkPassNum');
    var checkPassMinChar = document.getElementById('checkPassMinChar');
    var regMaj = /[A-Z]/;
    var regNum = /[0-9]/;
    var regCharNum = /^.{8,}$/;
    var regEmail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i;
    var checked = [false, false, false, false];

    checkButton.disabled = true;
    function checkValidPass(){
        var str = checkPass.value;
        console.log(str);
        if(str.match(regCharNum)){
            checkPassMinChar.setAttribute('style', 'color: green;');
            checked[0] = true;
        }
        else{
            checkPassMinChar.setAttribute('style', 'color: red;');
            checked[0] = false;
        }
        if(str.match(regMaj)){
            checkPassMaj.setAttribute('style', 'color: green;');
            checked[1] = true;
        }
        else{
            checkPassMaj.setAttribute('style', 'color: red;');
            checked[1] = false;
        }
        if(str.match(regNum)){
            checkPassNum.setAttribute('style', 'color: green;');
            checked[2] = true;
        }
        else{
            checkPassNum.setAttribute('style', 'color: red;');
            checked[2] = false;
        }  
    }

    function checkValidMail(){
        var str = checkMail.value;
        console.log(str);
        if(str.match(regEmail)){
            checkMail.setAttribute('style', 'background-color: rgba(140, 221, 79, 0.5);');
            checked[3] = true;
        }
        else{
            checkMail.setAttribute('style', 'background-color: rgba(247, 27, 27, 0.5);');
            checked[3] = false;
        }
    }

    checkMail.addEventListener('input', checkValidMail, false);
    checkPass.addEventListener('input', checkValidPass, false);

    function proceedInscription(){
        /*event.preventDefault*/
    }
})();