$(document).ready(function(){
    
    alert("Loaded");
});
$(document).ready(function(){
    setTimeout(function(){
    	$('#newsLatterSubsModal').modal('show');
    }, 2000);

    $('.email_subscribed').on('click', function(){

    	

		var email = $('#subscribed_email').val();
		var _token = $('input[name=_token]').val();
		
		if(validateEmail(email) == true){
			$.ajax({
		 		type: "POST",
		 		url: "/newslattersubscribers",
		 		data: "email="+email+"&_token="+_token,
		 		cache: false,
		 		async: false,
		 		success: function(result) {
					alert(result);
					console.log(result);
				},
				error: function(result) {
					alert("Error: "+result);
					console.log(result);
				}
			});

		}else{
			alert('Please enter The email correctly');

		}
	});
});



function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
