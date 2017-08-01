jQuery(document).ready(function() {
    var passedId;
    passedId = getUrlParameter("id");
    if(passedId){
        configDetails();
    }
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



if(passedId){    
	$.ajax({
		url: 'api-georanker.php',
		type: "post", 
        data: {action: "details", session:userSession, id:passedId},
		success: function(result) {            
            var json = jQuery.parseJSON(result);
            var jsonReport = jQuery.parseJSON(json);
            configType(jsonReport.type);
            $("#keywords").val(jsonReport.keywords);
            $("#countries").val(jsonReport.countries);
            $("#search-engine").val(jsonReport.searchengines);
            var urls="";
            $.each(jsonReport.urls, function( index, value ) {
                urls += "["+value.url+"],";

            });
            $("#url").val(urls.slice(0,-1));
         
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

function callCreateReport(){    
    var report = creatingReportsObject();
    
    $.ajax({
		url: 'api-georanker.php',
		type: "post", 
        data: {action: "new", session:userSession, data:report },
		success: function(result) {            
            var response = JSON.parse(JSON.parse(result));
            if(response.status){
                alert(response.msg);
            }else{
                
                alert("Your report has been created!")
            }
            clearFields();
			console.log(response.status);
		}
	});
}

function creatingReportsObject(){
    var searchengines = $("#search-engine").val().split(",");
    var countries = $("#countries").val().split(",");
    var keywords = $("#keywords").val().split(",");
    var type = $("#drop-btn").val();
    var url = $("#url").val().split(",");

    var urlObject = new Object();
    var reportObject = new Object();   
    
    reportObject.searchengines = searchengines;
    reportObject.keywords = keywords;
    reportObject.type = type;
    reportObject.countries = countries;
    var urlArray = [];
     $.each(url, function( index, value ) {
        urlObject.url = value;
        urlObject.brand = null;
        urlArray.push(urlObject);
    });
    reportObject.urls = urlArray;
    
    return JSON.stringify(reportObject);

}


function configType(type){
    $('#drop-btn').val(type);
    $('#drop-btn')[0].innerHTML = type+ "<span class='caret' style='border-top-color: #565656;text-align: rigth;margin-left: 85%'></span>";
}

function configDetails(){
$("#keywords").attr('disabled','disabled');
    $("#countries").attr('disabled','disabled');
    $("#search-engine").attr('disabled','disabled');
    $("#url").attr('disabled','disabled');
    $("#btn-create").attr('disabled','disabled');
    $('#btn-create')[0].innerHTML = "Edit";
    $('#view-title')[0].innerHTML = "Report Details";
    $('#tab-title')[0].innerHTML = "Report Details";
     $("#drop-btn").attr('disabled','disabled');
}

function clearFields(){
    $("#search-engine").val("");
    $("#countries").val("");
    $("#keywords").val("");
    $('#drop-btn').val("ranktracker");
    $('#drop-btn')[0].innerHTML = "ranktracker"+ "<span class='caret' style='border-top-color: #565656;text-align: rigth;margin-left: 70%'></span>";
    $("#url").val("");

}