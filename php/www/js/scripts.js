var userSession;

jQuery(document).ready(function() {

	userSession = $.ajax({
    type: 'POST',       
    url: "api-georanker.php",
    data: {action: "login"},
    context: document.body,
    global: false,
    async:false,
    success: function(session) {
        return session;
    }
}).responseText;
getUserSession();
	$.ajax({
		url: 'api-georanker.php',
		type: "post", //request type,
        data: {action: "list", session:userSession},
		success: function(result) {
			console.log(result);
		}
	});
});


function getUserSession(){
	return userSession;
}
