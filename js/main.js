function updatePatents(){
	$.ajax({
	    url: './php/getPatients.php',
	    type: 'POST',
	    data: {doctor: doctor_id},
    	dataType: 'json',
    	success: function(data) {
    		//alert(JSON.stringify(data));
    		console.log("updateParents");
    		
    		$("#patient_order").html("");
    		//$(patients).html("");		
    		for (var i=0;i<data.length;i++){    			
    			var template = $("#patient_template").html(); 			
    			//$(patients).append(template.replace("{{patient-id}}",data[i]));
    			 
	    		$("#patient_order").append(template.replace("{{patient-id}}",data[i]));	    										
			};	
			fill_data();	
			/*	
			//fill_data2();		
    		//alert($(patients).html());	
    		$("#patient_order").html("");
    		$("#patient_order").html($(patients).html()); 
    		*/
		},
		error: function(err,x,y) {
            console.log("error");
		},
	});			
}

function showData(){
	e.preventDefault();
	//alert($(this).parent().attr("id"));
	ehrId = $(this).parent().attr("id");		
    patientData();
}

$(document).ready(function(){
	username = "ales.smokvina@gmail.com";
	password = "ehr4ales";
	baseUrl = 'https://rest.ehrscape.com/rest/v1';
	ehrId = "e3af9251-5d54-4cb4-87c6-90ae724f4c78";
	sessionId = getSessionId(username,password);
	patients = document.createElement("ul");    
	
	$( "#patient_order" ).sortable();
    $( "#patient_order" ).disableSelection();
    var order;
    $( "#patient_order" ).sortable({
    	start: function(event, ui) {
	        ui.item.startPos = ui.item.index();
	    },
	    stop: function(event, ui) {
	        console.log("Start position: " + ui.item.startPos);
	        console.log("New position: " + ui.item.index());
	     
	        var startID = $("#patient_order li:nth-child("+(ui.item.startPos+1)+")").attr("id");
	        var secondID = $("#patient_order li:nth-child("+(ui.item.index()+1)+")").attr("id");
	        var doctor_id = 1;
	        
	       	//alert(startID+" "+secondID);
	       	var order = JSON.stringify($("#patient_order").sortable('toArray'));
	       	$.ajax({
			    url: './php/update_order.php',
			    type: 'POST',
			    data: {firstPos: ui.item.startPos+1,
			    		firstID: startID,
			    		secondPos:ui.item.index()+1,
			    		secondID: secondID,
			    		 doctor: doctor_id},
            	dataType: 'json',
            	success: function(data) {
                    console.log("success");
        		},
        		error: function(err,x,y) {
                    console.log("error");
        		},
        	});	
	    }
	});
    $("#patient_order").sortable({	    
	   /*
	    stop: function(event, ui) {
	    	
        			
	    }*/
	});
	document.querySelector('body').addEventListener('click', function(event) {
	  if (event.target.className === '.onlist_patient') {
	    alert(event.target.className);
	  }
	});
	
	$("#patient_order").on("click",".onlist_patient",function(e){
		e.preventDefault();
		
		ehrId = $(this).parent().attr("id");		
        patientData();
	});
	fill_data();
	window.setInterval(updatePatents, 100000);
});


