var req;
   
function initReq(){
	if(window.XMLHttpRequest){
		req = new XMLHttpRequest();
		
	}else if(window.ActiveXObject){
		isIE = true;
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
} 

function loadAllocation(val,id){
	
	var myID = id + "0";
	initReq();
	
	
	req.onreadystatechange = function(){
		processAllocation(myID);
	};
	
	// var id = myID;
	var id = document.getElementById(id).value;
	var url = "./allocate.php?alloc=" + id;
	req.open("GET",url,true);
	req.send(null);
	
}

function loadAllocation2(name){
	var myId = name;
	var id = name + name;
	var myValue = document.getElementById(id).value;
	
	initReq();
	
	 
	req.onreadystatechange = function(){
		processAllocation2(myId);
	};
	
	
	var url = "./allocate.php?dev=" + myValue;
	req.open("GET",url,true);
	req.send(null);
	
}

 
function processAllocation(id){
	if(req.readyState){
		if(req.status){

			document.getElementById(id).innerHTML = req.responseText;

		}
	}
}

function processAllocation2(id){

	if(req.readyState){
		if(req.status){

			document.getElementById(id).innerHTML = req.responseText;

		}
	}
}



// function loadSchool(){
	
// 	initReq();
	
	
// 	req.onreadystatechange = function(){
// 		processSchool();
// 	};
	
// 	var id = document.getElementById("collage").value;
// 	var url = "tbaba.php?col=" + id;
// 	req.open("GET",url,true);
// 	req.send(null);
	
// }

// function processSchool(){
// 	if(req.readyState){
// 		if(req.status){
// 			document.getElementById("collegeDiv").innerHTML= req.responseText;
// 		}
// 	}
// }

/*function loadSchool(){
	
	initReq();
	
	req.onreadystatechange = function(){
		processSchool();
	};
	
	var id = document.getElementById("college").value;
	var url = "tbaba.php?col=" + id;
	req.open("GET",url,true);
	req.send(null);
	
}

function processSchool(){
	if(req.readyState){
		if(req.status){
			document.getElementById("schoolDiv").innerHTML= req.responseText;
		}
	}
}

function loadDept(){
	
	initReq();
	
	req.onreadystatechange = function(){
		processDept();
	};
	
	var id = document.getElementById("school").value;
	var url = "tbaba.php?dept=" + id;
	req.open("GET",url,true);
	req.send(null);
	
}*/

/*function processDept(){
	if(req.readyState){
		if(req.status){
			document.getElementById("deptDiv").innerHTML= req.responseText;
		}
	}
}*/
