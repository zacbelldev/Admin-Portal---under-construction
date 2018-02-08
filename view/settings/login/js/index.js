
$(document).ready(function () {
    
    $(window).on('orientationchange', function(e) {
        window.location.reload();
    });
    
    $(".centerLogo").hide(0).delay(500).fadeIn(2000);
   
    //    if the device height is short
    if($(window).height() < 500){
        $(".centerLogo").animate({top: "25%", marginLeft: "-40px", width: "80px"});
    }   
   
    //    if the device height is medium
    else if ($(window).height() < 700){
        $(".centerLogo").animate({top: "34%", marginLeft: "-45px", width: "90px"});
    }
    
    //    if the device height is large
    else if ($(window).height() < 900){
        $(".centerLogo").animate({top: "38%", marginLeft: "-50px", width: "100px"});
    }

    //    if the device height is large
    else {
        $(".centerLogo").animate({top: "40%", marginLeft: "-50px", width: "100px"});
    }
    
    $('.form-control').delay(2500).fadeTo(1500, 1);
    
    $('.log-btn').delay(2500).fadeTo(1500, 1);
    
    $(".links").hide(0).delay(2500).fadeIn(2000);
        
    if ($('.error').html() == 'Invalid Credentials') {
        $('.log-status').addClass('wrong-entry');
        $('.error').hide(500).delay(500).fadeIn(500);
        setTimeout("$('.error').fadeOut(1500);", 3000);
    }
    $('.form-control').keypress(function () {
        $('.log-status').removeClass('wrong-entry');
    });
        
});






//$(".footerSwipe").on("swipe", function () {
//    alert("Swipe detected!");
//});




/*
 $('#start').click(function(e){
 update("start");
 
 $.post("/groupFiles/cabinets/dayCrew/API/sandbox.php",
 {
 salesOrder: $("#salesOrder").val(),
 dealerName: $("#dealerName").val(),
 station: "cnc",
 status: "start"
 },
 function(data, status){
 //                        "Data: " + data + "\nStatus: Job Started." +
 //                        alert("Submission status: "+status);
 }
 );
 $("#dealerName").attr("disabled", true);
 $("#salesOrder").attr("disabled", true);
 $("#start").attr("disabled", true);
 $("#stop").attr("disabled", false);
 e.preventDefault();
 });*/
