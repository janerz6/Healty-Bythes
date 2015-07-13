
function getData(ehrId,el){
	
	$.ajax({
	    url: baseUrl + "/demographics/ehr/" + ehrId + "/party",
	    type: 'GET',
	    headers: {
	        "Ehr-Session": sessionId
	    },
	    success: function (data) {
	       var party = data.party;	
	       //Get age
	       var birthday = party.dateOfBirth;
	       //alert(Date.now()+" * "+new Date(birthday).getTime());
	       var ageDifMs = Date.now() - new Date(birthday).getTime();
    	   var ageDate = new Date(ageDifMs); // miliseconds from epoch
	       var age = Math.abs(ageDate.getUTCFullYear() - 1970);	
	      
	       
	       $(el).find(".wait_name").text(party.firstNames);
	       $(el).find(".wait_surname").text(party.lastNames);
	       $(el).find(".wait_born").html("Born: <strong>"+party.dateOfBirth.substr(0,10)+"</strong>");
	       $(el).find(".wait_gender").html("Gender: <strong>"+ party.gender.substr(0,1)+"</strong>");
	       $(el).find(".wait_age").html("Age: <strong>"+ age +"</strong>");
	       
	    },
	    error:function(){
	    	console.log("errorGetData");
	    }
	});	
}

function fill_data(){
	$(".sider ul li").each(function(index){
		//alert($(this).attr("id"));		
		getData($(this).attr("id"),$(this));		
	});
	
}
function fill_data2(){
	$(patients).find("li").each(function(index){
		//alert($(this).attr("id"));
		alert(getData($(this).attr("id"),$(this)));
		$(this).html(getData($(this).attr("id"),$(this)));	
		alert($(this).html());	
	});
	
}
