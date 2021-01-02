function validate () {
  if(document.getElementById('searchBox').value=="") {
    return false;
  }
  return true;
}
function validate2 () {
  if(document.getElementById('searchBox').value=="") {
    alert ("At least enter something to search for...");
	return false;
  }
  return true;
}
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
function setSub(subID){
	document.getElementById('sub_id').value = subID;
	document.getElementById('cats').style.display = "none";
	document.getElementById('scat').style.display = "none";
	document.getElementById('scats').style.display = "block";
}
function setSub2(){
	document.getElementById('cats').style.display = "none";
	document.getElementById('scat').style.display = "none";
	document.getElementById('scats').style.display = "block";
}
function showcat(){
	document.getElementById('cats').style.display = "block";
	document.getElementById('scat').style.display = "block";
	document.getElementById('scats').style.display = "none";
}
function pagesubmitform() {
	err = "";
	if (document.getElementById('pageName').value == "") {
		err = "You need to enter a name.\n";
	}
	if (document.getElementById('pageURL').value == "") {
		err = err + "You need to enter the URL.\n";
	} else {
		theURL = document.getElementById('pageURL').value;	
		if (theURL.indexOf("http://www.facebook.com/") == -1 && theURL.indexOf("https://www.facebook.com/") == -1) {
			err = err + "You need to enter a FACEBOOK FanPage URL.\n";
		} else {
		  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.open("GET","/scripts/checkpageexists.php?u="+document.getElementById('pageURL').value,false);
		  xmlhttp.send();
		  if (xmlhttp.responseText != 1) {
			  err = err + "This FanPage is already in our database.\n";
		  }
		}
	}
	if (document.getElementById('sub_id').value == "") {
		err = err + "You need to select a category.\n";
	}
	if (err != ""){
		alert ('The following error(s) occurred:\n\n' + err);
		return false;
	}else {
		return true;
	}
}
function registerform() {
	err = "";
	if (document.getElementById('Forename').value == "") {
		err = "You need to enter your Forname.\n";
	}
	if (document.getElementById('Surname').value == "") {
		err = err + "You need to enter your Surname.\n";
	}
	if (document.getElementById('REmail').value == "") {
		err = err + "You need to enter your Email Address.\n";
	} else {
	  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  } else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.open("GET","/scripts/checkuserexists.php?u="+document.getElementById('REmail').value,false);
	  xmlhttp.send();
	  if (xmlhttp.responseText != 1) {
		  err = err + "This Email Address is already registered.\n";
	  }
	}
	if (document.getElementById('RPassword').value == "") {
		err = err + "You need to enter a Password.\n";
	}
	if (document.getElementById('Terms').checked == false) {
		err = err + "You need to accept the Terms & Conditions.\n";
	}
	if (err != ""){
		alert ('The following error(s) occurred:\n\n' + err);
		return false;
	}else {
		return true;
	}
}
function pageeditform() {
	err = "";
	if (document.getElementById('pageName').value == "") {
		err = "You need to enter a name.\n";
	}
	if (document.getElementById('pageURL').value == "") {
		err = err + "You need to enter the URL.\n";
	} else {
		theURL = document.getElementById('pageURL').value;	
		if (theURL.indexOf("http://www.facebook.com/") == -1 && theURL.indexOf("https://www.facebook.com/") == -1) {
			err = err + "You need to enter a FACEBOOK FanPage URL.\n";
		}
	}
	if (document.getElementById('sub_id').value == "") {
		err = err + "You need to select a category.\n";
	}
	if (err != ""){
		alert ('The following error(s) occurred:\n\n' + err);
		return false;
	}else {
		return true;
	}
}
function contactform() {
	err = "";
	if (document.getElementById('YourName').value == "") {
		err = "You need to enter your name.\n";
	}
	if (document.getElementById('YourEmail').value == "") {
		err = err + "You need to enter your email address.\n";
	}
	if (document.getElementById('ContactSubject').selectedIndex == 0) {
		err = err + "You need to select a subject.\n";
	}
	if (document.getElementById('YourComments').value == "") {
		err = err + "You need to enter a comment.\n";
	}
	if (err != ""){
		alert ('The following error(s) occurred:\n\n' + err);
		return false;
	}else {
		return true;
	}
}
function confirmation(theURL,winName,features) {
	var answer = confirm("Are you sure this FanPage has a bug?")
	if (answer){
	  var answer2 = confirm("Are you REALLY sure?")
	  if (answer2){		
	    window.open(theURL,winName,features);
	  }
	}
}
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
function deleteuser() {
	var answer = confirm("Delete user and their pages?")
	if (answer){
	  return true;
	} else {
	  return false;
	}
}
function deletepage() {
	var answer = confirm("Delete this page?")
	if (answer){
	  return true;
	} else {
	  return false;
	}
}

function activ8page(page,status) {
	//alert(page+" "+status);
  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
  } else {// code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	  var popo=xmlhttp.responseText;
	  if (popo=="activeyicon") {
		document.getElementById('activ8'+page).innerHTML="<span class=activeyicon onClick='activ8page("+page+",1)'></span>";
	  } else {
		document.getElementById('activ8'+page).innerHTML="<span class=activenicon onClick='activ8page("+page+",0)'></span>";
	  }
	}
  }
  xmlhttp.open("GET","activ8.php?tbl_id="+page+"&s="+status,true);
  xmlhttp.send();
}

function buggypage(page,status) {
	//alert(page+" "+status);
  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
  } else {// code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	  var popo=xmlhttp.responseText;
	  if (popo=="bugicon") {
		document.getElementById('buggy'+page).innerHTML="<span class=bugicon onClick='buggypage("+page+",1)'></span>";
	  } else {
		document.getElementById('buggy'+page).innerHTML="<span class=bugnicon onClick='buggypage("+page+",0)'></span>";
	  }
	}
  }
  xmlhttp.open("GET","bug.php?tbl_id="+page+"&s="+status,true);
  xmlhttp.send();
}

function findusers(str) {
  if (str.length==0) {
	document.getElementById("txtHint").innerHTML="";
	return;
  }
  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
  } else {// code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	  document.getElementById("userssuggestions").innerHTML=xmlhttp.responseText;
	}
  }
  xmlhttp.open("GET","getusersuggestions.php?q="+str,true);
  xmlhttp.send();
}

function settheusername(userid) {
	document.getElementById('userName').value = userid;
	document.getElementById("newuser").innerHTML=userid;
	//document.getElementById("newuser").innerHTML=username;
	//document.getElementById('userName').value = username;
}