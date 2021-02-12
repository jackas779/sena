
$(function(){
    var mayus = new RegExp("^(?=.*[A-Z])"); 
    var special = new RegExp("^(?=.*[!@$#&*])"); 
    var numbers = new RegExp("^(?=.*[0-9])"); 
    var lower = new RegExp("^(?=.*[a-z])"); 
    var len = new RegExp("^(?=.{8,})"); 

    var regExp= [mayus, special, numbers, lower,len];
    var elementos = [$("#mayus"),$("#special"),$("#numbers"),$("#lower"),$("#len")];

    $("#password123").on("keyup", function(){

        var pass = $("#password123").val();
        // *manera simple mayus.test(pass) && special.test(pass) && numbers.test(pass) && lower.test(pass)
        //&& len.test(pass)
        var check = 0; 
        var cla = 0 ;
        for(var i = 0;i<5;i++){
            if(regExp[i].test(pass)){
                elementos[i].hide();
                check ++;
            }
            else{
                elementos[i].show();
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
    $("#repassword123").on("keyup",function(){
        var repass = $("#repassword123").val();
        var pass = $("#password123").val();
        if(repass == pass){
            $("#remensaje").text("Coinciden").css("color","green");
        }else if(repass==""){
            $("#remensaje").text("");
        }else{
            $("#remensaje").text("No coinciden").css("color","red");
        }
    });

});