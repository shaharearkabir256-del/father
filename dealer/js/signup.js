<!--User NID -->
var xmlHttp4
	function check_nid(){
		document.getElementById("nid_error").innerHTML="<img src=js/load.gif></img>";
		var country = document.getElementById('NID').value;
		xmlHttp4=GetXmlHttpObject4()
		if (xmlHttp4==null)
		{
		alert ("Browser does not support HTTP Request")
		return
		}
		var url="js/signup_chk.php"
		url=url+"?action=nid_check&nid="+country
		url=url+"&sid="+Math.random()
		xmlHttp4.onreadystatechange=stateChanged4
		xmlHttp4.open("GET",url,true)
		xmlHttp4.send(null)
	}
	
	function stateChanged4(){
		if (xmlHttp4.readyState==4 || xmlHttp4.readyState=="complete")
		{
		document.getElementById("nid_error").innerHTML=xmlHttp4.responseText
		}
	}
	
	function GetXmlHttpObject4()
		{
		var xmlHttp4=null;
		try
		{
		// Firefox, Opera 8.0+, Safari
		xmlHttp4=new XMLHttpRequest();
		}
		catch (e)
		{
		//Internet Explorer
		try
		{
		xmlHttp4=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
		xmlHttp4=new ActiveXObject("Microsoft.XMLHTTP");
		}
		}
		return xmlHttp4;
		}
<!--User NID END -->
<!--User ID -->

var xmlHttp3
	function check_user_id(){
		document.getElementById("user_id_error").innerHTML="<img src=js/load.gif></img>";
		var country = document.getElementById('User_ID').value;
		xmlHttp3=GetXmlHttpObject3()
		if (xmlHttp3==null)
		{
		alert ("Browser does not support HTTP Request")
		return
		}
		var url="js/signup_chk.php"
		url=url+"?action=user_id_check&ref_id="+country
		url=url+"&sid="+Math.random()
		xmlHttp3.onreadystatechange=stateChanged3
		xmlHttp3.open("GET",url,true)
		xmlHttp3.send(null)
	}
	
	function stateChanged3(){
		if (xmlHttp3.readyState==4 || xmlHttp3.readyState=="complete")
		{
		document.getElementById("user_id_error").innerHTML=xmlHttp3.responseText
		}
	}
	
	function GetXmlHttpObject3()
		{
		var xmlHttp3=null;
		try
		{
		// Firefox, Opera 8.0+, Safari
		xmlHttp3=new XMLHttpRequest();
		}
		catch (e)
		{
		//Internet Explorer
		try
		{
		xmlHttp3=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
		xmlHttp3=new ActiveXObject("Microsoft.XMLHTTP");
		}
		}
		return xmlHttp3;
		}
	
<!-- User ID end-->

// Sponsor ID Start
var xmlHttp1
	function check_ref_id()
		{
		document.getElementById("ref_error").innerHTML="<img src=js/load.gif></img>";
		var country = document.getElementById('Reference').value;
		xmlHttp1=GetXmlHttpObject1()
		if (xmlHttp1==null)
		{
		alert ("Browser does not support HTTP Request") 
		return
		}
		var url="js/signup_chk.php"
		url=url+"?action=ref_check&ref_id="+country
		url=url+"&sid="+Math.random()
		xmlHttp1.onreadystatechange=stateChanged1
		xmlHttp1.open("GET",url,true)
		xmlHttp1.send(null)
		}
	
	function stateChanged1()
		{
		if (xmlHttp1.readyState==4 || xmlHttp1.readyState=="complete")
		{
		document.getElementById("ref_error").innerHTML=xmlHttp1.responseText
		}
		}
	
	function GetXmlHttpObject1()
		{
		var xmlHttp1=null;
		try
		{
		// Firefox, Opera 8.0+, Safari
		xmlHttp1=new XMLHttpRequest();
		}
		catch (e)
		{
		//Internet Explorer
		try
		{
		xmlHttp1=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
		xmlHttp1=new ActiveXObject("Microsoft.XMLHTTP");
		}
		}
		return xmlHttp1;
		}
//Sponsor ID end



 <!--Upline ID and Left/Right Position-->
var xmlHttp2
	function check_uplink_id()
		{
		document.getElementById("spon_error").innerHTML="<img src=js/load.gif></img>";
		var country = document.getElementById('Uplink').value;
		xmlHttp2=GetXmlHttpObject2()
		if (xmlHttp2==null)
		{
		alert ("Browser does not support HTTP Request")
		return
		}
		var url="js/signup_chk.php"
		url=url+"?action=spon_check&ref_id="+country
		url=url+"&sid="+Math.random()
		xmlHttp2.onreadystatechange=stateChanged2
		xmlHttp2.open("GET",url,true)
		xmlHttp2.send(null)
		}
	
	function stateChanged2()
		{
		if (xmlHttp2.readyState==4 || xmlHttp2.readyState=="complete")
		{
		document.getElementById("spon_error").innerHTML=xmlHttp2.responseText
		}
		}
	
	function GetXmlHttpObject2()
		{
		var xmlHttp2=null;
		try
		{
		// Firefox, Opera 8.0+, Safari
		xmlHttp2=new XMLHttpRequest();
		}
		catch (e)
		{
		//Internet Explorer
		try
		{
		xmlHttp2=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
		xmlHttp2=new ActiveXObject("Microsoft.XMLHTTP");
		}
		}
		return xmlHttp2;
		}
