function check(id){
	var val = document.getElementById(id).value;
	if(val == ''){
		return false;
	}
	else{
		return true;
	}
}

function validate(){
	var n = check('name');
	var d = check('details');
	var c = check('category');
	var con = check('contacts');
	var ty = check('type');
	var u = check('hidid');
	if(n && d && c && ty && con){
		if(!u){
			alert("We are currently unable to register your event. Please come back later or try refreshing the page.");
			return false;
		}
		return true;
	}
	else{
		alert("Please fill the complete details.");
		return false;
	}
}
