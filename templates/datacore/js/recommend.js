var $datacore = jQuery.noConflict();
function datacore_action()
{
	var strhtml;
	strhtml=$datacore("#ajaxcontent .indexrow").eq(7).html();
	if(strhtml==null)
	{
		return false;
	}
	
	$datacore("#ajaxcontent .indexrow").eq(0).appendTo("#ajaxcontent");
	$datacore("#Pcontent").prepend("<div class='indexrow' style='display:none;' id='indexrowid'>"+strhtml+"</div>");
	$datacore("#Pcontent .indexrow").eq(13).remove();
	$datacore("#Pcontent .indexrow").eq(0).slideDown(500);
}
$datacore(document).ready(
	function()
	{
		var Ds1,Ds2,Ds3,Ds4,Ds5,Ds6,Ds7;
		Ds1=$datacore("#ajaxcontent .indexrow").eq(0).html();
		Ds2=$datacore("#ajaxcontent .indexrow").eq(1).html();
		Ds3=$datacore("#ajaxcontent .indexrow").eq(2).html();
		Ds4=$datacore("#ajaxcontent .indexrow").eq(3).html();
		Ds5=$datacore("#ajaxcontent .indexrow").eq(4).html();
		Ds6=$datacore("#ajaxcontent .indexrow").eq(5).html();
		Ds7=$datacore("#ajaxcontent .indexrow").eq(6).html();
		$datacore("#Pcontent").prepend("<div class='indexrow' id='ds1'>"+Ds1+"</div>"+"<div class='indexrow' id='ds2'>"+Ds2+"</div>"+"<div class='indexrow' id='ds3'>"+Ds3+"</div>"+"<div class='indexrow' id='ds4'>"+Ds4+"</div>"+"<div class='indexrow' id='ds5'>"+Ds5+"</div>"+"<div class='indexrow' id='ds6'>"+Ds6+"</div>"+"<div class='indexrow' id='ds7'>"+Ds7+"</div>");
		if(Ds1==null)
		{
			document.getElementById("ds1").innerHTML="";
		}
		if(Ds2==null)
		{
			document.getElementById("ds2").innerHTML="";
		}
		if(Ds3==null)
		{
			document.getElementById("ds3").innerHTML="";
		}
		if(Ds4==null)
		{
			document.getElementById("ds4").innerHTML="";
		}
		if(Ds5==null)
		{
			document.getElementById("ds5").innerHTML="";
		}
		if(Ds6==null)
		{
			document.getElementById("ds6").innerHTML="";
		}
		if(Ds7==null)
		{
			document.getElementById("ds7").innerHTML="";
		}
		var Interval;
		Interval=setInterval("datacore_action();",2000);
		$datacore("#Pcontent").hover(function(){clearInterval(Interval);},
							 function(){Interval=setInterval("datacore_action();",2000);});
	}
);

function datacore_scroll(n){
	temp=n;
	News.scrollTop=News.scrollTop+temp;
	if (temp==0) return;
	setTimeout("datacore_scroll(temp)",20); 
}
