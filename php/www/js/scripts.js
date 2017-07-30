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

function callDelete(idReport){
    $.ajax({
		url: 'api-georanker.php',
		type: "post", //request type,
        data: {action: "delete", session:userSession, id:idReport},
		success: function(result) {
			console.log(result);
		}
	});
}

function callDetails(idReport){
    $.ajax({
		url: 'api-georanker.php',
		type: "post", //request type,
        data: {action: "details", session:userSession, id:idReport},
		success: function(result) {
			console.log(result);
		}
	});
}
