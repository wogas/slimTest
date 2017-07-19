
jQuery(document).ready(function() {

    $("#login").on('click', function () {

        $("#hidden_login_form").css('display', 'block');
        $("#login").css('display', 'none');

    });

    $("#sign-up").on('click', function () {
        $("#hidden_login_form").css('display', 'none');
        $("#sign-up-form").css('display', 'block');
    });

/*
    $("#submit").on('click',function(e){
     e.preventDefault();

     var username = $("#username").val(),
         fname = $("#fname").val(),
         lname = $("#lname").val(),
         email = $("#email").val(),
         pass = $("#pass").val();

         var dataString = 'username='+ username + '&fname='+fname+'&lname='+lname+'&email='+email+'&pass='+pass;

         $.ajax({
             url : 'lib/reg.php',
             type : "POST",
             cache : false,
             data : dataString,
             success : function(result){
                 if(typeof result == String){
                     if(result == 'username has been taken'){
                         $("#user_errorr").text('username taken');
                     }else{}
                     $("#sign-up-form").scroll(0,0);
                     $("#sign-up-form").text('You have been registered');
                 }else{

                 }
             }
         })


 })
*/
   //var msg = {error : 'unable to submit'}
/*
    $("#submit").on('click',function(e){
        e.preventDefault();

        var name = $("#name").val(),
            message = $("#message").val();
         console.log(message);
        $.ajax({
            url: "./sub2",
            type : "post",
            contentType : "application/json",
            dataType : "json",
            data : JSON.stringify({"name":name,"message":message})
        }).done(function(json){
            $("form").text(json).appendTo('body');
        }).fail(function(msg){
            $("form").text('unable to submit');


        })
    })*/


});


/*var doAjax = function doAjax(){

    var username = $("#username").val(),
        fname = $("#fname").val(),
        lname = $("#lname").val(),
        email = $("#email").val(),
        pass = $("#pass").val(),
        error = $("#error");

    if(username =="" || fname =="" || lname == "" || email == "" || pass == ""){
        $("#any_error").text('All fields are required');
    }else{
        var data = 'username='+ username + '&fname='+fname+'&lname='+lname+'&email='+email+'&pass='+pass;
        console.log(data);
        //start xhr
        var xhr = new xmlHttpRequest();
        xhr.open('POST','/models/reg.php',true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=UTF-8");
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 3){
                $("#any_error").text('processing...');
            }else if(xhr.readyState == 4 && xhr.status == 200){
                if(xhr.responseText == 'username has been taken'){
                    $("#username_error").text('username taken');
                }else if(xhr.responseText == 'Email already exists'){
                    $("#email_error").text('Email already exists');
                }else if(xhr.responseText == 'you are successfully registered') {
                    $("#sign-up-form").scroll(0, 0);
                    $("#sign-up-form").html('You have successfully registered');
                }else{
                    $("#any_error").text('Unable to register you');
                }
            }
        }

        xhr.send(data);
    }
}*/
