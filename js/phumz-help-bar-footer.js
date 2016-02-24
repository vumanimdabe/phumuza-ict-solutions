$('#footer-close').click(function(){	$('#help-bar').hide();	});
$("#askButton").click(function(){
	$.post( "php/Ask.php", { Name: $('#name').val(), Query: $('#query').val(), Email: $('#email').val() })
  .done(function() {
    	if($('#name').val() != ""  || $('#query').val() != "" || $('#email').val() != "" ){
			alert("Message Sent");
			$('#name').val("");$('#query').val("");$('#email').val("");
		}
		else alert("Message Error: Please enter all data");
  })
  .fail(function() {
    alert( "error in sending message" );
  })
  .always(function() {
    
});
	
})