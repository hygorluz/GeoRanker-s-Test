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
			$('#report-list').append(result)
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
			location.reload();
		}
	});
}

function callDetails(idReport){
	
	window.location = "new-report.php?id="+idReport;

    
}
