jQuery(document).ready(function() {
    var passedId;
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

passedId = getUrlParameter("id");

if(passedId){
	$.ajax({
		url: 'api-georanker.php',
		type: "post", //request type,
        data: {action: "details", session:userSession, id:passedId},
		success: function(result) {
            var json = jQuery.parseJSON(result);
            var jsonReport = jQuery.parseJSON(json);
            $("#keywords").val(jsonReport.keywords);
            $("#countries").val(jsonReport.countries);
            $("#search-engine").val(jsonReport.searchengines);
			//console.log(jsonReport.id);
		}
	});
}
});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};