$(document).ready(function() {    

    $("#wyloguj").click(function() {
        var request;
        request = $.ajax({
            url: "./php/logout.php",
            data: null,
            type: "POST"
        });

        request.done(function() {
            window.location.replace("../index.php");
        });

        request.fail(function() {
                       
        });
    });

    $("#zaloguj").click(function() {
            window.location.replace("../logowanie.php"); /* Nie powinno być "logowanie.php"? 
            Bo jak masz w htdocs osobny folder ze stroną (np. htdocs/Car4You/), to wtedy ta linijka z ../logowanie.php wraca aż do root'a i próbuje otworzyć logowanie.php w samym htdocs, zamiast w rzeczywistym folderze ze stroną. Taka tylko uwaga, jak uważacie ~ Marcin */
    });

    $("#panelKlienta").click(function() {
        window.location.replace("../cpanel/index.php");
    });

    $("#zarejestruj").click(function() {
        window.location.replace("../register.php");
    });
    
    $('.next').click(function(e){
        e.preventDefault();
         $('.carousel').carousel('next');return false; 
    });

    $('.prev').click(function(e){
        e.preventDefault();
         $('.carousel').carousel('prev');return false; 
    });

    $('#subscribeNewsletterButton').click(function(){
        if(emailVerify()){
            console.log("test");
            $(".alert").removeClass("alert-success");
            $(".alert").removeClass("alert-danger");
            $(".alert").removeClass("alert-warning");
            $(".alert").html('');
            $(".alert").stop().fadeOut();
            $(".alert").fadeIn();


            var data = $('.newsletterForm').serialize();
            request = $.ajax({
                url: "./php/userNewsletter.php",
                data: data,
                type: "POST"
            });

            request.done(function (response) {
                $(".alert").addClass("alert-success");
                $(".alert").html(response);
                $(".alert").fadeOut(3000);
            });

            request.fail(function (response) {
                $(".alert").addClass("alert-danger");
                $(".alert").html(response);
                $(".alert").fadeOut(3000);

            });
        }
        else{
                $(".alert").addClass("alert-danger");
                $(".alert").html("Nie poprawny adres Email!");
                $(".alert").fadeOut(3000);
        }
    });
});

function emailVerify(){
    var email = $('#newsletterEmail').val();
    var emailRegex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i

    if(emailRegex.test(email)) { 
        return true;
    }
    else{
        return false;
    }

    
}



