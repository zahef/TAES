
<script type="text/javascript">
function AjaxFunction(fac_name)
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {

var myarray=eval(httpxml.responseText);
// Before adding new we must remove previously loaded elements
for(j=document.feedback_form.sub_name.options.length-1;j>=0;j--)
{
document.feedback_form.sub_name.remove(j);
}


for (i=0;i<myarray.length;i++)
{
var optn = document.createElement("OPTION");
//alert(myarray[i]);
	var msg=myarray[i];
	var chr;
	
	for(j=0;j<msg.lenght;j++)
	{
		chr=msg.substring(j,j+1);
		if(chr < "0" || chr > "9")
		{
		 msg=msg.substring(0,j);
		}
	}


optn.text = myarray[i].substring(msg.length,myarray[i].length);
optn.value = myarray[i].charAt(0,msg.length) ;
document.feedback_form.sub_name.options.add(optn);

} 
      }
    }
	var url="response.php";
url=url+"?fac_name="+fac_name;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
httpxml.open("GET",url,true);
httpxml.send(null);
  }
</script>