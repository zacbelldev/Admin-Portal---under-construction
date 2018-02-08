// comments here.....  

$(document).ready(function(){
    if ($('.error').html() == 'Invalid Credentials'){
        $('.log-status').addClass('wrong-entry');
        $('.error').fadeIn(500);
        setTimeout( "$('.error').fadeOut(1500);",3000 );
    }
    $('.form-control').keypress(function(){
        $('.log-status').removeClass('wrong-entry');
    });
});


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
