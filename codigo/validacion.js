
$(function(){
    var mayus = new RegExp("^(?=.*[A-Z])"); 
    var special = new RegExp("^(?=.*[!@$#&*])"); 
    var numbers = new RegExp("^(?=.*[0-9])"); 
    var lower = new RegExp("^(?=.*[a-z])"); 
    var len = new RegExp("^(?=.{8,})"); 

    var regExp= [mayus, special, numbers, lower,len];
    var elementos = [$("#mayus"),$("#special"),$("#numbers"),$("#lower"),$("#len")];

    $("#password").on("keyup", function(){

        var pass = $("#password").val();
        // *manera simple mayus.test(pass) && special.test(pass) && numbers.test(pass) && lower.test(pass)
        //&& len.test(pass)
        var check = 0; 
        var cla = 0 ;
        if(special.test(pass)){
            console.log("fue un exito");
        }
        for(var i = 0;i<5;i++){
            if(regExp[i].test(pass)){
                elementos[i].show();
                check ++;
            }
            else{
                elementos[i].hide();
            }
        }
        if(check >= 0 && check <=2){
            $("#mensaje").text("Muy insegura").css("color","red");
        }else if(check >=2 && check <=3){
            $("#mensaje").text("Poco segura").css("color","orange");
        }else if(check >=3 && check <=4){
            $("#mensaje").text("Segura").css("color","yellow");
        }else if(check == 5){
            $("#mensaje").text("Muy segura").css("color","green");
        }
    });
    $("#rpassword").on("keyup",function(){
        var repass = $("#rpassword").val();
        var pass = $("#rpassword").val();
        if(repass == pass){
            $("#remensaje").text("Coinciden").css("color","green");
        }else if(repass==""){
            $("#remensaje").text("");
        }else{
            $("#remensaje").text("No coinciden").css("color","red");
        }
    });

});

var mensaje= document.getElementById('password'),num= 0;

$('#password').on("keyup", function(){ 
    //console.log(num);
    var po=$("#password").val();
    document.getElementById('password').style.borderColor="none";
    document.getElementById('mensa').style.display= 'none';
    if(po==''){
        num=0;
        return num;
    }else{
        num=1;
        return num;
    }
});

function mess()
{
    if(num==0){
        document.getElementById('mensa').style.display= 'block';
        document.getElementById('mensa').style.color="red";
        //document.getElementById('password').style.borderColor="green";
    }
    if(num != 0){
        document.getElementById('mensa').style.display= 'none';
    }
}

mensaje.addEventListener('focusout',mess,true);
