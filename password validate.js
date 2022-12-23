
var flag=0;
function passcheck(flag1) {
//flags are used to bypass validation the first time the password is filled
    if(flag1==1){
        flag=1;
    }

    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("password2").value;
    if(flag!=0){
        if(pass1!==pass2){

            document.getElementById("password2").classList.add("is-invalid");
            document.getElementById("password3").innerHTML = "passwords dont match";
            document.getElementById("submit").classList.add("disabled");
            document.getElementById("submit").disabled = true;

        }
        else{
            document.getElementById("password2").classList.remove("is-invalid");
            document.getElementById("password3").innerHTML = "";
            document.getElementById("submit").classList.remove("disabled");
            document.getElementById("submit").disabled = false;

        }
        flag=1;
    }

}