<!-- Form Validation-->

<!-- Checking Upline ID and Left/Right Position-->


/* <!--Country Start-->	
	var xmlHttp
	function change_category()
	{
	//document.getElementById("sub_category_error").innerHTML="<img src=js/load.gif></img>please Wait....";
	var category = document.getElementById('category').value;
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return
	}
	var url="js/change_category.php"
	url=url+"?c="+category
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChanged
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
	}
	
	function stateChanged()
	{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
	
	document.getElementById("sub_category_error").innerHTML=xmlHttp.responseText 
	//document.getElementById("sub_category2").innerHTML=xmlHttp.responseText
	//document.getElementById("dial_code2").value=xmlHttp.responseText
	}
	}
	
	function GetXmlHttpObject()
	{
	var xmlHttp=null;
	try
	{
	// Firefox, Opera 8.0+, Safari
	xmlHttp=new XMLHttpRequest();
	}
	catch (e)
	{
	//Internet Explorer
	try
	{
	xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch (e)
	{
	xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	}
	return xmlHttp;
	}
<!-- Country End--> */	

/* <!-- change country code start-->
var xmlHttp7
function check_fund_id()
{
document.getElementById("fund_id_error").innerHTML="<img src=load.gif></img>";
var country = document.getElementById('fund_id').value;
xmlHttp7=GetXmlHttpObject7()
if (xmlHttp7==null)
{
alert ("Browser does not support HTTP Request")
return
}
var url="signup_auto_check.php"
url=url+"?action=fund_id_check&ref_id="+country
url=url+"&sid="+Math.random()
xmlHttp7.onreadystatechange=stateChanged7
xmlHttp7.open("GET",url,true)
xmlHttp7.send(null)
}

function stateChanged7()
{
if (xmlHttp7.readyState==4 || xmlHttp7.readyState=="complete")
{
var check = xmlHttp7.responseText
if(check=="7"){document.getElementById("fund_id_error").innerHTML="<img src=\"cross.png\" height=\"20\" width=\"20\" />Invalid Fund-ID !";}
else if(check=="8"){document.getElementById("fund_id_error").innerHTML="<img src=\"cross.png\" height=\"20\" width=\"20\" />Insufficient Fund.";}
else if(check=="9"){document.getElementById("fund_id_error").innerHTML="<img src=\"right.png\" height=\"20\" width=\"20\" />Valid up to  Startup.";}
else if(check=="10"){document.getElementById("fund_id_error").innerHTML="<img src=\"right.png\" height=\"20\" width=\"20\" />Valid up to Basic.";}
else if(check=="11"){document.getElementById("fund_id_error").innerHTML="<img src=\"right.png\" height=\"20\" width=\"20\" />Valid up to Basic Plus.";}
else if(check=="12"){document.getElementById("fund_id_error").innerHTML="<img src=\"right.png\" height=\"20\" width=\"20\" />Valid up to Basic Gold.";}
else if(check=="13"){document.getElementById("fund_id_error").innerHTML="<img src=\"right.png\" height=\"20\" width=\"20\" />Valid up to Classic.";}
else if(check=="14"){document.getElementById("fund_id_error").innerHTML="<img src=\"right.png\" height=\"20\" width=\"20\" />Valid up to Super.";}
else if(check=="15"){document.getElementById("fund_id_error").innerHTML="<img src=\"right.png\" height=\"20\" width=\"20\" />Valid for All Package.";}

}
}

function GetXmlHttpObject7()
{
var xmlHttp7=null;
try
{
// Firefox, Opera 8.0+, Safari
xmlHttp7=new XMLHttpRequest();
}
catch (e)
{
//Internet Explorer
try
{
xmlHttp7=new ActiveXObject("Msxml2.XMLHTTP");
}
catch (e)
{
xmlHttp7=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp7;
}
<!-- change country code end--> */
<!-- Start Checking Condition of joining -->
function show_alert()
	{
	alert("Coming Soon ");
	}
<!-- Checking Condition of joining end-->

<!-- Start Checking Form spaces -->
function removeSpaces(string)
	 {
	 return string.split(' ').join('');
	 }
<!-- Checking Form spaces end-->

 <!-- Start Checking E-Mail -->
/* function echeck(str)
	{
	var at="@"
	var dot="."
	var lat=str.indexOf(at)
	var lstr=str.length
	var ldot=str.indexOf(dot)
	if (str.indexOf(at)==-1)
	{
	   alert("Invalid E-mail ID")
	   return false
	}	
	if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr)
	{
	   alert("Invalid E-mail ID")
	   return false
	}	
	if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr)
	{
	    alert("Invalid E-mail ID")
	    return false
	}	
	 if (str.indexOf(at,(lat+1))!=-1)
	 {
	    alert("Invalid E-mail ID")
	    return false
	 }	
	 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot)
	 {
	    alert("Invalid E-mail ID")
	    return false
	 }	
	 if (str.indexOf(dot,(lat+2))==-1)
	 {
	    alert("Invalid E-mail ID")
	    return false
	 }	
	 if (str.indexOf(" ")!=-1)
	 {
	    alert("Invalid E-mail ID")
	    return false
	 }	
	 return true					
	}
<!-- Checking E-Mail end --> */	
/*
<!-- Start Checking form entry -->
function process()
	{
		if(!document.member.nid.value)
	{
		alert("Blank NID!");
		document.member.nid.focus()		 
		return false;
	}
	if(!document.member.Reference.value)
	{
		alert("Blank Reference ID!");
		document.member.Reference.focus()		 
		return false;
	}
	if(!document.member.uplink.value)
	{
		alert("Blank Placement ID!");
		 document.member.uplink.focus()		 
		return false;
	} */
	/* if((!document.member.left.checked) && (!document.member.right.checked))
	{
		alert("Please Select Position!");
		document.member.uplink.focus()		 
		return false;
	} */
/* if(!document.member.fund_id.value)
	{
		alert("Blank Fund ID!");
		document.member.fund_id.focus()		 
		return false;
	}	
	var User_ID = document.member.User_ID	
	if ((User_ID.value == null)||(User_ID.value.length <3 || User_ID.value.length > 50)){
		alert("Please Enter User ID")
		User_ID.focus()
		User_ID.value.value = "";
		return false
	}
	var name=document.member.name
	if ((name.value==null)||(name.value.length < 6 || name.value.length > 35)){
		alert("Please Enter Full Name")
		name.focus()
		name.value.value="";
		return false
	}
	var Password = document.member.Password	
	if ((Password.value == null)||(Password.value.length < 6 || Password.value.length > 25)){
		alert("Please Enter Password more than 6 charactor ")
		Password.focus()
		Password.value.value = "";
		return false
	}
	
	var Password_re = document.member.Password_re	
	if ((Password_re.value == null)||(Password_re.value.length < 6 || Password_re.value.length > 25)){
		alert("Please Enter Password to Verify")
		Password_re.focus()
		Password_re.value.value = "";
		return false
	}	
	if(document.member.Password.value != document.member.Password_re.value)
	{
		alert("Both Password Not Same!");
		document.member.Password_re.focus()		 
		return false;
	}
	
	var Password_tr = document.member.Password_tr	
	if ((Password_tr.value == null)||(Password_tr.value.length < 6 || Password_tr.value.length > 25)){
		alert("Blank Transaction Password or Please Set Strong Password")
		Password_tr.focus()
		Password_tr.value.value = "";
		return false
	}
	if(document.member.Password.value == document.member.Password_tr.value)
	{
		alert("Transaction Password & Login Password Cannot be same !");
		document.member.Password_tr.focus()		 
		return false;
	}	
	var Mobile=document.member.Mobile             
	if ((Mobile.value==null)||(Mobile.value.length < 10 || Mobile.value.length > 15 || Mobile.value.search(/[^0-9\-()+]/g) != -1 )){
		alert("Please enter valid mobile number")
		Mobile.focus()
		Mobile.value.value="";
		return false
	}

	var Email=document.member.Email	
	if ((Email.value==null)||(Email.value=="")){
		alert("Please Enter your Email ID")
		Email.focus()
		return false
	}
     if (echeck(Email.value)==false)
       {
	Email.value=""
	Email.focus()
	return false
	}		

	if((!document.member.left1.checked) && (!document.member.right1.checked))
	{
		alert("Please Select Additional Information!");
		document.member.Email.focus()		 
		return false;
	}
	
	if(!document.member.chk.checked)
	{
		alert("Please read terms & condition");
		document.member.Email.focus()		 
		return false;
	}	
	
	
	return true;
	}
<!-- Checking form entry end-->
function check_Addi()
	{
	if(document.member.left1.checked){document.getElementById("Addi").style.display="block";}
	if(document.member.right1.checked){document.getElementById("Addi").style.display="none";}	
	}

function check_Nominee()
	{
	if(document.member.left2.checked){document.getElementById("Nominee").style.display="block";}
	if(document.member.right2.checked){document.getElementById("Nominee").style.display="none";}	
	}
function check_Bank()
	{
	if(document.member.left3.checked){document.getElementById("Bank").style.display="block";}
	if(document.member.right3.checked){document.getElementById("Bank").style.display="none";}	
	}
*/